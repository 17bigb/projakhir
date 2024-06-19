<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product_image;

class Product_images extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product_image::create([
            'id' => 1,
            'image' => 'product_image/boneka_ub.jpg', // Ganti dengan path gambar yang benar
            'product_id' => 1, // Ganti dengan ID produk yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data product_images lain di sini jika diperlukan
    }
}