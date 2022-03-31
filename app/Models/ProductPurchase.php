<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

    public function productInfo(){
        return $this->belongsTo('App\Models\Product','product_id','product_id');
    }

    public function supplierInfo(){
        return $this->belongsTo('App\Models\Supplier','supplier_id','supplier_id');
    }

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','purchase_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','purchase_editor','id');
    }
    
}
