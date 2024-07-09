<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
     protected $fillable = [
          'category',
          'status',
          
      ];

      public function products(){
        return $this->hasMany(Product::class,'cat_id');
      }
  
}
