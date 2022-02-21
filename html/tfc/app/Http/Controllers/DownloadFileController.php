<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DownloadFileController extends Controller
{
    //
    function downloadfile($productid, $category){
            Log::info(print_r($productid, true));
        }


}
