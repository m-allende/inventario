<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'supplier_id',
        'type',
        'number',
        'date',
        'neto',
        'tax',
        'total',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'purchase_product')->withPivot('total', 'price', 'quantity');
    }

}
