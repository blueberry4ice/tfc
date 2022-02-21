<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cruiseitinerary extends Model
{
    use HasFactory;

    protected $table = "cruise_itineraries";

    protected $fillable = ['id_package','id_itinerary','from','to','date','desc','sr','active'];
}
