<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
    'id',
    'name',
];
    #一個類別擁有多個餐點(一對多)
    public function meals(){
        return $this->hasMany(Category::class);
    }
}
