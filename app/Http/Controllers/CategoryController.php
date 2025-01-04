<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Meal;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $data=[
            'categories'=>$categories,
        ];
        return view('poster.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('id','DESC')->get();
        $data=[
            'categories'=>$categories
        ];
        return view('poster.categories.create',$data);
    }


    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('poster.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
//        $category=Category::orderBy('id','DESC')->get();
        $data=[
            'category'=>$category,
        ];
        return view('poster.categories.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        $data=[
            'category'=>$category
        ];
        return view('poster.categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name'=>$request->name,
        ]);
//        $category=Category::orderBy('id','DESC')->get();
        $data=[
            'category'=>$category,
        ];
        return view('poster.categories.show',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $meal=Meal::where('category_id','=',$category->id)->get();
     Meal::destroy($meal);
    Category::destroy($category->id);



    return redirect()->route('poster.categories.index');
    }
}
