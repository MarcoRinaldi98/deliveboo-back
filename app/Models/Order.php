<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }

    protected $fillable = [

        'guest_order_code',
        'guest_name',
        'guest_surname',
        'guest_email',
        'guest_address',
        'amount',
        'guest_phone',
    ];
}
