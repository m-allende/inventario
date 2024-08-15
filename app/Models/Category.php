<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, "parent");
    }

    public function lastPhoto()
    {
        return $this->morphOne(Photo::class, "parent")->latestOfMany();
    }
}
