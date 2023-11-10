<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Localization;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;

class FileManagerController extends Controller
{
    public function findImage(Request $request)
    {
        $keyword = $request->get('image_search');
        $categoriesId = $request->get('image_category_id');
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $builder = Gallery::latest();
        if (!empty($keyword)) {
            $builder->where('title' , 'LIKE', "%$keyword%");
        }

        if (!empty($categoriesId) && !in_array("all", $categoriesId)) {

            $catCheck = GalleryCategory::whereIn('parent_id', $categoriesId)->pluck('id');
            foreach ($catCheck as $key => $value) {
                array_push($categoriesId, $value);
            }

            $builder->with('categories')
                ->whereHas('categories', function (Builder $query) use($categoriesId){
                    $query->whereIn('gallery_category_id', $categoriesId);
                });
        }

        $files = $builder->where('locale_id', $domainId)->get()->pluck('url', 'id');

        return $files;
    }

    public function upload(Request $request, ImageService $imageService)
    {
        $request->validate([
            'upload' => 'required|mimes:doc,docx,xls,xlsx,ppt,pdf,zip,jpeg,png,jpg,gif,svg,webp|max:2048',
        ],
        [
            'upload.required' => 'Загрузите файл',
            'upload.mimes' => 'Проверьте формат файла (doc,docx,xls,xlsx,ppt,pdf,zip,jpeg,png,jpg,gif,svg)',
            'upload.max' => 'Размер файла не может превышать 2МБ'
        ]);

        if ($request->file('upload')) {

            $image = $request->file('upload');

            $fileName = request('title') ? request('title') : pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            if (Gallery::where('title', $fileName)->first()) {
                return response('Такой файл уже существует.', 500);
            }

            $title = request('attr_title') ? request('attr_title') : $fileName;
            $alt = request('alt') ? request('alt') : $fileName;

            $categories = request('gallery_categories') ? request('gallery_categories') : null;

            $storeImage = $imageService->create($fileName, $image, $alt, $title, $categories, request('width'), request('height'));

            $path = Gallery::where('id', $storeImage)->select('id','locale_id', 'url', 'title')->get();
        }

        return response($path);
    }

    public function addBlock()
    {
        $attributes = null;

        $index = request('index');
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        if (request('type') == 'sidebar-dinamyc-block' ||
            request('type') == 'showcase-dinamyc-block' ||
            request('type') == 'rating-dinamyc-block' ||
            request('type') == 'dynamic-attributes'
        ) {
            $attributes = Attribute::where('locale_id', $domainId)->orderBy('name', 'ASC')->get();
        }

        if (request('type') == 'dynamic-attributes'
        ) {
            $attributes = Attribute::where('locale_id', $domainId)->orderBy('name', 'ASC')->get()->pluck('name', 'slug');
        }

        return view('admin.form-appends.' . request('type'), compact('index', 'attributes'));
    }

    public function imageAttributes()
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $urlArray = explode('/', request('url'));

        $image = Gallery::where(['url' => end($urlArray), 'locale_id' => $domainId])->select('alt', 'attr_title')->first();

        return $image;
    }
}
