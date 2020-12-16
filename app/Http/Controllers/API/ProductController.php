<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Product_variation;
use Validator;
use Session;
use DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // To show all category

//     public function index(Request $request, $slug)
// {
//     $products = Product::whereHas('product_category', function ($query) use ($categorySlug) {
//         $query->where('category_slug', $categorySlug);
//     })->get();
// }

public function getAllProductName()
{
    error_log('Product');
    return Product::all();
}

public function storeProductName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'product_name'  => 'required',
            'product_slug' => 'required',
            'product_category' => 'required',
            'product_categoryid'  => 'required',
            'category_name' => 'required',
            'short_description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        error_log('Rashmi was here');
        $product = Product::create($request->all());
        return response()->json([
            "message" => "Product stored",
        ], 201);

    }

public function index()
{  
    error_log("in index");
    $category = Product::select('categories.category_name','products.*')
                ->leftJoin('categories','categories.categoryid','products.product_categoryid')->get();
    foreach($category as $c)
    {
        $output[]=array(
            "category"=>$c->category_name
        );
    }   
    return response()->json($category);
}
    

public function create()
{  
    error_log("in create");
    $product = Product::select('product_variations.attribute_rate','products.*')
                ->leftJoin('product_variations','product_variations.product_id','products.productid')->get();
    foreach($product as $p)
    {
        error_log("product");
        $output[]=array(
            "product"=>$p->attribute_rate
            
        );
    }   
    return response()->json($product);
}

// $order=new Order();
//         	$order->dealerid=$request->dealerid;
//         	$order->executiveid=$request->executiveid;
//         	$order->amount=$request->totalamount;
//         	$order->orderdate=date('Y-m-d');
//         	$order->orderstatus='pending';
//         	$order->paymentstatus='pending';
//             $items=json_decode($request->items);
//         	if($order->save())
//         	{
//         		$id=$order->id;
//         		foreach($items as $item)
//         		{
//         			$od=new Orderitem();
//         			$od->orderid=$id;
//         			//$od->dealerid=$request->dealerid;
//         			$od->quantity=$item->quantity;
//         			$od->productid=$item->productid;
//         			$od->itemprice=$item->itemprice;
//         			$od->totalamount=$item->quantity*$item->itemprice;
//         			$od->save();
//         		}
//         		$resp = ['success'=>'true','response'=>'Order received successfully'];
//         	}
public function product(Request $request)
{  
    error_log("in create");
    $data = new Product();
    $data->productid = $request-> productid;
    $data->product_name = $request->product_name;
    $data->product_slug = $request->product_slug;
    $data->product_category = $request->product_category;
    $data->product_categoryid = $request->product_categoryid;
    $data->category_name = $request->category_name;
    $data->short_description = $request->short_description;
    // Print_r ($data);
    $variations = json_decode($request->variation);
    if($data->save())
    {
        echo $data->id;
        $id=$data->id;
        foreach($variations as $variation)
        {
            $var = new Product_variation();
            $var->id = $id;
            $var->productid = $pid;
            $var->attribute_id = $attribute_id;
            $var->attribute_value = $attribute_value;
            $var->attribute_rate = $attribute_rate;
            $var->save();
        }
        //print_r($variations);
    
    }
                
    $resp = ['success'=>'true','response'=>'Product received successfully'];

}
    


// public function product()
// {  
//     error_log("in create");
//     $product = Product::select('products.*','product_variations.*')
//                 ->leftJoin('product_variations','product_variations.product_id','products.productid')->get();


    
}
