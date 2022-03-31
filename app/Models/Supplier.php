<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','supplier_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','supplier_editor','id');
    }
}
