<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use ImageOptimizer;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $perPage = 25;

        $builder = Gallery::where('locale_id', $domainId)->orderBy('id', 'asc');
        if (!empty($keyword)) {
            $builder->where('title', 'LIKE', "%$keyword%");
        }

        if (!empty($categoryId)) {
            $builder->whereHas('categories', function($q) use($categoryId){
                $q->where('gallery_category_id', $categoryId);
            });
        }

        $gallery = $builder->paginate($perPage);
        $categories = GalleryCategory::whereNull('parent_id')->get();

        return view('admin.gallery.index', compact('gallery', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $galleryCategories = GalleryCategory::all();

        return view('admin.gallery.create', compact('galleryCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $imageName = Str::slug($requestData['title']) . '.' . $request->file('file')->getClientOriginalExtension();

        Storage::disk('public')->put('uploads/' . $imageName , file_get_contents($requestData['file']));

        ImageOptimizer::optimize(public_path('storage/uploads/' . $imageName));

        $domains = Localization::all();

        foreach ($domains as $domain) {

            $alt = $requestData['alt'][$domain->code];
            $attrTitle = $requestData['attr_title'][$domain->code];

            $gallery = Gallery::create([
                'title' => $requestData['title'],
                'url' => $imageName,
                'alt' => $alt,
                'attr_title' => $attrTitle,
                'width' => $requestData['width'],
                'height' => $requestData['height'],
                'locale_id' => $domain->id
            ]);

            if (isset($requestData['gallery_categories'])) {
                $gallery->categories()->sync($requestData['gallery_categories']);
            }
        }

        return redirect('admin/gallery')->with('flash_message', 'Gallery added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.show', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);
        $galleryCategories = GalleryCategory::all();

        return view('admin.gallery.edit', compact('gallery', 'galleryCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('file')) {

            //Storage::disk('public')->delete('uploads/3x/' . $gallery->url);
            //Storage::disk('public')->delete('uploads/2x/' . $gallery->url);
            Storage::disk('public')->delete('uploads/' . $gallery->url);

            $imageName = Str::slug($requestData['title']) . '.' . $request->file('file')->getClientOriginalExtension();

            //Получаем информацию о ширине изображения
            $size = getimagesize($requestData['file']);

            //Большой размер 3х оригинальная ширины
            $img3x = Image::make($request->file('file'))->resize($size[0], null, function ($constraint) {
            $constraint->aspectRatio();
            });
            //return (string) $img3x->encode();
            Storage::disk('public')->put('uploads/' . $imageName , (string) $img3x->encode());
//            Storage::disk('public')->put('uploads/3x/' . $imageName , (string) $img3x->encode());
            //Средний размер 2х половина ширины
            // $img2x = Image::make($request->file('file'))->resize($size[0]/2, null, function ($constraint) {
            // $constraint->aspectRatio();
            // });
            // Storage::disk('public')->put('uploads/2x/' . $imageName, (string) $img2x->encode());

            //стандартный размер для отображения на фронте, размер х четверть ширины
            // $img = Image::make((string) $img2x->encode())->resize($size[0]/4, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });

            // Storage::disk('public')->put('uploads/' . $imageName, (string) $img->encode());

            //Оптимизируем размер изображений
            // ImageOptimizer::optimize(public_path('storage/uploads/3x/' . $imageName));
            // ImageOptimizer::optimize(public_path('storage/uploads/2x/' . $imageName));
            ImageOptimizer::optimize(public_path('storage/uploads/' . $imageName));

        } else {
            $fileArray = explode('.', $gallery->url);
            $imageName = Str::slug($requestData['title']) . '.' . end($fileArray);

            Storage::disk('public')->move('uploads/' . $gallery->url, 'uploads/' . $imageName);
            // Storage::disk('public')->move('uploads/2x/' . $gallery->url, 'uploads/2x/' . $imageName);
            // Storage::disk('public')->move('uploads/3x/' . $gallery->url, 'uploads/3x/' . $imageName);
        }

        $domains = Localization::all();

        foreach ($domains as $domain) {
            //$galleryUpdate = Gallery::where(['url' => $gallery->url, 'locale_id' => $domain->id])->first();

            $alt = $requestData['alt'][$domain->code];
            $attrTitle = $requestData['attr_title'][$domain->code];

            Gallery::updateOrCreate(
                [
                    'url' => $gallery->url,
                    'locale_id' => $domain->id
                ],
                [
                'title' => $requestData['title'],
                'url' => $imageName,
                'alt' => $alt,
                'attr_title' => $attrTitle,
                'width' => $requestData['width'],
                'height' => $requestData['height'],
                'locale_id' => $domain->id
            ]);

            if (isset($requestData['gallery_categories'])) {
                $galleryUpdate->categories()->sync($requestData['gallery_categories']);
            }
        }

        return redirect('admin/gallery')->with('flash_message', 'Gallery updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($url)
    {
        $images = Gallery::where('url', $url)->get();

        if (!$images) {
            abort(404);
        }

        Storage::disk('public')->delete('uploads/' . $images[0]->url);

        foreach ($images as $key => $value) {
            $value->delete();
        }

        return redirect('admin/gallery')->with('flash_message', 'Gallery deleted!');
    }
}
