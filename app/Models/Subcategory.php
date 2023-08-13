<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Subcategory extends Pivot
{
    use HasFactory;

    protected $table = "subcategories";

    public function products(){
         return $this->hasMany(Product::class);
    }

}
