<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourpackage extends Model
{
    use HasFactory;

    protected $table = "tourpackages";

    protected $fillable = ['sku','name','summary','continent','country','city','image','thumbnail'];


}
