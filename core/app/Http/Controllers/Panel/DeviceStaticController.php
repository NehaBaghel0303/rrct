<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DeviceStatic;

class DeviceStaticController extends Controller
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
         $device_statics = DeviceStatic::query();
         
            if($request->get('search')){
                $device_statics->where('id','like','%'.$request->search.'%')
                                ->orWhere('device_id','like','%'.$request->search.'%')
                                ->orWhere('status','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $device_statics->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $device_statics->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $device_statics->orderBy($request->get('desc'),'desc');
            }
            $device_statics = $device_statics->paginate($length);

            if ($request->ajax()) {
                return view('panel.device_statics.load', ['device_statics' => $device_statics])->render();  
            }
 
        return view('panel.device_statics.index', compact('device_statics'));
    }

    
        public function print(Request $request){
            $device_statics = collect($request->records['data']);
                return view('panel.device_statics.print', ['device_statics' => $device_statics])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.device_statics.create');
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
                        'device_id'     => 'required',
                        'status'     => 'required',
                        'last_active_at'     => 'required',
                    ]);
        
        try{
               
               
            $device_static = DeviceStatic::create($request->all());
                            return redirect()->route('panel.device_statics.index')->with('success','Device Static Created Successfully!');
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
    public function show(DeviceStatic $device_static)
    {
        try{
            return view('panel.device_statics.show',compact('device_static'));
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
    public function edit(DeviceStatic $device_static)
    {   
        try{
            
            return view('panel.device_statics.edit',compact('device_static'));
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
    public function update(Request $request,DeviceStatic $device_static)
    {
        
        $this->validate($request, [
                        'device_id'     => 'required',
                        'status'     => 'required',
                        'last_active_at'     => 'required',
                    ]);
                
        try{
                           
            if($device_static){
                       
                $chk = $device_static->update($request->all());

                return redirect()->route('panel.device_statics.index')->with('success','Record Updated!');
            }
            return back()->with('error','Device Static not found')->withInput($request->all());
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
    public function destroy(DeviceStatic $device_static)
    {
        try{
            if($device_static){
                                      
                $device_static->delete();
                return back()->with('success','Device Static deleted successfully');
            }else{
                return back()->with('error','Device Static not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
