<?php

namespace App\Services;

use App\Models\Localization;
use App\Models\Gallery;
use Illuminate\Support\Str;
use ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function create($name, $image, $alt, $title, $categories, $width, $heigth)
    {
        $imageName = Str::slug($name) . '.' . $image->getClientOriginalExtension();

        if ($image->getClientOriginalExtension() != 'svg') {
            Storage::disk('public')->put('uploads/' . $imageName, file_get_contents($image));
            ImageOptimizer::optimize(public_path('storage/uploads/' . $imageName));
        } else {
            Storage::disk('public')->put('uploads/' . $imageName, file_get_contents($image));
        }

        $domains = Localization::all();

        foreach ($domains as $key => $value) {
            $gallery = Gallery::create([
                'title' => $name,
                'url' => $imageName,
                'alt' => $alt,
                'attr_title' => $title,
                'width' => $width,
                'height' => $heigth,
                'locale_id' => $value->id
            ]);

            if ($categories != null) {
                $gallery->categories()->sync($categories);
            }
        }

        return $gallery->id;
    }
}
