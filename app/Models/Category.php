<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'desc'];

    protected $fillable = [
        'name',
        'desc',
    ];
    // public function subcategories(){
    //     return $this->belongsToMany(Category::class , 'subcategory', 'parent_id', 'subcategory_id');
    //      return $this->belongsToMany(Subcategory::class, 'product');
    // }

    public function subcategories()
    {
        return $this->belongsToMany(Category::class, 'subcategories', 'subcategory_id', 'parent_id');
    }



}