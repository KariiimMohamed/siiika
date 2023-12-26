<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $fake = Factory::create();
        for ($i=0; $i < 100 ; $i++) { 
            Product::create([
                'name_ar'         => 'المنتج رقم ' . $i ,
                'name_en'         => 'Product Number ' . $i ,
                'desc_ar'         => 'وصف المنتج رقم ' . $i ,
                'desc_en'         => $fake->text(200) ,
                'img'             => 'products/1.png' ,
                'price'           => $fake->numberBetween(10 , 20) ,
                'qty'             => $fake->numberBetween(1 , 5) ,
                'time'            => 'time' ,
                'category_id'     => rand(17,19) ,
            ]);
            
        }
    }
}
