<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productprice extends Model
{
    use HasFactory;

    protected $table = "product_price";

    protected $fillable = ['id_product','category','sr', 'name','price','active'];

}
