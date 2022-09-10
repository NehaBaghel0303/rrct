<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\InPlantFormat;
use App\Traits\FastTagFormat;
use App\Traits\DieselFormat;
use App\Traits\TripFormat;
use App\Traits\InTransitFormat;
use App\Traits\DelayETAFormat;
use App\Traits\DelayETALPFormat;
use App\Traits\DelayETAUPFormat;
use App\Traits\DelayAtEnRouteFormat;
use App\Traits\DelayNewLoadFormat;
use App\Traits\HVMFormat;
use App\Models\ReportRemark;

class ReportController extends Controller
{

  use inPlantFormat, FastTagFormat, InTransitFormat, DieselFormat, TripFormat, DelayETAFormat, DelayETALPFormat, DelayETAUPFormat, DelayAtEnRouteFormat, DelayNewLoadFormat, HVMFormat;
    public function index(Request $request)
    {
        if($request->get('active')){
            switch ($request->active) {
              case 'inplant':
                $view = $this->inPlantFormat();
                  break;

              case 'fasttag':
                $view = $this->fastTagFormat();
                  break;

              case 'intransit':
                $view = $this->inTransitFormat();
                  break;

              case 'diesel':
                $view = $this->dieselFormat();
                  break;

              case 'trip':
                $view = $this->tripFormat();
                  break;

              case 'delay-eta':
                $view = $this->delayETAFormat();
                  break;
              case 'delay-loading-eta':
                $view = $this->delayETALPFormat();
                  break;

              case 'delay-at-unloading':
                $view = $this->delayETAUPFormat();
                  break;

              case 'delay-at-en-route':
                $view = $this->delayAtEnRouteFormat();
                  break;
              case 'delay-for-new-load':
                $view = $this->delayNewLoadFormat();
                  break;

              case 'hvm':
                $view = $this->hVMFormat();
                  break;
              
              default:
                $view = $this->inPlantFormat();
                break;
            }
        }else{
          $view = $this->inPlantFormat();
        }

        if($request->ajax()){
          return $view;
        }
       return view('backend.report.index');
    }


    public function inplantIndex()
    {
      return $this->inPlantFormat();
    }

    public function fasttagIndex()
    {
       return $this->fastTagFormat();
    }

    public function inTransitIndex()
    {
      return $this->inTransitFormat(); 
    }

    public function dieselIndex()
    {
      return $this->dieselFormat();
    }

    public function tripIndex()
    {
       return $this->tripFormat();
    }

    public function delayETAIndex()
    {
      return $this->delayETAFormat(); 
    }

    public function delayLoadingETAIndex()
    {
      return $this->delayETALPFormat();   
    }

    public function delayUnloadingETAIndex()
    {
      return $this->delayETAUPFormat(); 
    }

    public function delayatEnRouteIndex()
    {
      return $this->delayAtEnRouteFormat(); 
    }

    public function delayforNewLoadIndex()
    {
       return $this->delayNewLoadFormat();
    }

    public function hvmIndex()
    {
      return $this->hVMFormat();
    }


    public function remarkStore(Request $request){
      // return $request->all();
      if($request->id == 0){
        $remark =  ReportRemark::create([
          'lorry_receipt_id'=>$request->lorry_receipt_id,
          'user_id'=>auth()->id(),
          'type'=>$request->type,
          'remarks'=>$request->remark,
        ]);
      }else{
        $remark = ReportRemark::find($request->id);
        $remark->update([
          'remarks' => $request->remark,
        ]);
      }
      if($request->ajax()){
        return response(['message'=>"Remark updated successfully!"],200);
      }
      if($request->type == 'lorry Receipt'){
        return back()->with('success','Remark Updated!');
      }else{
        return redirect(route('panel.report.index')."?active=".$request->type)->with('success','Remark Updated!');
      }
    } 
}
