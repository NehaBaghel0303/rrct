<?php


namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LorryReceipt;
use App\Models\ReportRemark;
use App\Models\GeoFence;

class LorryReceiptController extends Controller
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
         $lorry_receipts = LorryReceipt::query();
         
            if($request->get('search')){
                $lorry_receipts->where('id','like','%'.$request->search.'%')
                                ->orWhere('lr_no','like','%'.$request->search.'%')
                                ->orWhere('payload','like','%'.$request->search.'%')
                                ->orWhere('consignor_id','like','%'.$request->search.'%')
                                ->orWhere('consignee_id','like','%'.$request->search.'%')
                ;
            }
            
            if($request->get('from') && $request->get('to')) {
                $lorry_receipts->whereBetween('created_at', [\Carbon\carbon::parse($request->from)->format('Y-m-d'),\Carbon\Carbon::parse($request->to)->format('Y-m-d')]);
            }

            if($request->get('asc')){
                $lorry_receipts->orderBy($request->get('asc'),'asc');
            }
            if($request->get('desc')){
                $lorry_receipts->orderBy($request->get('desc'),'desc');
            }
            $lorry_receipts = $lorry_receipts->paginate($length);

            if ($request->ajax()) {
                return view('panel.lorry_receipts.load', ['lorry_receipts' => $lorry_receipts])->render();  
            }
 
        return view('panel.lorry_receipts.index', compact('lorry_receipts'));
    }

    
        public function print(Request $request){
            $lorry_receipts = collect($request->records['data']);
                return view('panel.lorry_receipts.print', ['lorry_receipts' => $lorry_receipts])->render();  
           
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('panel.lorry_receipts.create');
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }

    public function getDestination(Request $request)
    {
        try{
            $html = "<option value='' readonly> Select Destination</option>";
            $destinations = GeoFence::where('id','!=' ,$request->source_id)->get();
            if ($destinations->count() > 0) {
                foreach($destinations as $destination){
                    $selected = "";
                    $html .= '<option value="'.$destination->id.'">'.$destination->name.'-'.''.'#'.$destination->id.''.'</option>';
                }
                return response($html,200);
            }
            return response(404);
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
                        'lr_no'     => 'required',
                        'payload'     => 'required',
                        'total_distance'     => 'required',
                        'estimated_at'     => 'required',
                        'started_at'     => 'required',
                        'completed_at'     => 'required',
                        'est_duration'     => 'required',
                        'branch_id'     => 'required',
                        'consignor_id'     => 'required',
                        'consignee_id'     => 'required',
                        'devices'     => 'required',
                    ]);
        
        try{
                       
                       
            $lorry_receipt = LorryReceipt::create($request->all());
                            return redirect()->route('panel.lorry_receipts.index')->with('success','Lorry Receipt Created Successfully!');
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
    public function show(LorryReceipt $lorry_receipt)
    {
        try{
            $payload = json_decode($lorry_receipt->payload);
            $remarks = ReportRemark::where('lorry_receipt_id',$lorry_receipt->id)->get();
            return view('panel.lorry_receipts.show',compact('lorry_receipt','payload','remarks'));
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
    public function edit(LorryReceipt $lorry_receipt)
    {   
        try{
            $geofences = GeoFence::all();
            return view('panel.lorry_receipts.edit',compact('lorry_receipt','geofences'));
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
    public function update(Request $request,LorryReceipt $lorry_receipt)
    {        
        try{
                                   
            if($lorry_receipt){
                               
                $chk = $lorry_receipt->update($request->all());

                return redirect()->route('panel.lorry_receipts.index')->with('success','Record Updated!');
            }
            return back()->with('error','Lorry Receipt not found')->withInput($request->all());
        }catch(Exception $e){            
            return back()->with('error', 'There was an error: ' . $e->getMessage())->withInput($request->all());
        }
    }

    public function updateStatus(Request $request,LorryReceipt $lorry_receipt,$status)
    {
        
        try{
            
            if($lorry_receipt){
                if($status == 6){
                    $lorry_receipt->update([
                     'status' =>  $status// Force Closed
                    ]);
     
                     return back()->with('success','Status Updated!');
                }else{
                    return back()->with('error','Status not found!');
                }
                               
            }
            return back()->with('error','Lorry Receipt not found')->withInput($request->all());
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
    public function destroy(LorryReceipt $lorry_receipt)
    {
        try{
            if($lorry_receipt){
                                                      
                $lorry_receipt->delete();
                return back()->with('success','Lorry Receipt deleted successfully');
            }else{
                return back()->with('error','Lorry Receipt not found');
            }
        }catch(Exception $e){
            return back()->with('error', 'There was an error: ' . $e->getMessage());
        }
    }
}
