<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        
        Category::insert([
             
            // category 

            [

                'name_ar'    => 'قسم الالكترونيات' ,
                'name_en'    => 'Electronic' ,
                'img'        => 'categories/1.png' ,
                'desc_ar'    => null ,
                'desc_en'    => null ,
                'type'       => 'category' ,
            ] ,

            [

                'name_ar'    => 'قسم الادوات المنزليه' ,
                'name_en'    => 'Electronic' ,
                'img'        => 'categories/1.png' ,
                'desc_ar'    => null ,
                'desc_en'    => null ,
                'type'       => 'category' ,
            ] ,


            [

                'name_ar'    => 'قسم الادوات الكهربائيه' ,
                'name_en'    => 'Electronic' ,
                'img'        => 'categories/1.png' ,
                'desc_ar'    => null ,
                'desc_en'    => null ,
                'type'       => 'category' ,
            ] ,


            // services

            [

                'name_ar'    => 'الخدمه الاولي' ,
                'name_en'    => 'services' ,
                'img'        => 'services/1.png' ,
                'desc_ar'    => 'وصف الخدمه الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'service' ,
            ] ,

            [

                'name_ar'    => 'الخدمه التانيه' ,
                'name_en'    => 'services' ,
                'img'        => 'services/1.png' ,
                'desc_ar'    => 'وصف الخدمه الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'service' ,
            ] ,



            [

                'name_ar'    => 'الخدمه التالته' ,
                'name_en'    => 'services' ,
                'img'        => 'services/1.png' ,
                'desc_ar'    => 'وصف الخدمه الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'service' ,
            ] ,


            // static

            [

                'name_ar'    => 'البتاع الاولي' ,
                'name_en'    => 'statics' ,
                'img'        => 'statics/1.png' ,
                'desc_ar'    => 'وصف البتاع الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'static' ,
            ] ,

            [

                'name_ar'    => 'البتاع التانيه' ,
                'name_en'    => 'statics' ,
                'img'        => 'statics/1.png' ,
                'desc_ar'    => 'وصف البتاع الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'static' ,
            ] ,

            [

                'name_ar'    => 'البتاع التالته' ,
                'name_en'    => 'statics' ,
                'img'        => 'statics/1.png' ,
                'desc_ar'    => 'وصف البتاع الاولي' ,
                'desc_en'    => 'text' ,
                'type'       => 'static' ,
            ] ,






        ]);
    }
}
