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

trait DelayETALPFormat
{
    function delayETALPFormat($length = 10){
        
        $data = LorryReceipt::query();
        
        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','delay_eta_at_lp');
        });
        
        $data = $data->paginate($length);
        // Records        
        foreach($data as $d){
            $payload = json_decode($d->payload);
            $item['v_n'] = $payload->vehicleDetails->vehicle_no;
            $item['cus'] = NameById($d->consignor_id);
            $item['duration'] = getDuration();
            $item['remark'] = 'Update Remark';
            $d['item'] =  (object)$item;
        }
        return view('backend.report.delay-eta-at-loading-point.load',compact('data'));
    }

}