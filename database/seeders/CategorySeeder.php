<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => $name = 'T-Shirt',
            'slug'=>str($name)->slug(),
            'image'=> ''
        ]);
        Category::create([
            'name' => $name = 'Hoodie',
            'slug'=>str($name)->slug(),
            'image'=> ''
        ]);
        Category::create([
            'name' => $name = 'Boneka',
            'slug'=>str($name)->slug(),
            'image'=> ''
        ]);
        Category::create([
            'name' => $name = 'Tumbler',
            'slug'=> str($name)->slug(),
            'image'=> ''
        ]);
        Category::create([
            'name' => $name = 'Stiker',
            'slug'=> str($name)->slug(),
            'image'=> ''
        ]);
        Category::create([
            'name' => $name = 'Totebag',
            'slug'=> str($name)->slug(),
            'image'=> ''
        ]);
    }
}
