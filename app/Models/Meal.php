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
        'pic',
    ];
}
