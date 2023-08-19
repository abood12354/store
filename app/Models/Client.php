<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'phoneNumber',
        'address',
    ];


    public function userable(){
        return $this->morphOne(User::class,'userable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function products(){
    //     return $this->belongsToMany(Product::class,'favorite');
    // }

    // public function comments(){
    //     return $this->hasMany(Client::class);
    // }

    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

}
