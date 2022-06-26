<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        [
            'title' => 'Dress Rempel',
            'slug' =>'Dresss-Rempel',
            'price' => 170000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ],
        [
            'title' => 'Kulot Pendek',
            'slug' =>'kulot-pendek',
            'price' => 99000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ],
        [
            'title' => 'Kulot Panjang',
            'slug' =>'kulot-panjang',
            'price' => 70000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]
        ];

        foreach ($products as $key => $products){
            Product::create($products);
        }
    }

}