<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'pay',
        'starttime',
        'total',
        'way',
        'status',
    ];

    #訂單及顧客之間的關係(一對一)

    #一個訂單包含多個訂單明細(一對多)
    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }
}
