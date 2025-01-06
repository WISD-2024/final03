<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //未登入時
    public function home()
    {
        $meals = Meal::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $categories=Category::orderBy('id','DESC')->get();
        $data=[
            'meals'=>$meals,
            'categories'=>$categories
        ];
        return view('index',$data);
    }

    //按照點選的categories顯示meals
    public function sid(Category $category)
    {
        $categories=Category::orderBy('id','DESC')->get();//sidenav顯示類別
        $meals=Meal::where('category_id','=',$category->id)->get();//找到與category相關的meal
        $data=[
            'meals'=>$meals,
            'categories'=>$categories
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
