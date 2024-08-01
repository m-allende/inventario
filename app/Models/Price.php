<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["price", "id", "parent_type", "parent_id", "created_at"];

    public function parent()
    {
        return $this->morphTo();
    }
}
