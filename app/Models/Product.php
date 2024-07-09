<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
     protected $fillable = [
          'product',
          'cat_id',
          'brand_id',
          'price',
          
      ];

      
      public function category(){
        return $this->belongsTo(categories::class,'cat_id');
      }
      
      public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
      }
  
}
