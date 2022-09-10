<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\GeoFence;

class GeoFenceController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
        // return 's';
         $length = 10;
         if(request()->get('length')){
             $length = $request->get('length');
         }
         $geo_fences = GeoFence::query();
         
            if($request->get('search')){
                $geo_fences->where('id','like','%'.$request->search.'%')
                                ->orWhere('name','like','%'.$request->search.'%')
                                ->orWhere('location','like','%'.$request->search.'%')
                                ->orWhere('type','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $geo_fences->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $geo_fences->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $geo_fences->orderBy($request->get('desc'),'desc');
            }
            $geo_fences = $geo_fences->paginate($length);

            if ($request->ajax()) {
                return view('panel.geo_fences.load', ['geo_fences' => $geo_fences])->render();  
            }
 
        return view('panel.geo_fences.index', compact('geo_fences'));
    }

    
        public function print(Request $request){
            $geo_fences = collect($request->records['data']);
                return view('panel.geo_fences.print', ['geo_fences' => $geo_fences])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.geo_fences.create');
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
                        'name'     => 'required',
                        'location'     => 'required',
                    ]);
        
        try{
            $geo_fence['cordinates']  = json_encode($request->cordinates);           
            $geo_fence = GeoFence::create($request->all());

            return redirect()->route('panel.geo_fences.index')->with('success','Geo Fence Created Successfully!');
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
    public function show(GeoFence $geo_fence)
    {
        try{
            return view('panel.geo_fences.show',compact('geo_fence'));
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
    public function edit(GeoFence $geo_fence)
    {   
        try{
            
            return view('panel.geo_fences.edit',compact('geo_fence'));
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
    public function update(Request $request,GeoFence $geo_fence)
    {
        
        $this->validate($request, [
            'name'     => 'required',
        ]);
                
        try{ 
                          
            if($geo_fence){
                $chk = $geo_fence->update($request->all());

                return redirect()->route('panel.geo_fences.index')->with('success','Record Updated!');
            }
            return back()->with('error','Geo Fence not found')->withInput($request->all());
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
    public function destroy(GeoFence $geo_fence)
    {
        try{
            if($geo_fence){
                                        
                $geo_fence->delete();
                return back()->with('success','Geo Fence deleted successfully');
            }else{
                return back()->with('error','Geo Fence not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
