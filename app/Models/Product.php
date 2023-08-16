<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'price',
        'status',
        'Assess',
        'quantity',
        'sell',
    ];

    // public function clients(){
    //     return $this->belongsToMany(Client::class,'favorite');
    // }

    public function colors(){
        return $this->BelongsToMany(Color::class,'color_product');
    }


    
    public function cities(){
        return $this->belongsToMany(City::class,'city_product');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_product');
    }

    public function favoritable(){
        return $this->morphMany(Favorite::class,'favoritable');
    }

    public function subcategory(){
        return $this->belongsTo(subcategory::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }


}
