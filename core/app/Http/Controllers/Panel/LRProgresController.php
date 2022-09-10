<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LRProgres;

class LRProgresController extends Controller
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
         $l_r_progress = LRProgres::query();
         
            if($request->get('search')){
                $l_r_progress->where('id','like','%'.$request->search.'%')
                                ->orWhere('type','like','%'.$request->search.'%')
                                ->orWhere('lr_id','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $l_r_progress->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $l_r_progress->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $l_r_progress->orderBy($request->get('desc'),'desc');
            }
            $l_r_progress = $l_r_progress->paginate($length);

            if ($request->ajax()) {
                return view('panel.l_r_progress.load', ['l_r_progress' => $l_r_progress])->render();  
            }
 
        return view('panel.l_r_progress.index', compact('l_r_progress'));
    }

    
        public function print(Request $request){
            $l_r_progress = collect($request->records['data']);
                return view('panel.l_r_progress.print', ['l_r_progress' => $l_r_progress])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.l_r_progress.create');
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
                        'device_id'     => 'required',
                        'type'     => 'required',
                        'vht_type'     => 'required',
                        'distance_covered'     => 'required',
                        'distance_remain'     => 'required',
                    ]);
        
        try{
                  
                  
            $l_r_progress = LRProgres::create($request->all());
                            return redirect()->route('panel.l_r_progress.index')->with('success','L R Progress Created Successfully!');
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
    public function show(LRProgres $l_r_progress)
    {
        try{
            return view('panel.l_r_progress.show',compact('l_r_progress'));
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
    public function edit(LRProgres $l_r_progress)
    {   
        try{
            
            return view('panel.l_r_progress.edit',compact('l_r_progress'));
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
    public function update(Request $request,LRProgres $l_r_progress)
    {
        
        $this->validate($request, [
                        'lr_id'     => 'required',
                        'device_id'     => 'required',
                        'type'     => 'required',
                        'vht_type'     => 'required',
                        'distance_covered'     => 'required',
                        'distance_remain'     => 'required',
                    ]);
                
        try{
                              
            if($l_r_progress){
                          
                $chk = $l_r_progress->update($request->all());

                return redirect()->route('panel.l_r_progress.index')->with('success','Record Updated!');
            }
            return back()->with('error','L R Progress not found')->withInput($request->all());
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
    public function destroy(LRProgres $l_r_progress)
    {
        try{
            if($l_r_progress){
                                            
                $l_r_progress->delete();
                return back()->with('success','L R Progress deleted successfully');
            }else{
                return back()->with('error','L R Progress not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
