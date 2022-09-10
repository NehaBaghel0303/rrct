<?php 
/**
 *
 * @category zStarter
 *
 * @ref zCURD
 * @author  Defenzelite <hq@defenzelite.com>
 * @license https://www.defenzelite.com Defenzelite Private Limited
 * @version <zStarter: 1.1.0>
 * @link    https://www.defenzelite.com
 */

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\DeviceLog;

trait ActiveDevices
{
    function activeDevices($length = 1){
        
        $devices = DeviceLog::get();
        $d = array();
        foreach ($devices as $key => $value) {
            $d[] = [
                "lat"=>$value->lat,
                "lng"=>$value->lon,
                "title"=>$value->vehicle_no,
                "street"=>$value->device_id,
                "city"=>$value->vht_type,
                "zip"=> $value->created_at
            ];
        }
        return json_encode($d);
    }

}