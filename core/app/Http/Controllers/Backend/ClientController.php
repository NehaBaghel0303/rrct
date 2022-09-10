<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\LorryReceipt;
use App\Models\Vehicle;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function consignorShow($id)
    {
        $consignor = User::whereId($id)->first();
        if($consignor){
            $lorryReceipt = LorryReceipt::where('consignor_id',$consignor->id)->first();
            $lr_records = LorryReceipt::where('consignor_id',$consignor->id)->get();
          
            $payload = json_decode($lorryReceipt->payload);
            $vehicles = Vehicle::where('vehicle_no',$payload->vehicle_no)->get();
            return view('backend.consignor.show',compact('consignor','payload','lorryReceipt','vehicles','lr_records'));
        }else{
            abort(404);
        }    
    }

    public function consigneeShow($id)
    {
        $consignee = User::whereId($id)->first();
        if($consignee){
           return $lorryReceipt = LorryReceipt::where('consignor_id',$consignee->id)->first();
            $consignorRec = LorryReceipt::where('consignor_id',$consignee->id)->get();
            $payload =  LorryReceipt::whereIn('payload',$consignorRec)->get();
            $payload = json_decode($lorryReceipt->payload);
            $vehicles = Vehicle::where('vehicle_no',$payload->vehicle_no)->get();
         
            return view('backend.consignee.show',compact('consignee','payload','lorryReceipt','vehicles'));
        }else{
            abort(404);
        }    
    }

   


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
