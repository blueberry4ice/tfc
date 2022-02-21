<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rail extends Model
{
    use HasFactory;

    protected $table = "rails";

    protected $fillable = ['sku','name','summary','detail','continent','country','city','image','thumbnail','flyer'];

}
