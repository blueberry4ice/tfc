<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touritinerary extends Model
{
    use HasFactory;

    protected $table = "tour_itineraries";

    protected $fillable = ['id_package','id_itinerary','from','to','date','desc','sr','active'];
}
