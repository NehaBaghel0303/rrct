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
use App\Models\LRProgress;
use App\Models\LorryReceipt;

trait InTransitFormat
{
    function inTransitFormat($length = 10){
        
        $data = LorryReceipt::query();

        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','intransit');
        });

        $data = $data->paginate($length);

        // Records        
        foreach($data as $d){
            $payload = json_decode($d->payload);
            $item['v_n'] = $payload->vehicleDetails->vehicle_no;
            $item['lr_n'] = $payload->lrno;
            $item['inv_n'] = $payload->invoice_no;
            $item['brch'] = $payload->branch;
            $item['src'] = $payload->originDetails->from_place;
            $item['pty_n'] = $payload->destinationDetails->consignee;
            $item['destination'] = $payload->destinationDetails->to_place;
            $item['eta'] = getTripETA();
            $item['sta'] = getTripSTA();
            $item['delay'] = getTripDelay();
            $item['cur_loctn'] = getCurrentLocation();
            $item['cur_dt'] = "N/A";  //Current Date & Time
            $item['speed'] = getTripSpeed();
            $item['status'] =getTripStatus();
            $item['remark'] = "Update Remark";
            $d['item'] =  (object)$item;
        }
        return view('backend.report.intransit.load',compact('data'));
    }

}