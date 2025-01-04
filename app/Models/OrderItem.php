<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'meal_id',
        'quantity',
        'status',
        'endtime'
    ];

    #再多個訂單明細中包含某一個餐點(多對一)
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    #多個訂單明細包含在某一個訂單中(多對一)
    public function order(){
        return $this->belongsTo(Order::class);
    }

}
