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
use App\Models\LRProgress;
use App\Models\LorryReceipt;

use Illuminate\Support\Str;

trait TripFormat
{
    function tripFormat($length = 10){
       
        $data = LorryReceipt::query();
        
        
        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','trip');
        });
        $data = $data->paginate($length);


        // Records        
        foreach($data as $d){
            $payload = json_decode($d->payload);
            $item['v_n'] = $payload->vehicleDetails->vehicle_no;
            $item['lr_n'] = $payload->lrno;
            $item['inv_n'] = $payload->invoice_no;
            $item['branch'] = $payload->branch;
            $item['src'] = $payload->originDetails->from_place;
            $item['pty_n'] = $payload->destinationDetails->consignee;
            $item['destination'] = $payload->destinationDetails->to_place;
            $item['eta'] = getTripETA();
            $item['sta'] = getTripSTA();
            $item['delay'] = getTripDelay();
            $item['tot_idl_dur_at_lp'] = getTotIdleDurAtLoadingPoint();
            $item['tot_idl_dur_at_int'] = getTotIdleDurAtInTransit();
            $item['tot_idl_dur_at_up'] = getTotIdleDurAtUnloadingPoint();
            $item['trip_tat'] = getTripTAT();
            $item['status'] =  getTripStatus();
            $item['ft_var_dif_amt'] = getVarianceDifferenceAmount();
            $item['dsl_var_dif_amt'] = getDieselVarianceDifferenceAmount();
            $item['remark'] = "Update Remark";
            $d['item'] =  (object)$item;
        }

        return view('backend.report.trip.load',compact('data'));
    }

}