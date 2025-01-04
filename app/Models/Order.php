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
    public function user(){
        return $this->belongsTo(User::class);
    }
    #一個訂單包含多個訂單明細(一對多)
    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }
    public function meal()
    {
        return $this->belongsToMany(Meal::class,'order_items')
            ->withPivot(
                'id',
                'quantity',
                'status',
                'endtime',
            )
            ->withTimestamps();
    }

}
