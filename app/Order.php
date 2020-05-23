<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product' , 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'price');;
    }

    public function partner() {
        return $this->belongsTo('App\Partner');
    }
}
