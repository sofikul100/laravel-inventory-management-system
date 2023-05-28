<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_deteils extends Model
{
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
}
