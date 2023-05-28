<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    public function payment(){
          return $this->belongsTo(payment::class,'id','invoice_id');
    }
    
}
