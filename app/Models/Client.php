<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function order(){
        return $this->hasMany(Order::class,'clients_id');
    }
    protected $fillable = [
        "name",
        "email",
        "phone",
        "address"
    ];
}

    
