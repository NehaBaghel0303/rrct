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

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;   
use App\Models\LorryReceipt;
use App\User;
use App\Models\DeviceLog;

class CronController extends Controller
{
        
  
    public function lorryReceipt(Request $request){

        $response = Http::post('https://rrpl.online/RRPL_API/Control_Tower/get_lrs.php', [
            'date_type' => 'LR_DATE',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
       $data = json_decode($response->getBody());
       if($data->response_code == 200){
            foreach($data->response_desc as $record){
                $lorryReceipt =  LorryReceipt::where('lr_no',$record->lrno)->first();
                if(!$lorryReceipt){
                    $lorryReceipt = LorryReceipt::create([
                        'lr_no' => $record->lrno,
                        'payload' => json_encode($record),
                        'total_distance' => null,
                        'estimated_at' => null,
                        'started_at' => $record->timestamp,
                        'completed_at' => null,
                        'est_duration' => null,
                        'branch_id' => null,
                        'consignor_id' => $record->originDetails->consignor_id,
                        'consignee_id' => $record->destinationDetails->consignee_id,
                        'devices' => null,
                    ]);
                }else{
                    $lorryReceipt->update([
                        'lr_no' => $record->lrno,
                        'payload' => json_encode($record),
                        'started_at' => $record->timestamp,
                        'consignor_id' => $record->originDetails->consignor_id,
                        'consignee_id' => $record->destinationDetails->consignee_id,
                    ]);
                }
            }
            return "Done";
        }else{
        //    return 'f';
            return back()->with('error',"Response Code: "+$data->response_code);
       }

    }

    public function deviceLogger(Request $request){

        $data = LorryReceipt::where('status','!=',3)->get();
       foreach ($data as $key => $value) {
            $payload  = json_decode($value->payload);
            
            // Own Vehicle Tracking = OVT Check | 0
            if($payload->tracking_details->gps != null){
                $deviceLog =  DeviceLog::where('type','GPS')->where('vht_type','OVT')->where('lr_id',$value->id)->first();
                if(!$deviceLog){
                    $deviceLog = DeviceLog::create([
                        'lr_id' => $value->id,
                        'lat' => '22.111174631213288',
                        'lon' => '79.54466753180394',
                        'vht_type' => 0,
                        'vehicle_no' => $payload->vehicleDetails->vehicle_no,
                        'type' => 0,
                        'device_id' => $payload->tracking_details->gps,
                    ]);
                }else{
                    $deviceLog->update([
                        'lr_id' => $value->id,
                        'lat' => '22.111174631213288',
                        'lon' => '79.54466753180394',
                        'vht_type' => 0,
                        'vehicle_no' => $payload->vehicleDetails->vehicle_no,
                        'type' => 0,
                        'device_id' => $payload->tracking_details->gps,
                    ]);
                }
            }
       }
       return "Done"; 
    }

    public function placementCreate(Request $request){
        
        $response = Http::post('https://rrpl.online/RRPL_API/Control_Tower/vehicle_placement.php', [
            'from_date' => now()->subDays(15),
            'to_date' => now(),
        ]);
        $data = json_decode($response->getBody());
        if($data->response_code == 200){
            
             foreach($data->response_desc as $record){

                // return $record->lr_details->originDetails->consignor_id;
                $lorryReceipt =  LorryReceipt::where('placement_id',$record->placement_id)->first();

                    //  Store in User Table
                    if(isset($record->lr_details->lrno) && !is_null($record->lr_details->lrno)){
                        $consignor = User::where('rr_id',$record->lr_details->originDetails->consignor_id)->first();
                        $consignee = User::where('rr_id',$record->lr_details->destinationDetails->consignee_id)->first();
    
                        if(!$consignor){
                        $consignor =  User::create([
                            'name' => $record->lr_details->originDetails->consignor,
                            'rr_id' => $record->lr_details->originDetails->consignor_id ?? null,
                            'email' => ($record->lr_details->originDetails->consignor_id).'@rrct.com',
                            'password' => random_int(100000, 999999)
                            ]);
                            // Assign Role
                            $consignor->syncRoles(8);
                        }
    
                        if(!$consignee){
                        $consignee =  User::create([
                            'name' => $record->lr_details->destinationDetails->consignee,
                            'rr_id' => $record->lr_details->destinationDetails->consignee_id ?? null,
                            'email' => ($record->lr_details->destinationDetails->consignee_id).'@rrct.com',
                            'password' => random_int(100000, 999999)
                            ]);
                            // Assign Role
                            $consignee->syncRoles(9);
                        }
                    }

                 if(!$lorryReceipt){
                     $lorryReceipt = LorryReceipt::create([
                        'placement_id' => $record->placement_id,
                         'lr_no' => $record->lr_details->lrno,
                         'payload' => json_encode($record),
                         'total_distance' => null,
                         'estimated_at' => null,
                         'started_at' => now()->format('d-m-y'),
                         'completed_at' => null,
                         'est_duration' => null,
                         'branch_id' => null,
                         'consignor_id' => $consignor->id ?? null,
                         'consignee_id' => $consignee->id ?? null,
                         'devices' => null,
                     ]);
                 }else{
                     $lorryReceipt->update([
                        'lr_no' => $record->lr_details->lrno,
                        'payload' => json_encode($record),
                        'consignor_id' => $consignor->id ?? null,
                        'consignee_id' => $consignee->id ?? null,
                     ]);
                }  
             }
             return "Done";
         }else{
            return back()->with('error',"Response Code: "+$data->response_code);
        } 
    }
}
