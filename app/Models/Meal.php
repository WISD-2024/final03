<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'created_at',
        'updated_at',
        'category_id',
        'name',
        'price',
        'image',
    ];

    #多個餐點可被多個顧客選購(多對多)
    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }
    #一個餐點只會屬於一個類別
    public function category(){
        return $this->belongsTo(Category::class);
    }

    #一個餐點包含在多個訂單明細中(一對多)
    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }
    
    public function order()
    {
        return $this->belongsToMany(Order::class,'order_items')
            ->withPivot(
                'id',
                'quantity',
                'status',
                'endtime',
            )
            ->withTimestamps();
    }
}
