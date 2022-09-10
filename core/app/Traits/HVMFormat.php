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

trait HVMFormat
{
    function hVMFormat($length = 10){
       
        $data = LorryReceipt::query();
        $data = $data->paginate($length);

        // Records
        foreach($data as $d){
            $item['client'] = NameById($d->consignee_id);
            $item['on_device'] = getOnlineDevice();
            $item['off_device'] = getOfflineDevice(); 
            $d['item'] =  (object)$item;
        }
        
        return view('backend.report.hvm.load',compact('data'));
    }

}