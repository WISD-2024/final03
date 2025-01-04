<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
        protected $fillable =[
            'id',
            'created_at',
            'updated_at',
            'name',
            'account',
            'password',
    ];

    #顧客及訂單之間的關係(一對一)

    #多個顧客可選購多個餐點(多對多)
    public function meal()
    {
        return $this->belongsToMany(Meal::class);
    }
}
