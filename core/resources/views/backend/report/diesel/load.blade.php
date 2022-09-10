<style>
    .dropdown-menu.multi-level.show{
        position: absolute;
        will-change: transform;
        top: 0px;
        left: 0px;
        transform: translate3d(8px, 30px, 0px) !important;
    }
</style>
<div class="card-body">
    <div class="d-flex justify-content-between mb-2">
        
        <div class="d-flex">
            <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
            <div style="position: relative;">
                 <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Vehicle Number</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">LR no</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Invoice no</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_4"><a href="javascript:void(0);"  class="btn btn-sm">Branch</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_5"><a href="javascript:void(0);"  class="btn btn-sm">Source</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_6"><a href="javascript:void(0);"  class="btn btn-sm">Party Name</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_7"><a href="javascript:void(0);"  class="btn btn-sm">Destination</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_8"><a href="javascript:void(0);"  class="btn btn-sm">Total Diesel Ltr</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_9"><a href="javascript:void(0);"  class="btn btn-sm">Total Diesel Amt</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_10"><a href="javascript:void(0);"  class="btn btn-sm">Actual Diesel Ltr</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_11"><a href="javascript:void(0);"  class="btn btn-sm">Actual Diesel Amt</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_12"><a href="javascript:void(0);"  class="btn btn-sm">Variance/ Difference Amt</a></li>
                    <li class="dropdown-item p-0 col-btn" data-val="col_13"><a href="javascript:void(0);"  class="btn btn-sm">Remarks</a></li>
                </ul>
            </div>
        </div>
        <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="{{ request()->get('search') }}" style="width:unset;">
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" data-toggle="tooltip" data-placement="top" title="Serial Number">S No.</th>
                    <th class="col_1" data-toggle="tooltip" data-placement="top" title="Vehicle Number">Veh No.</th>
                    <th  class="col_2" data-toggle="tooltip" data-placement="top" title="LR no">LR no</th>
                    <th  class="col_3"data-toggle="tooltip" data-placement="top" title="Invoice no">Invoice no</th>
                    <th  class="col_4" data-toggle="tooltip" data-placement="top" title="Branch">Branch</th>
                    <th  class="col_5" data-toggle="tooltip" data-placement="top" title="Source">Source</th>
                    <th  class="col_6" data-toggle="tooltip" data-placement="top" title="Party Name">Party Name</th>
                    <th  class="col_7" data-toggle="tooltip" data-placement="top" title="Destination">Destination</th>
                    <th  class="col_8" data-toggle="tooltip" data-placement="top" title="Total Diesel Ltr">TD Ltr</th>
                    <th  class="col_9" data-toggle="tooltip" data-placement="top" title="Total Diesel Amt">TD Amt</th>
                    <th  class="col_10" data-toggle="tooltip" data-placement="top" title="Actual Diesel Ltr">AD Ltr</th>
                    <th  class="col_11" data-toggle="tooltip" data-placement="top" title="Actual Diesel Amt">AD Amt</th>
                    <th  class="col_12" data-toggle="tooltip" data-placement="top" title="Variance/ Difference Amt">Var/ Diff Amt</th>
                    <th  class="col_13" data-toggle="tooltip" data-placement="top" title="Remarks">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{$item->id}}</td>
                        <td class="col_1">{{ $item->item->v_n }}</td>
                        <td class="col_2">{{ $item->item->lr_n }}</td>
                        <td class="col_3">{{ $item->item->inv_n }}</td>
                        <td class="col_4">{{ $item->item->branch }}</td>
                        <td class="col_5">{{ $item->item->src }}</td>
                        <td class="col_6">{{ $item->item->pty_n }}</td>
                        <td class="col_7">{{ $item->item->destination }}</td>
                        <td class="col_8">{{ $item->item->tot_dsl_ltr }}</td>
                        <td class="col_9">{{ $item->item->tot_dsl_amt }}</td>
                        <td class="col_10">{{ $item->item->act_dsl_ltr }}</td>
                        <td class="col_11">{{ $item->item->act_dsl_amt }}</td>
                        <td class="col_12">{{ $item->item->var_dif_amt }}</td>
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
        {{-- {{ $data->appends(request()->except(['page','active']))->links() }} --}}
        <?php
            $replacements = route('panel.report.index');
        ?>
        {{ $data->appends(request()->except(['page','_']))->setPath($replacements)->links()  }}
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

@include('backend.report.update-remark',['type'=>'diesel'])
{{-- Right Off Canvas --}}
@include('backend.report.diesel.filter')

@section('child-script')
    <script>
      
    </script>
@endsection