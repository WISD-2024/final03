<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMealRequest;
use Illuminate\Support\Facades\Validator;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $data=[
            'meals'=>$meals
        ];

        return view('poster.meals.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //新增餐點頁面
    public function create()
    {
        $categories=Category::orderBy('id','DESC')->get();
        $data=[
            'categories'=>$categories
        ];
        return view('poster.meals.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMealRequest  $request
     * @return \Illuminate\Http\Response
     */
    //儲存餐點資料
    public function store(Request $request)
    {
        //驗證資料
        Validator::make($request->all(), [
            'image' => 'required|image',
        ])->validate();

        //確認有檔案的話儲存到資料夾
        if ($request->hasFile('image')) {
            //自訂檔案名稱
            $imageName = time().'.'.$request->file('image')->extension();
            //把檔案存到專案的public/images資料夾裡
            $request->file('image')->move(public_path('/images'), $imageName);
        }

        //儲存至DB
        Meal::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'image'=>$imageName,
        ]);
        return view('poster.meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealRequest  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
