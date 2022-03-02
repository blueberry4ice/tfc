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
        return json_decode($continents, true);
    }

    public static function createCountry($continent, $tablename, $menu)
    {
        switch ($menu) {
            case '0':
                DB::select('call get_country(?)', array($continent));
                DB::select('call get_country2(?)', array($continent));
                break;
            case '2':
                DB::select('call get_country_attractions(?)', array($continent));
                DB::select('call get_country2_attractions(?)', array($continent));
                break;
            case '3':
                DB::select('call get_country_cruise(?)', array($continent));
                DB::select('call get_country2_cruise(?)', array($continent));
                break;
            case '4':
                DB::select('call get_country_rails(?)', array($continent));
                DB::select('call get_country2_rails(?)', array($continent));
                break;
            case '5':
                DB::select('call get_country_sightseeing(?)', array($continent));
                DB::select('call get_country2_sightseeing(?)', array($continent));
                break;
            case '6':
                DB::select('call get_country_tourpackages(?)', array($continent));
                DB::select('call get_country2_tourpackages(?)', array($continent));
                break;
            case '7':
                DB::select('call get_country_travelinsurance(?)', array($continent));
                DB::select('call get_country2_travelinsurance(?)', array($continent));
                break;
            case '8':
                DB::select('call get_country_cars(?)', array($continent));
                DB::select('call get_country2_cars(?)', array($continent));
                break;
            case '9':
                DB::select('call get_country(?)', array($continent));
                DB::select('call get_country2(?)', array($continent));
                break;
            case '10':
                DB::select('call get_country_visa(?)', array($continent));
                DB::select('call get_country2_visa(?)', array($continent));
                break;
            case '11':
                DB::select('call get_country_roaming(?)', array($continent));
                DB::select('call get_country2_roaming(?)', array($continent));
                break;
            case '12':
                DB::select('call get_country_hotel(?)', array($continent));
                DB::select('call get_country2_hotel(?)', array($continent));
                break;
            case '13':
                DB::select('call get_country_flight(?)', array($continent));
                DB::select('call get_country2_flight(?)', array($continent));
                break;

            default:
                # code...
                break;
        }
    }

    public static function getCountry($continent, $tablename)
    {
        // dd($tablename);
        switch ($tablename) {
            case '0':
                $query = "(
                            SELECT `name` as country FROM temp_country2 where continent = '{continent}'
                            ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'attractions':
                $query = "(
                                    SELECT `name` as country FROM temp_country2_attractions where continent = '{continent}'
                                    ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'cruise':
                $query = "(
                                        SELECT `name` as country FROM temp_country2_cruise where continent = '{continent}'
                                        ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'rails':
                $query = "(
                                            SELECT `name` as country FROM temp_country2_rails where continent = '{continent}'
                                            ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'sightseeing':
                $query = "(
                                                SELECT `name` as country FROM temp_country2_sightseeing where continent = '{continent}'
                                                ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'tourpackages':
                $query = "(
                                                    SELECT `name` as country FROM temp_country2_tourpackages where continent = '{continent}'
                                                    ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'travelinsurance':
                $query = "(
                                                        SELECT `name` as country FROM temp_country2_travelinsurance where continent = '{continent}'
                                                        ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'cars':
                $query = "(
                                                            SELECT `name` as country FROM temp_country2_cars where continent = '{continent}'
                                                            ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'visa':
                $query = "(
                                                                SELECT `name` as country FROM temp_country2_visa where continent = '{continent}'
                                                                ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'roaming':
                $query = "(
                                                                    SELECT `name` as country FROM temp_country2_roaming where continent = '{continent}'
                                                                    ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'hotel':
                $query = "(
                                                                        SELECT `name` as country FROM temp_country2_hotel where continent = '{continent}'
                                                                        ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;
            case 'flight':
                $query = "(
                                SELECT `name` as country FROM temp_country2_flight where continent = '{continent}'
                                ) AS VIEW_RESULT";
                $query = str_replace("{continent}", $continent, $query);
                break;

            default:
                # code...
                break;
        }
        // if ($tablename == 0) {
        //     $query = "(
        //         SELECT `name` as country FROM temp_country2 where continent = '{continent}'
        //         ) AS VIEW_RESULT";
        //     $query = str_replace("{continent}", $continent, $query);
        // } else {
        //     $query = "(
        //         SELECT `name` as country FROM temp_country2 where continent = '{continent}' 
        //         ) AS VIEW_RESULT";
        //     $query = str_replace("{continent}", $continent, $query);
        // }

        $countries = DB::table(DB::raw($query))->orderBy('country', 'asc')->get();

        return json_decode($countries, true);
    }
}
