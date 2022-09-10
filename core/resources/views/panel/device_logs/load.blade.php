<div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <div>
                <label for="">Show
                    <select name="length" style="width:60px;height:30px;border: 1px solid #eaeaea;" id="length">
                        <option value="10"{{ $device_logs->perPage() == 10 ? 'selected' : ''}}>10</option>
                        <option value="25"{{ $device_logs->perPage() == 25 ? 'selected' : ''}}>25</option>
                        <option value="50"{{ $device_logs->perPage() == 50 ? 'selected' : ''}}>50</option>
                        <option value="100"{{ $device_logs->perPage() == 100 ? 'selected' : ''}}>100</option>
                    </select>
                    entries
                </label>
            </div>
            <div>
                
                                 {{--
                                    <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
                                        --}}
                    
                                     {{--
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Lr Id</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Lat</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Lon</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_4"><a href="javascript:void(0);"  class="btn btn-sm">Vehicle No</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_5"><a href="javascript:void(0);"  class="btn btn-sm">Type</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_6"><a href="javascript:void(0);"  class="btn btn-sm">Vht Type</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_7"><a href="javascript:void(0);"  class="btn btn-sm">Device Id</a></li>                                                
                    </ul>
                                         --}}
                                
                                     {{--
                                <a href="javascript:void(0);" id="print" data-url="{{ route('panel.device_logs.print') }}"  data-rows="{{json_encode($device_logs) }}" class="btn btn-primary btn-sm">Print</a>
                                         --}}
                            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="{{request()->get('search') }}" style="width:unset;">
        </div>
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th class="no-export">Actions</th> 
                        <th  class="text-center no-export"># <div class="table-div"><i class="ik ik-arrow-up  asc" data-val="id"></i><i class="ik ik ik-arrow-down desc" data-val="id"></i></div></th>             
                                               
                        <th class="col_1">
                            Lr Id <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="lr_id"></i><i class="ik ik ik-arrow-down desc" data-val="lr_id"></i></div></th>
                                                    <th class="col_2">
                            Lat <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="lat"></i><i class="ik ik ik-arrow-down desc" data-val="lat"></i></div></th>
                                                    <th class="col_3">
                            Lon <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="lon"></i><i class="ik ik ik-arrow-down desc" data-val="lon"></i></div></th>
                                                    <th class="col_4">
                            Vehicle No <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="vehicle_no"></i><i class="ik ik ik-arrow-down desc" data-val="vehicle_no"></i></div></th>
                                                    <th class="col_5">
                            Type <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="type"></i><i class="ik ik ik-arrow-down desc" data-val="type"></i></div></th>
                                                    <th class="col_6">
                            Vht Type <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="vht_type"></i><i class="ik ik ik-arrow-down desc" data-val="vht_type"></i></div></th>
                                                    <th class="col_7">
                            Device Id <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="device_id"></i><i class="ik ik ik-arrow-down desc" data-val="device_id"></i></div></th>
                                                                        </tr>
                </thead>
                <tbody>
                    @if($device_logs->count() > 0)
                                                    @foreach($device_logs as  $device_log)
                            <tr>
                                <td class="no-export">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i class="ik ik-chevron-right"></i></button>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <a href="{{ route('panel.device_logs.edit', $device_log->id) }}" title="Edit Device Log" class="dropdown-item "><li class="p-0">Edit</li></a>
                                            <a href="{{ route('panel.device_logs.destroy', $device_log->id) }}" title="Delete Device Log" class="dropdown-item  delete-item"><li class=" p-0">Delete</li></a>
                                        </ul>
                                    </div> 
                                </td>
                                <td  class="text-center no-export"> {{  $loop->iteration }}</td>
                                <td class="col_1">{{$device_log->lr_id }}</td>
                                  <td class="col_2">{{$device_log->lat }}</td>
                                  <td class="col_3">{{$device_log->lon }}</td>
                                  <td class="col_4">{{$device_log->vehicle_no }}</td>
                                  <td class="col_5">{{$device_log->type }}</td>
                                  <td class="col_6">{{$device_log->vht_type }}</td>
                                  <td class="col_7">{{$device_log->device_id }}</td>
                                  
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
            {{ $device_logs->appends(request()->except('page'))->links() }}
        </div>
        <div>
           @if($device_logs->lastPage() > 1)
                <label for="">Jump To: 
                    <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                        @for ($i = 1; $i <= $device_logs->lastPage(); $i++)
                            <option value="{{ $i }}" {{ $device_logs->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </label>
           @endif
        </div>
    </div>
