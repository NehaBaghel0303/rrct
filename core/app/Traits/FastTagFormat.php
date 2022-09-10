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

trait FastTagFormat
{
    function fastTagFormat($length = 10){ 

        $data = LorryReceipt::query();

        $data->with('remarks',function($q){
            $q->where('user_id',auth()->id())->where('type','fasttag');
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
            $item['tot_toll_both_cont'] = getTotalTollBothCount();
            $item['act_toll_both_count'] = getActualTollBothCount();
            $item['tot_ft_amt'] = getTotalFastTagAmount();
            $item['act_ft_amt'] = getActualFastTagAmount();
            $item['var_dif_amt'] =  getVarianceDifferenceAmount();
            $item['remark'] = "Update Remark";

            $d['item'] =  (object)$item;
        }
        return view('backend.report.fasttag.load',compact('data'));
    }

}