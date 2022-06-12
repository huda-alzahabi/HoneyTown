<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class AdminController extends Controller
{
    public function addItem(Request $request){
         $this->validate($request,[
        'name' => 'required|max:250',
        'price' => 'required',
        'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        'categories_id' => 'required',  ]);

        $path = $request->file('image')->store('public/image/image');
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->image= $path;
        $item->categories_id= $request->categories_id;
        $item->save();

        return response()->json([
            "status" => "Success",
            "item" => $item
        ], 200);
    }

    public function addCategory(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            "status" => "Success",
            "category" => $category
        ], 200);
    }
     public function getAllCategories(){
       $categories = Category::all();
        return response()->json([
            "status" => "Success",
            "categories" => $categories
        ], 200);
    }

}
