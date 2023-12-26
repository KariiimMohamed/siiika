<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    } // end 
    
    public function getDescAttribute()
    {
        return $this->attributes['desc_' . app()->getLocale()];
    } // end getNameAttribute

    // function has many products
    public function products(){
        return $this->hasMany(Product::class , 'category_id');
    }



}
