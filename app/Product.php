<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'product_name','product_slug','product_category','product_categoryid','category_name','short_description',
        
          
    ];

    public function Category() 
    {
        return $this->belongsTo('App\Category', 'product_categoryid', 'categoryid');
    }
}
