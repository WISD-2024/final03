<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
            return view('welcome');
        }
    }
}
