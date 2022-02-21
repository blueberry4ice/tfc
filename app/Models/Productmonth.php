<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productmonth extends Model
{
    use HasFactory;
    protected $table = "product_month";
    protected $fillable = ['id_product','category','sr', 'id_month','active'];
}
