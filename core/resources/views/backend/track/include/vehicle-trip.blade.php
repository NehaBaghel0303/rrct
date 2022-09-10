<div class="row">
    <div class="col-lg-12 pl-1" style="padding-right: 9px;">
        <div class="card card-shadow" style="margin-bottom: 5px;border-left: 3px solid #1a237e; border-radius: 0;">
            <div class="card-body"style="padding:15px;">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <div class="text-muted pl-2">
                            @php
                                $consignor_id = App\User::where('rr_id',$payload->lr_details->originDetails->consignor_id)->first();
                            @endphp
                            <span class="text-dark"><i class="ik ik-map-pin text-warning"></i> Origin - <strong>{{ $payload->lr_details->originDetails->from_place }}</strong><sup class="ml-1">{{ $payload->lr_details->originDetails->from_place_id }}</sup></span>  
                            <div class="d-flex">
                                <span class="mb-0" style="width: 251px; word-break: break-word;">Consignor : <small><a href="{{ route('panel.consignor.show',$consignor_id) }}">{{ $payload->lr_details->originDetails->consignor }}</a></small><sup class="ml-1">{{ $payload->lr_details->originDetails->consignor_id }}</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-muted">   
                            <span class="text-dark"><i class="ik ik-map-pin text-info"></i> Now - <strong>{{ 'Seoni' }}</strong></span>  
                            <br>
                            <span class="text-wrapper mb-0"><small>TATA MOTORS</small></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-muted">  
                            @php
                                $consignee_id = App\User::where('rr_id',$payload->lr_details->destinationDetails->consignee_id)->first();
                            @endphp
                            <span class="text-dark"><i class="ik ik-map-pin text-success"></i> Destination - <strong>{{ $payload->lr_details->destinationDetails->to_place }}</strong><sup class="ml-1">{{$payload->lr_details->destinationDetails->to_place_id}}</sup></span>  
                           <div class="d-flex">
                                <span class="mb-0 text-wrapper">Consignee : <small><a href="{{ route('panel.consignee.show',$consignee_id) }}">{{$payload->lr_details->destinationDetails->consignee}}</a></small><sup class="ml-1">{{ $payload->lr_details->destinationDetails->consignee_id }}</sup></span>
                           </div>
                        </div>
                    </div>
                </div> 
                 
            </div>
        </div>
    </div>
</div>