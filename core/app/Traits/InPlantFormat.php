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
use App\Models\LorryReceipt;

trait InPlantFormat
{
    function inPlantFormat($length = 10){
    
        $data = LorryReceipt::query();

        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','inplant');
        });

        $data = $data->paginate($length);

        // Records        
        foreach($data as $d){
            $payload = json_decode($d->payload);
            
            $item['v_n'] = $payload->vehicleDetails->vehicle_no;
            $item['branch'] = $payload->branch;
            $item['cus'] = $payload->originDetails->consignor;
            $item['plt_in_dt'] = \Carbon\Carbon::now();
            $item['plt_out_dt'] = \Carbon\Carbon::now();
            $item['plt_tat'] = \Carbon\Carbon::now();
            $item['remark'] = "Update Remark";

            $d['item'] =  (object)$item;
        }
        
       return view('backend.report.inplant.load',compact('data'));
    }

}