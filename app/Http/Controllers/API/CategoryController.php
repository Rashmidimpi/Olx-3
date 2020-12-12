<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategoryName()
    {
        error_log('Rashmi is here');
        return Category::all();
    }

    public function storeCategoryName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'category' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        error_log('Rashmi was here');
        $category = Category::create($request->all());
        return response()->json([
            "message" => "category created",
        ], 201);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>'required',     
        ]);

        $category = Category::find($id);
        $category->category =  $request->get('category');
       
        $category->save();

        return redirect('/categories')->with('success', 'updated!');
    }

    public function destroy($id)
    {
        error_log('id to delete');
        error_log($id);
        if(Category::where('id', $id)->exists()) {
            $user = Category::find($id);
            $user->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          }

        $todor->destroy();
        return response()->json(null, 204);

    }

}
