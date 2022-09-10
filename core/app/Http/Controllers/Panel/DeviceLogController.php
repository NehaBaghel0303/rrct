<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DeviceLog;

class DeviceLogController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $length = 10;
         if(request()->get('length')){
             $length = $request->get('length');
         }
         $device_logs = DeviceLog::query();
         
            if($request->get('search')){
                $device_logs->where('id','like','%'.$request->search.'%')
                                ->orWhere('lr_id','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $device_logs->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $device_logs->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $device_logs->orderBy($request->get('desc'),'desc');
            }
            $device_logs = $device_logs->paginate($length);

            if ($request->ajax()) {
                return view('panel.device_logs.load', ['device_logs' => $device_logs])->render();  
            }
 
        return view('panel.device_logs.index', compact('device_logs'));
    }

    
        public function print(Request $request){
            $device_logs = collect($request->records['data']);
                return view('panel.device_logs.print', ['device_logs' => $device_logs])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.device_logs.create');
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
                        'lr_id'     => 'required',
                        'lat'     => 'required',
                        'lon'     => 'required',
                        'vehicle_no'     => 'required',
                        'type'     => 'required',
                        'vht_type'     => 'required',
                        'device_id'     => 'required',
                    ]);
        
        try{
                   
                   
            $device_log = DeviceLog::create($request->all());
                            return redirect()->route('panel.device_logs.index')->with('success','Device Log Created Successfully!');
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(DeviceLog $device_log)
    {
        try{
            return view('panel.device_logs.show',compact('device_log'));
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(DeviceLog $device_log)
    {   
        try{
            
            return view('panel.device_logs.edit',compact('device_log'));
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request,DeviceLog $device_log)
    {
        
        $this->validate($request, [
                        'lr_id'     => 'required',
                        'lat'     => 'required',
                        'lon'     => 'required',
                        'vehicle_no'     => 'required',
                        'type'     => 'required',
                        'vht_type'     => 'required',
                        'device_id'     => 'required',
                    ]);
                
        try{
                               
            if($device_log){
                           
                $chk = $device_log->update($request->all());

                return redirect()->route('panel.device_logs.index')->with('success','Record Updated!');
            }
            return back()->with('error','Device Log not found')->withInput($request->all());
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy(DeviceLog $device_log)
    {
        try{
            if($device_log){
                                              
                $device_log->delete();
                return back()->with('success','Device Log deleted successfully');
            }else{
                return back()->with('error','Device Log not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
