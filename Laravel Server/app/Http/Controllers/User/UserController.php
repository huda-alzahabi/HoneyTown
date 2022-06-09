<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class UserController extends Controller
{
      public function getAllItems(){

       $items = Item::all();
        return response()->json([
            "status" => "Success",
            "items" => $items
        ], 200);
    }
}
