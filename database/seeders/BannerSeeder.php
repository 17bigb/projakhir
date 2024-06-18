<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'name' => $name = 'banner 1',
            'slug'=>str($name)->slug(),
            'image'=> 'https://ubmerch.id/wp-content/uploads/2022/07/40-2048x2048.jpg'
        ]);
        Banner::create([
            'name' => $name = 'banner 2',
            'slug'=>str($name)->slug(),
            'image' => 'https://ubmerch.id/wp-content/uploads/2022/07/48-2048x2048.jpg'
        ]);
        Banner::create([
            'name' => $name = 'banner 3',
            'slug'=>str($name)->slug(),
            'image' => 'https://img.ws.mms.shopee.co.id/id-11134207-7r98t-lqve4twhmhfxfb'
        ]);
        Banner::create([
            'name' => $name = 'banner 4',
            'slug'=>str($name)->slug(),
            'image' => 'https://img.ws.mms.shopee.co.id/id-11134207-7r98o-luk47nox0ypodc'
        ]);
    }
}
