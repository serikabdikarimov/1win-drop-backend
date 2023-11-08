<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StorePageRequest;
use App\Http\Requests\UpdateRequests\UpdatePageRequest;
use App\Models\Attribute;
use App\Models\Autor;
use App\Models\Brand;
use App\Models\Localization;
use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SchemasService;
use App\Services\HeadingLinks;

class PagesController extends Controller
{
    protected $schemasService;
    protected $headingLinks;

    public function __construct(SchemasService $schemasService, HeadingLinks $headingLinks)
    {
        $this->schemasService = $schemasService;
        $this->headingLinks = $headingLinks;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $keyword = $request->get('search');
        $page_type = $request->get('page_type');
        $status = $request->get('status');
        $perPage = 25;

        $builder = Page::where('locale_id', $domainId)->select('id', 'name', 'updated_at', 'type', 'status');

        if ($keyword != null) {
            $builder->where('name', 'LIKE', "%$keyword%");
        }

        if ($page_type != null) {
            $builder->where('type', $page_type);
        }

        if ($status != null) {
            $builder->where('status', $status);
        }

        $pages = $builder->orderBy('updated_at', 'DESC')->paginate($perPage);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $autors = Autor::all();

        return view('admin.pages.create', compact('autors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StorePageRequest $request)
    {

        $requestData = $request->all();

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        if ($requestData['banner'] != null) {
            $requestData['banner'] = explode('/',$requestData['banner']);

            $imageId = Gallery::where('url', $requestData['banner'][3])->first();
            $requestData['banner'] = $imageId->id;
        }

        if ($requestData['type'] == 1) {
            $requestData['type_content_id'] = null;
        }
        if (isset($requestData['add_content'])) {
            $headingContent = $requestData['add_content'];
            $requestData['add_content'] = json_encode($requestData['add_content'], JSON_UNESCAPED_UNICODE);
        }

        $requestData['locale_id'] = $domainId;

        $page = Page::create($requestData);

        if (isset($requestData['add_content'])) {
            $this->schemasService->create($requestData['add_content'], $domainId, $page->id);
            $requestData['add_content'] = $this->headingLinks->createMenu($headingContent, $domainId, $page->id);
        }

        $page->update([
            'add_content' => $requestData['add_content']
        ]);

        return redirect('admin/pages')->with('flash_message', 'Page added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pageTypeContents = null;
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $autors = Autor::all();
        $allAttributes = Attribute::where(['locale_id' => $domainId])->get()->pluck('name', 'slug');
        $page = Page::findOrFail($id);

        if ($page->type == 2) {
            $pageTypeContents = Brand::where('locale_id', $domainId)->pluck('name', 'brands.id');
        }

        return view('admin.pages.edit', compact('page', 'pageTypeContents', 'autors', 'allAttributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $requestData = $request->all();

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        if ($requestData['banner'] != null) {
            $check = strripos($requestData['banner'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['banner']);
                $url = $url[3];
            } else {
                $url = $requestData['banner'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['banner'] = $imageId->id;
        }

        if ($requestData['type'] == 1) {
            $requestData['type_content_id'] = null;
        }

        if (isset($requestData['add_content'])) {
            $headingContent = $requestData['add_content'];
            $requestData['add_content'] = json_encode($requestData['add_content'], JSON_UNESCAPED_UNICODE);
        }
        if (isset($requestData['add_showcase_block']) && $requestData['add_showcase_block'] == 'on') {
            $requestData['showcase'] = json_encode($requestData['first_showcase']);
        } else {
            $requestData['showcase'] = null;
        }

        $page = Page::findOrFail($id);

        $page->update($requestData);

        if (isset($requestData['add_content'])) {
            $this->schemasService->update($requestData['add_content'], $domainId, $page->id);
            $requestData['add_content'] = $this->headingLinks->createMenu($headingContent, $domainId, $page->id);
        }

        $page->update([
            'add_content' => $requestData['add_content']
        ]);

        return redirect('admin/pages')->with('flash_message', 'Page updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $page = Page::findOrfail($id);

        $page->delete();

        return redirect('pages')->with('flash_message', 'Page deleted!');
    }

    public function editSeo($pageId)
    {
        $page = Page::where('id', $pageId)->select('id', 'name', 'meta_title', 'meta_description', 'meta_keywords')->first();
        if (!$page) {
            return abort(404);
        }

        return view('admin.pages.seo', compact('page'));
    }

    public function updateSeo(Request $request, $pageId)
    {
        $requestData = $request->all();

        $page = Page::findOrfail($pageId);

        $page->update($requestData);

        return redirect('admin/pages')->with('flash_message', 'SEO data updated!');
    }

    public function editShowcase($pageId)
    {
        $brands = Brand::all();
        $page = Page::findOrfail($pageId);
        $showcases = $page->showcase()->orderBy('position', 'asc')->get();

        return view('admin.pages.showcase', compact('brands', 'pageId', 'showcases', 'page'));
    }

    public function updateShowcase(Request $request, $pageId)
    {
        DB::table('brand_page')->insert([
            'page_id' => $pageId,
            'brand_id' => $request->input('brand_id')
        ]);

        return redirect('admin/pages/' . $pageId . '/showcase')->with('flash_message', 'Brand added to showcase!');
    }

    public function deleteShowcaseBrand($pageId, $brandId)
    {
        DB::table('brand_page')->where([
            'page_id' => $pageId,
            'brand_id' => $brandId
        ])->delete();

        return redirect('admin/pages/' . $pageId . '/showcase')->with('flash_message', 'Brand deleted to showcase!');
    }

    public function updateBrandPosition()
    {
        $result = DB::table('brand_page')->where([
            'page_id' => request('page'),
            'brand_id' => request('brand')
        ])->update([
            'position' => request('position')
        ]);

        return $result;
    }

    public function copyPage(Request $request)
    {
        $requestData = $request->all();

        foreach ($requestData['select_languages'] as $domainCode) {
            $domain = Localization::where('code', $domainCode)->first();
            $pageId = $requestData['page_id'];

            $page = Page::findOrFail($pageId);
            $new = $page->replicate();
            $new->locale_id = $domain->id;

            //Сохранение копии
            $new->push();

            $page->update($requestData);
        }

        return true;
    }

    public function updateStatus(Request $request)
    {
        $requestData = $request->all();

        if($requestData['type'] == 'page'){
            $data = Page::find($requestData['id']);
            $data->status = $requestData['status'];
            $data->update();
        }

        return true;
    }

    public function getTypeContent(Request $request)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $pageTypeContents = '';

        switch($request->page_type) {
            case(3):

                $data = Autor::where('locale_id', $domainId)->pluck('name', 'id');

                break;
            case(2):

                $data = Brand::where('locale_id', $domainId)->pluck('name', 'brands.id');

                break;

            default:
                $data = null;
        }

        if ($data != null) {
            foreach ($data as $key => $value) {
                $pageTypeContents .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }

        return $pageTypeContents;
    }
}
