<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'abbreviation',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
