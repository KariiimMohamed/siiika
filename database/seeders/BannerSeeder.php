<?php

namespace Database\Seeders;

use App\Models\Banner;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    
    public function run(): void
    {
        $fake = Factory::create();

        for ($i=0; $i < 10 ; $i++) { 
            Banner::create([
                'title_ar' => 'العنوان رقم ' . $i ,
                'title_en' => 'Title Number ' . $i ,
                'desc_ar' => 'وصف البانر رقم ' . $i ,
                'desc_en' => $fake->text(200) ,
                'img' => 'banners/1.png' ,
                'link' => 'link.com' ,
            ]);
        }
    }
}
