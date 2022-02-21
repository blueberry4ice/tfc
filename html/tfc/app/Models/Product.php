<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class Product extends Model
{
    use HasFactory;

    protected $table = "products";


    public static function getContinent()
    {
        $query = "(
            Select distinct continent  FROM destinations
            ) AS VIEW_RESULT";
            $continents = DB::table(DB::raw($query))->get();
            return json_decode($continents,true);
    }

    public static function createCountry($continent, $tablename)
    {
       
            DB::select('call get_country(?)',array($continent));
            DB::select('call get_country2(?)',array($continent));
           
         
    }

    public static function getCountry($continent, $tablename)
    {
        if ($tablename == 0) {
            $query = "(
                SELECT `name` as country FROM temp_country2 where continent = '{continent}'
                ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
        } else {
            $query = "(
                SELECT `name` as country FROM temp_country2 where continent = '{continent}' 
                ) AS VIEW_RESULT";
            $query = str_replace("{continent}", $continent, $query);
            
        }
        
        $countries = DB::table(DB::raw($query))->orderBy('country', 'asc')->get();

        return json_decode($countries,true);
    }
}
