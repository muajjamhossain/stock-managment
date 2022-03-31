<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categoryInfo(){
        return $this->belongsTo('App\Models\ProductCategory','prodcate_id','prodcate_id');
    }

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','product_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','product_editor','id');
    }

}
