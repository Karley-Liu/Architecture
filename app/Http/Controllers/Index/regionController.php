<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use DB;

class regionController extends Controller
{
    //
    public function getContinents(){
	    $db=DB::table('global_area');
	    $result=$db ->where('supper_id',0) ->get();
	    return $result;
    }
    
    public function getCountries(Request $request){
    	$continent_id=intval($request ->input('continent_id'));
//  	dd($continent_id);
//  	$continent_id=$_POST['continent_id'];
    	$db=DB::table('global_area');
    	$result=$db ->where('supper_id',$continent_id) ->get();
    	return $result;
    }
    
    public function getCities(Request $request){
    	$country_id=intval($request ->input('country_id'));
    	$db=DB::table('global_area');
    	$result=$db ->where('supper_id',$country_id) ->get();
    	return $result;
    }
}
