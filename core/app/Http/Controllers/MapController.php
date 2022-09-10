<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ActiveDevices;

class MapController extends Controller
{
    use ActiveDevices;
    public function getDevicesJson(Request $request){
       
       return $this->activeDevices();
    }
}
