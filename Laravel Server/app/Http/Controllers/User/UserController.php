<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Favorite;

class UserController extends Controller
{
    public function getAllItems(){

       $items = Item::all();
        return response()->json([
            "status" => "Success",
            "items" => $items
        ], 200);
    }

    public function getFavoriteItems(Request $request){
        $favorites= Favorite::where("user_id",$request->id)->get();
         return response()->json([
            "status" => "Success",
            "favorites" => $favorites
        ], 200);
    }
    public function addToFavorites(Request $request){
        $favorite = new Favorite;
        $favorite["user_id"] = $request->user_id;
        $favorite["item_id"] = $request->item_id;
        $favorite->save();

        return response()->json([
            "status" => "Success",
            "users" => $favorite
        ], 200);
    }
}
