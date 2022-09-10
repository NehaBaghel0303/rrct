<div class="card-body">
    <div class="d-flex justify-content-between mb-2">
        
        <div>
            <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Vehicle Number</a></li>
                <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Customer</a></li>
                <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Duration</a></li>   
            </ul>
            
        </div>
        <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="{{ request()->get('search') }}" style="width:unset;">
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" data-toggle="tooltip" data-placement="top" title="Serial Number">Sr. no.</th>
                    <th class="col_1" data-toggle="tooltip" data-placement="top" title="Vehicle Number">Veh No.</th>
                    <th  class="col_2" data-toggle="tooltip" data-placement="top" title="Customer">Customer</th>
                    
                    <th  class="col_3" data-toggle="tooltip" data-placement="top" title="Duration">Duration</th>
                    <th  class="col_13" data-toggle="tooltip" data-placement="top" title="Remarks">Remarks</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{$item->id}}</td>
                        <td class="col_1">{{ $item->item->v_n }}</td>
                        <td class="col_2">{{ $item->item->cus }}</td>
                        <td class="col_3">{{ $item->item->duration }}</td>
                        <td class="col_13">
                            @if(count($item->remarks) == 0)
                                <button class="btn btn-outline-primary add-remark" data-lr_id="{{$item->id}}" >{{ $item->item->remark}}</button>
                            @else
                                @foreach ($item->remarks as $remark_data)
                                    <p data-remarks="{{$remark_data->remarks}}" data-id="{{$remark_data->id}}" class="edit-remark">{{$remark_data->remarks}}</p>
                                @endforeach
                            @endif
                        </td>                             
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <div class="pagination">
        {{ $data->appends(request()->except('page'))->links() }}
    </div>
    <div>
        @if($data->lastPage() > 1)
            <label for="">Jump To: 
                <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                        <option value="{{ $i }}" {{ $data->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </label>
        @endif
    </div>
</div>
@include('backend.report.update-remark',['type'=>'delay_eta_at_nl'])
{{-- Right Off Canvas --}}
@include('backend.report.delay-for-new-load.filter')


