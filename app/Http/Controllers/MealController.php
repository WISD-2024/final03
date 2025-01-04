<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMealRequest;
use Illuminate\Support\Facades\Storage;
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

    //搜尋功能
    public function search(Request $request)
    {
        $search = $request->input('search');
        $meals = Meal::query()->where('name', 'LIKE', "%{$search}%")->get();
        $categories=Category::orderBy('id','DESC')->get();//sidenav顯示類別
          $data=['meals'=>$meals,'categories'=>$categories];//index的sib需要類別的資料，記得給分類的資料
          return view('index',$data);
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
            //把檔案存到公開的資料夾
            $request->file('image')->move(public_path('/images'), $imageName);
        }

        //儲存至DB
        Meal::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'image'=>$imageName,
        ]);

        //回到傳送資料來的頁面
        return redirect()->route('poster.meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal){
        $categories=Category::where('id','=',$meal->category_id)->get();
        $data=[
            'meal'=>$meal,
            'categories'=>$categories,
        ];
        return view('poster.meals.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $category_all=Category::orderBy('id','DESC')->get();//所有類別
        $categories=Category::where('id','=',$meal->category_id)->get();//目前餐點的類別
        $data=[
            'meal'=>$meal,
            'category_all'=>$category_all,
            'categories'=>$categories,
        ];
        //回傳頁面
        return view('poster.meals.edit',$data);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealRequest  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //確認有檔案的話儲存到資料夾
        if ($request->hasFile('image')) {
//            echo 'OKK';
            //取格硬碟實例
            $disk=Storage::disk('images');
            //刪除指定檔案
            $disk->delete($meal->image);

            //自訂檔案名稱
            $imageName = time().'.'.$request->file('image')->extension();
            //把檔案存到公開的資料夾
            $request->file('image')->move(public_path('/images'), $imageName);

        }else{
            //如果沒有上傳新檔案抓取原檔案的路徑
            $imageName=$meal->image;
//            echo "NOO";
        }

        //更新至DB
        $meal->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'image'=>$imageName,
        ]);

        $categories=Category::where('id','=',$meal->category_id)->get();
        $data=[
            'meal'=>$meal,
            'categories'=>$categories,
        ];
        return view('poster.meals.show',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //抓出public/images裡的圖片
        $disk=Storage::disk('images');
        //刪除指定檔案
        $disk->delete($meal->image);
        //刪除meals的資料
        $meal->delete();
        return redirect()->route('poster.meals.index');
    }
}
