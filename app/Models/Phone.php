<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["phone", "id", "parent_type", "created_at"];

    public function parent()
    {
        return $this->morphTo();
    }
}
