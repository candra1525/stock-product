<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Data Supplier
        $supplier = [
            [
                "id_supplier"=> 1,
                "nama_supplier"=> "Andi",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id_supplier"=> 2,
                "nama_supplier" => "Candra",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id_supplier"=> 3,
                "nama_supplier" => "Budi",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        if(DB::table("suppliers")->count() == 0)
        {
            Supplier::insert($supplier);
        }

        $product = [
            [
                "id_product"=> 1,
                "nama_product"=> "LENOVO ThinkBook 14 G2 ARE",
                "description_product"=>"Lenovo ThinkBook 14 Gen 2 adalah laptop 14 inci dengan tenaga kencang. Di dalam laptop ini ada prosesor AMD Ryzen 4000 Series. Anda bisa menangani data besar dan membuat dokumen kompleks dengan mudah. Prosesor ini memungkinkan Anda bisa bekerja lebih cepat dan lebih banyak. Storage yang digunakan sudah SSD untuk respon aplikasi dan transfer data lebih cepat. Lenovo ThinkBook 14 Gen 2 dilengkapi layar 14 inci beresolusi Full HD. Sertifikasi TÜV Rheinland dapat mengurangi mata lelah akibat terlalu lama bekerja. Layarnya memiliki rasio ke bodi 85%. Bezelnya sangat tipis yaitu hanya 5mm. Inilah semua kelebihan laptop Lenovo ThinkBook 14 Gen 2.",
                "stock_amount" => 5,
                "id_supplier" => 1,
                "status" => "active",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id_product"=> 2,
                "nama_product" => "ASUS ExpertBook P1412CEA-EK0007W",
                "description_product"=>"ASUS ExpertBook P1412 merupakan laptop entry-level yang dapat menyajikan performa baik dengan tampilan layar yang imersif. Laptop ini dibekali layar NanoEdge yang memiliki sudut pandang yang luas yakni 178° dan dibekali lapisan anti-glare. Dari sisi performa, laptop ini dibekali prosesor Intel generasi 11 yang didukung oleh memori DDR4 sehingga dapat menghasilkan performa tinggi. Selain itu, laptop ini dilengkapi dengan storage jenis SSD PCIe® yang akan memberikan waktu load dan respons yang lebih cepat. Berikut adalah keunggulan ASUS ExpertBook P1412.",
                "stock_amount" => 2,
                "id_supplier" => 2,
                "status" => "active",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id_product"=> 3,
                "nama_product" => "HP Pavilion Gaming 15-dk1141TX",
                "description_product"=>"HP Pavilion Gaming 15 adalah laptop gaming yang memiliki performa bertenaga untuk kebutuhan gaming AAA terkini. Laptop ini tak hanya cocok untuk kebutuhan para gamers, namun juga para kreator konten. Kemudian, HP Pavilion Gaming 15 dibekali dengan layar 15.6 inci dengan resolusi Full HD desain bezel tipis Micro-Edge dan juga refresh rate 144 Hz sehingga Anda bisa mendapatkan visual yang lebih luas, jernih, mulus dan juga tajam. Tak hanya itu saja, laptop gaming dari HP ini hadir dengan solusi pendingin canggih yang mampu menjaga suhu agar tetap rendah bahkan di skenario berat seperti gaming. Untuk pengalaman gaming yang lebih mendalam, laptop dari HP ini disertai juga audio dari B&O yang memberikan suara jernih dan juga luar biasa.",
                "stock_amount" => 0,
                "id_supplier" => 3,
                "status" => "inactive",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        if(DB::table("products")->count() == 0)
        {
            Product::insert($product);
        }
    }
}
