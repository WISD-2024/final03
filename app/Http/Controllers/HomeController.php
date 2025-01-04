<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //會員未登入時
    public function home()
    {
        $meals = Meal::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $data=[
            'meals'=>$meals
        ];
        return view('index',$data);
    }

    public function index()
    {

        $role=Auth::user()->role;//目前使用者，users資料表的role欄位

        if($role =='1')
        {
            return view('poster.index');
        }
        if($role =='2'){
            return view('staff.index');
        }
        else
        {
            //顧客登入後role為0，轉至顧客訂單初始化路由
            return  redirect()->route('orders.orders.init');
        }

    }
}
