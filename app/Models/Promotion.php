<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'name',
        'description'
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'promotion_product')->withPivot('quantity');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'promotion_service')->withPivot('quantity');
    }

    public function prices()
    {
        return $this->morphMany(Price::class, "parent");
    }

    public function lastPrice()
    {
        return $this->morphOne(Price::class, "parent")->latestOfMany();
    }
}
