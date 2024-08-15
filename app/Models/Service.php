<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'name',
        'description'
    ];

    public function prices()
    {
        return $this->morphMany(Price::class, "parent");
    }

    public function lastPrice()
    {
        return $this->morphOne(Price::class, "parent")->latestOfMany();
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, "parent");
    }

    public function lastPhoto()
    {
        return $this->morphOne(Photo::class, "parent")->latestOfMany();
    }
}
