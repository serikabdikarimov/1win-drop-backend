<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GalleryCategory;

class GalleryCategoryFactory extends Factory
{
    protected $model = GalleryCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => null,
            'is_active' => 1
        ];
    }
}