<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Product_variation;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function showcategory()
    {
                 $category=category::all();
                 return response()->json($category);
    }
}
