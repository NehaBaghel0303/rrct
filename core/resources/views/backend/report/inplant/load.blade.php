
    <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex">
                <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
                <div style="position: relative;">
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
                    <ul class="dropdown-menu multi-level"role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Vehicle Number</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Branch</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Customer</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_4"><a href="javascript:void(0);"  class="btn btn-sm">Plant In Date/Time</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_5"><a href="javascript:void(0);"  class="btn btn-sm">Plant Out Date/Time</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_6"><a href="javascript:void(0);"  class="btn btn-sm">Plan Turn Around Time</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_7"><a href="javascript:void(0);"  class="btn btn-sm">Trip Remark</a></li>
                    </ul>
                </div>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="{{ request()->get('search') }}" style="width:unset;">
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center" data-toggle="tooltip" data-placement="top" title="Serial Number">Sr. no.</th>
                        <th class="col_1" data-toggle="tooltip" data-placement="top" title="Vehicle Number">Veh No.</th>
                        <th  class="col_2" data-toggle="tooltip" data-placement="top" title="Branch">Branch</th>
                        <th  class="col_3" title="Customer">Customer</th>
                        <th  class="col_4" data-toggle="tooltip" data-placement="top" title="Plant In Date/Time">PI Date/Time</th>
                        <th  class="col_5" data-toggle="tooltip" data-placement="top" title="Plant Out Date/Time">PO Date/Time</th>
                        <th  class="col_6" data-toggle="tooltip" data-placement="top" title="Plant Turn Around Time">Plant TAT</th>
                        <th  class="col_7" data-toggle="tooltip" data-placement="top" title=" Remark">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td class="col_1">{{ $item->item->v_n }}</td>
                            <td class="col_2">{{ $item->item->branch }}</td>
                            <td class="col_3">{{ $item->item->cus }}</td>
                            <td class="col_4">{{ getFormattedDate($item->item->plt_in_dt) }}</td>
                            <td class="col_5">{{ getFormattedDate($item->item->plt_out_dt) }}</td>
                            <td class="col_6">{{ getFormattedDate($item->plt_tat) }}</td>
                            <td class="col_7">
                                @if(count($item->remarks) ==0)
                                <button class="btn btn-outline-primary add-remark" data-lr_id="{{$item->id}}" >{{ $item->item->remark}}</button>
                                @else
                                    @foreach ($item->remarks as $remark_data)
                                        <p data-remarks="{{$remark_data->remarks}}" data-id="{{$remark_data->id}}" class="edit-remark"> {{$remark_data->remarks}}</p>
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
        
        {{-- Right Off Canvas --}}
    @include('backend.report.update-remark',['type'=>'inplant'])
    @include('backend.report.inplant.filter')

@section('child-script')
   

<script>
    
   
    function html_table_to_excel(type)
    {
        var table_core = $("#table").clone();
        var clonedTable = $("#table").clone();
        clonedTable.find('[class*="no-export"]').remove();
        clonedTable.find('[class*="d-none"]').remove();
        $("#table").html(clonedTable.html());
        var data = document.getElementById('table');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
        XLSX.writeFile(file, 'InPlant.' + type);
        $("#table").html(table_core.html());
        
    }

    $(document).on('click','#export_button',function(){
        html_table_to_excel('xlsx');
    })


    $(document).on('click','.asc',function(){
        var val = $(this).data('val');
        if(checkUrlParameter('asc')){
        url = updateURLParam('asc', val);
        }else{
        url =  updateURLParam('asc', val);
        }
        callAjax(url);
    });
    $(document).on('click','.desc',function(){
        var val = $(this).data('val');
        if(checkUrlParameter('desc')){
        url = updateURLParam('desc', val);
        }else{
        url =  updateURLParam('desc', val);
        }
        callAjax(url);
    });

    $('#reset').click(function(){
        var url = $(this).data('url');
        callAjax(url);
        window.history.pushState("", "", url);
        $('#TableForm').trigger("reset");
    });


</script>
@endsection

  
 
