<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 1. Hadu houma l'fields li Laravel l'7aq i'3mmer
    protected $fillable = ['client_id', 'total_price'];

    // 2. Er-relation m3a l'Client
    public function client() 
    {
        return $this->belongsTo(Client::class);
    }

    // 3. Er-relation m3a l'Product (pivot table)
    public function products() 
    {
        // Zdna 'price' bach n'7fdu taman l'bi3a f dak l'weqt
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
}