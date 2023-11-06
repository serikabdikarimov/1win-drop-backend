<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryCategory::factory()->create([
            'name' => 'avatar',
            'parent_id' => null,
            'is_active' => 1
        ]);
    }
}
