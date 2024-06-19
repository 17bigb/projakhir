<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => $name = 'T-Shirt',
            'slug'=>str($name)->slug(),
            'image'=> 'https://ubmerch.id/wp-content/uploads/2022/07/29.jpg'
        ]);
        Brand::create([
            'name' => $name = 'Hoodie',
            'slug'=>str($name)->slug(),
            'image'=> 'https://ubmerch.id/wp-content/uploads/2022/07/29.jpg'
        ]);
        Brand::create([
            'name' => $name = 'Boneka',
            'slug'=>str($name)->slug(),
            'image'=> 'https://img.ws.mms.shopee.co.id/id-11134207-7r98t-lqve4twhmhfxfb'
        ]);
        Brand::create([
            'name' => $name = 'Tumbler',
            'slug'=> str($name)->slug(),
            'image'=> 'https://img.ws.mms.shopee.co.id/id-11134207-7r98t-lqve4twhmhfxfb'
        ]);
        Brand::create([
            'name' => $name = 'Stiker',
            'slug'=> str($name)->slug(),
            'image'=> 'https://img.ws.mms.shopee.co.id/id-11134207-7r98t-lqve4twhmhfxfb'
        ]);
        Brand::create([
            'name' => $name = 'Totebag',
            'slug'=> str($name)->slug(),
            'image'=> 'https://pbs.twimg.com/media/BkRFpGCCIAAF6kG.jpg'
        ]);
    }
}
