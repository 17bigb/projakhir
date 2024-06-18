<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Boneka UB',
                'slug' => 'boneka-ub',
                'quantity' => 10,
                'description' => 'Perkenalkan Boneka UB, maskot resmi dari Universitas Brawijaya! Boneka ini dirancang dengan detail yang menawan dan penuh warna untuk mewakili semangat dan kebanggaan kampus. Terbuat dari bahan berkualitas tinggi, boneka UB ini sangat lembut dan nyaman untuk dipeluk. Cocok sebagai hadiah untuk mahasiswa, alumni, atau penggemar UB, boneka ini juga merupakan koleksi sempurna untuk menunjukkan kecintaan Anda terhadap Universitas Brawijaya. Dapatkan sekarang dan bawa pulang semangat UB bersama Anda!',
                'published' => true,
                'inStock' => true,
                'price' => 55000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 1,
                'category_id' => 1,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hoodie Univ. Brawijaya',
                'slug' => 'hoodie',
                'quantity' => 10,
                'description' => 'Hoodie UB adalah pilihan sempurna untuk mengekspresikan identitas dan semangat 
                Universitas Brawijaya secara stylish. Didesain dengan bahan berkualitas tinggi, hoodie ini memberikan 
                kenyamanan maksimal sepanjang hari. Tersedia dalam berbagai ukuran dan warna yang menarik, Hoodie UB tidak 
                hanya cocok untuk dipakai sehari-hari tetapi juga sebagai souvenir yang sempurna untuk 
                mahasiswa, alumni, dan penggemar UB.',
                'published' => true,
                'inStock' => true,
                'price' => 100000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 2,
                'category_id' => 2,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'T-Shirt UB',
                'slug' => 't-shirt',
                'quantity' => 10,
                'description' => 'Kaos Universitas Brawijaya adalah pilihan terbaik untuk mengekspresikan semangat dan identitas universitas Anda. Didesain dengan kualitas terbaik dan detail yang teliti, kaos ini memberikan kenyamanan maksimal sepanjang hari. Tersedia dalam berbagai ukuran dan warna yang menarik, cocok untuk dipakai sehari-hari atau acara kampus. Jadikan Kaos UB sebagai bagian dari gaya Anda dan tunjukkan dukungan Anda pada Universitas Brawijaya dengan bangga.',
                'published' => true,
                'inStock' => true,
                'price' => 85000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 1,
                'category_id' => 1,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tumbler UB',
                'slug' => 'tumbler',
                'quantity' => 10,
                'description' => 'Nikmati minuman favorit Anda dengan gaya menggunakan Tumbler UB resmi dari Universitas Brawijaya. Terbuat dari bahan berkualitas tinggi, tumbler ini dirancang untuk menjaga suhu minuman Anda tetap optimal, baik panas maupun dingin, lebih lama. Dengan desain elegan yang menampilkan logo Universitas Brawijaya, tumbler ini sempurna untuk digunakan sehari-hari di kampus, di kantor, atau saat bepergian. Tumbler UB juga dilengkapi dengan penutup yang aman dan anti-tumpah, memastikan kenyamanan dan kemudahan dalam setiap tegukan. Tunjukkan kebanggaan Anda sebagai bagian dari komunitas UB dengan Tumbler UB yang stylish dan fungsional ini!',
                'published' => true,
                'inStock' => true,
                'price' => 150000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 4,
                'category_id' => 4,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Stiker dan Gantungan Kunci UB',
                'slug' => 'stiker',
                'quantity' => 10,
                'description' => 'Tambahkan sentuhan unik dan penuh kebanggaan pada barang-barang pribadi Anda dengan Stiker Universitas Brawijaya (UB). Terbuat dari bahan berkualitas tinggi, stiker ini tahan lama dan mudah ditempelkan pada berbagai permukaan seperti laptop, buku catatan, botol minum, dan lain-lain. Dengan desain khas UB yang menampilkan logo dan elemen-elemen identitas kampus, stiker ini merupakan cara sempurna untuk menunjukkan kecintaan Anda terhadap almamater. Dapatkan stiker UB sekarang dan tunjukkan semangat Brawijaya Anda di mana pun Anda berada!',
                'published' => true,
                'inStock' => true,
                'price' => 150000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 5,
                'category_id' => 5,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ToteBag UB',
                'slug' => 'totebag',
                'quantity' => 0,
                'description' => 'Tambahkan sentuhan gaya dan fungsionalitas ke aktivitas sehari-hari Anda dengan Totebag UB. Dibuat dari bahan kanvas berkualitas tinggi, totebag ini dirancang dengan logo Universitas Brawijaya yang ikonik, memberikan tampilan yang modern dan elegan. Ideal untuk mahasiswa, alumni, dan penggemar, totebag ini memiliki ruang yang cukup untuk buku, laptop, dan barang-barang pribadi lainnya. Dengan tali yang kuat dan jahitan yang tahan lama, Totebag UB adalah pilihan sempurna untuk menemani kegiatan kuliah, bekerja, atau berbelanja. Tunjukkan kebanggaan Anda sebagai bagian dari keluarga besar Universitas Brawijaya dengan Totebag UB yang stylish dan praktis ini.',
                'published' => false,
                'inStock' => false,
                'price' => 90000.00,
                'created_by' => User::factory()->create()->id,
                'updated_by' => User::factory()->create()->id,
                'brand_id' => 6,
                'category_id' => 6,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}