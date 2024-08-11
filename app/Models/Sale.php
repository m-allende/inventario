<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'type',
        'number',
        'date',
        'neto',
        'tax',
        'total',
        'discount',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_sale')->withPivot('total', 'price', 'quantity');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'service_sale')->withPivot('total', 'price', 'quantity');
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class, 'promotion_sale')->withPivot('total', 'price', 'quantity');
    }

    public function observations()
    {
        return $this->morphMany(Observation::class, "parent");
    }

    public function lastObservation()
    {
        return $this->morphOne(Observation::class, "parent")->latestOfMany();
    }
}
