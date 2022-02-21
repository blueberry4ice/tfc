<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roaming extends Model
{
    use HasFactory;

    protected $table = "roaming";

    protected $fillable = ['sku','name','summary','detail','continent','country','city','image','thumbnail', 'flyer'];


}
