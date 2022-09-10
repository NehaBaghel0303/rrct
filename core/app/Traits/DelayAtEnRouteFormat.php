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


trait DelayAtEnRouteFormat
{
    function delayAtEnRouteFormat($length = 10){
       
        $data = LorryReceipt::query();
        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','delay_eta_at_er');
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
        return view('backend.report.delay-at-en-route.load',compact('data'));
    }

}