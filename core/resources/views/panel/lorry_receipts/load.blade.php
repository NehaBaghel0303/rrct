<div class="card-body">
    <div class="d-flex justify-content-between mb-2">
            <div class="d-flex">
                <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
                <div style="position: relative;">
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
                    <ul class="dropdown-menu multi-level"role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Receipt No</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Branch</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">EWB</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_4"><a href="javascript:void(0);"  class="btn btn-sm">Invoice No.</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_5"><a href="javascript:void(0);"  class="btn btn-sm">Destination</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_6"><a href="javascript:void(0);"  class="btn btn-sm">Consignor</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_7"><a href="javascript:void(0);"  class="btn btn-sm">Consignee</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_7"><a href="javascript:void(0);"  class="btn btn-sm">Status</a></li>
                    </ul>
                </div>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="{{ request()->get('search') }}" style="width:unset;">
    </div>
    <div class="table-responsive">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th class="no-export">Actions</th>
                    <th class="text-center no-export"># <div class="table-div"><i class="ik ik-arrow-up  asc"
                          data-val="id"></i><i class="ik ik ik-arrow-down desc" data-val="id"></i></div>
                    </th>
                    <th class="col_1">
                     Lorry Receipt No <div class="table-div"><i class="ik ik-arrow-up  asc" data-val="lr_no"></i><i
                        class="ik ik ik-arrow-down desc" data-val="lr_no"></i></div>
                    </th>
                    <th class="col_3">
                        Vehicle No. 
                    </th>
                    <th class="col_3">
                        Branch 
                    </th>
                    <th class="col_3">
                       EWB
                    </th>
                    <th class="col_3">
                       Invoice No.
                    </th>
                    <th class="col_4">
                        Source
                    </th>
                    <th class="col_5">
                        Destination 
                    </th>
                    <th class="col_9">
                        Consignor
                    </th>
                    <th class="col_10">
                        Consignee
                    </th>
                    <th class="col_6">
                       Status 
                    </th>
                    <th class="col_6">
                      Created At
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($lorry_receipts->count() > 0)
                    @foreach($lorry_receipts as  $lorry_receipt)
                        @php
                            $payload = json_decode($lorry_receipt->payload);
                        @endphp
                        <tr>
                            <td class="no-export">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i
                                            class="ik ik-chevron-right"></i></button>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                        @if($lorry_receipt->status != 6)
                                            <a href="{{ route('panel.lorry_receipts.update.status',[$lorry_receipt->id,6]) }}" title="Force Close" class="dropdown-item confirm-btn">
                                                <li class="p-0 confirm">Force Close</li>
                                            </a>
                                        @endif    
                                        <a href="{{ route('panel.lorry_receipts.edit',$lorry_receipt->id) }}" title="Edit Lorry Receipt" class="dropdown-item">
                                            <li class="p-0">Edit</li>
                                        </a>
                                        <a href="{{ route('panel.lorry_receipts.show',$lorry_receipt->id) }}" title="Show Lorry Receipt" class="dropdown-item">
                                            <li class="p-0">Show</li>
                                        </a>
                                    </ul>
                                </div>
                            </td>
                            <td class="text-center no-export"> {{ $loop->iteration }}</td>
                            <td class="col_1"><a href="{{ route('panel.lorry_receipts.show',$lorry_receipt->id) }}" class="btn btn-link p-0">{{ $lorry_receipt->lr_no }}</a></td>
                            <td class="col_1"><a class="btn btn-link p-0" href="{{ route('panel.track',$payload->lr_details->vehicleDetails->vehicle_no) }}">{{ $payload->lr_details->vehicleDetails->vehicle_no }}</a></td>
                            <td class="col_3">{{ $payload->branch }}</td>
                            <td class="col_3">{{ $payload->lr_details->ewb_no }}</td>
                            <td class="col_3">{{ $payload->lr_details->invoice_no }}</td>
                            <td class="col_4">{{ $payload->lr_details->originDetails->from_place }}</td>
                            <td class="col_5">{{ $payload->lr_details->destinationDetails->to_place }}</td>
                            <td class="col_5">{{ \Str::limit($payload->lr_details->originDetails->consignor,20) }}</td>
                            <td class="col_5">{{ \Str::limit($payload->lr_details->destinationDetails->consignee,20) }}</td>
                            <td class=""><div class="badge badge-{{ lorryReceiptStatus($lorry_receipt->status)['color'] }}">{{ lorryReceiptStatus($lorry_receipt->status)['name'] }}</div></td>
                            <td>{{ getFormattedDate($lorry_receipt->created_at) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="8">No Data Found...</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <div class="pagination">
        {{ $lorry_receipts->appends(request()->except('page'))->links() }}
    </div>
    <div>
        @if($lorry_receipts->lastPage() > 1)
                <label for="">Jump To: 
                    <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                        @for ($i = 1; $i <= $lorry_receipts->lastPage(); $i++)
                            <option value="{{ $i }}" {{ $lorry_receipts->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </label>
           @endif
    </div>
</div>
