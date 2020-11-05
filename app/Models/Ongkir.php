<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class, 'ongkir_id', 'id');
    }
}
