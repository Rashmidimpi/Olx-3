<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use Validator;

class WishlistController extends Controller
{
    //
    public function getAllWishlistName()
    {
        error_log('Rashmi is here');
        return Wishlist::all();
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            
           
            'id'  => 'required',
            'userid' => 'required',
            'productid' => 'required',
            'is_deleted_at' => 'required',
              
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
    
        error_log('Rashmi was here');
        $wishlist = Wishlist::create($request->all());
        return response()->json([
            "message" => "Wishlist saved",
        ], 201);
    
    }

    //Need to delete but update kind of
}
