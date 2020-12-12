<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'product_name','product_slug','product_category','category_name','short_description',
        
          
    ];
}
