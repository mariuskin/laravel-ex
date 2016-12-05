<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    

        
    public function __construct()
    {
      $this->middleware('auth');
    }

    private function getAvailableAppLangArray()
	{

  	$locales[''] = Lang::get('app.select_your_language');  

  	foreach (Config::get('app.locales') as $key => $value){
    	$locales[$key] = $value;
  	}
  	
  	return $locales;
	
	}





  
}
