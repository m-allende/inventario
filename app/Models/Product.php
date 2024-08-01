<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'name',
        'description',
        'expiration',
        'brand_id',
        'category_id',
        'presentation_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
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
