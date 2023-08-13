<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;


    protected $fillable = [
        // 'name',
    ];

    public function userable(){
        return $this->morphOne(User::class,'userable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function favoritable(){
        return $this->morphMany(Favorite::class,'favoritable');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

 


}
