<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
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
         $vehicles = Vehicle::query();
         
            if($request->get('search')){
                $vehicles->where('id','like','%'.$request->search.'%')
                                ->orWhere('vehicle_no','like','%'.$request->search.'%')
                                ->orWhere('status','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $vehicles->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $vehicles->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $vehicles->orderBy($request->get('desc'),'desc');
            }
            $vehicles = $vehicles->paginate($length);

            if ($request->ajax()) {
                return view('panel.vehicles.load', ['vehicles' => $vehicles])->render();  
            }
 
        return view('panel.vehicles.index', compact('vehicles'));
    }

    
        public function print(Request $request){
            $vehicles = collect($request->records['data']);
                return view('panel.vehicles.print', ['vehicles' => $vehicles])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.vehicles.create');
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
                        'vehicle_no'     => 'required',
                        'status'     => 'required',
                    ]);
        
        try{
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $path = storage_path('app/public/backend/vehicle');
                $imageName = 'vehicle' .rand(000, 999).'.' . $image->getClientOriginalExtension();
                $image->move($path, $imageName);
                $request['image'] = $imageName;
            }else{
                $request['image'] = null;
            }       
               
            $vehicle = Vehicle::create($request->all());
            return redirect()->route('panel.vehicles.index')->with('success','Vehicle Created Successfully!');
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
    public function show(Vehicle $vehicle)
    {
        try{
            return view('panel.vehicles.show',compact('vehicle'));
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
    public function edit(Vehicle $vehicle)
    {   
        try{
            
            return view('panel.vehicles.edit',compact('vehicle'));
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
    public function update(Request $request,Vehicle $vehicle)
    {
        
        $this->validate($request, [
                        'vehicle_no'     => 'required',
                        'status'     => 'required',
                    ]);
                
        try{
                            
            if($vehicle){
                 
                if ($request->hasFile('image_file')) {
                    $image = $request->file('image_file');
                    $path = storage_path('app/public/backend/vehicle');
                    $imageName = 'vehicle' .rand(000, 999).'.' . $image->getClientOriginalExtension();
                    $image->move($path, $imageName);
                    $request['image'] = $imageName;
                }else{
                    $request['image'] = $vehicle->image;
                } 
                       
                $chk = $vehicle->update($request->all());

                return redirect()->route('panel.vehicles.index')->with('success','Record Updated!');
            }
            return back()->with('error','Vehicle not found')->withInput($request->all());
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
    public function destroy(Vehicle $vehicle)
    {
        try{
            if($vehicle){
                       
                $this->deleteStorageFile($vehicle->image);
                                     
                $vehicle->delete();
                return back()->with('success','Vehicle deleted successfully');
            }else{
                return back()->with('error','Vehicle not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
