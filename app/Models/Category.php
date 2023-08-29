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

        public function parentcategory(){
            return $this->hasOne(Category::class,'id','parent_id')->select('id','category_name','url')
            ->where('status',1);

        }

        public function subcategories()
        {
            return $this->hasMany(Category::class, 'parent_id')->where('status',1);
        }
        
        
        public static function getCategories(){

            $getcategories=Category::with(['subcategories'=>function($query){
                $query->with('subcategories');
            }])->where('parent_id',0)->where('status',1)->get()->toArray();
           return($getcategories);
        }

}