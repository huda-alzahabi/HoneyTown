<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class AdminController extends Controller
{
    public function addItem(Request $request){
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->image= $request->image;
        $item->save();

        return response()->json([
            "status" => "Success",
            "item" => $item
        ], 200);
    }

    public function addCategory(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->image= $request->image;
        $category->save();

        return response()->json([
            "status" => "Success",
            "category" => $category
        ], 200);
    }

}
