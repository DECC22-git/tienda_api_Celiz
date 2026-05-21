<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(Client::class,'clients_id');
    }
    public function product(){
        return $this->hasMany(Product::class,'orders_id');
    }

}

