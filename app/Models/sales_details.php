<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_details extends Model
{
    use HasFactory;

    
    protected $table = 'sales_details';
    protected $primaryKey = 'id';
     protected $fillable = [
          'total_cost',
          'qty',
          'price',
          'product_id',
          'sales_id',
         
          
      ];
      public function sales(){
        return $this->belongsTo(Sales::class,'sales_id');
      }

}
