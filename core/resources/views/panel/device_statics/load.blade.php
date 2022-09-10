<div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <div>
                <label for="">Show
                    <select name="length" style="width:60px;height:30px;border: 1px solid #eaeaea;" id="length">
                        <option value="10"{{ $device_statics->perPage() == 10 ? 'selected' : ''}}>10</option>
                        <option value="25"{{ $device_statics->perPage() == 25 ? 'selected' : ''}}>25</option>
                        <option value="50"{{ $device_statics->perPage() == 50 ? 'selected' : ''}}>50</option>
                        <option value="100"{{ $device_statics->perPage() == 100 ? 'selected' : ''}}>100</option>
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
                        
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Device Id</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Status</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Last Active At</a></li>                                                
                    </ul>
                                         --}}
                                
                                     {{--
                                <a href="javascript:void(0);" id="print" data-url="{{ route('panel.device_statics.print') }}"  data-rows="{{json_encode($device_statics) }}" class="btn btn-primary btn-sm">Print</a>
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
                            Device Id <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="device_id"></i><i class="ik ik ik-arrow-down desc" data-val="device_id"></i></div></th>
                                                    <th class="col_2">
                            Status <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="status"></i><i class="ik ik ik-arrow-down desc" data-val="status"></i></div></th>
                                                    <th class="col_3">
                            Last Active At <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="last_active_at"></i><i class="ik ik ik-arrow-down desc" data-val="last_active_at"></i></div></th>
                                                                        </tr>
                </thead>
                <tbody>
                    @if($device_statics->count() > 0)
                                                    @foreach($device_statics as  $device_static)
                            <tr>
                                <td class="no-export">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i class="ik ik-chevron-right"></i></button>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <a href="{{ route('panel.device_statics.edit', $device_static->id) }}" title="Edit Device Static" class="dropdown-item "><li class="p-0">Edit</li></a>
                                            <a href="{{ route('panel.device_statics.destroy', $device_static->id) }}" title="Delete Device Static" class="dropdown-item  delete-item"><li class=" p-0">Delete</li></a>
                                        </ul>
                                    </div> 
                                </td>
                                <td  class="text-center no-export"> {{  $loop->iteration }}</td>
                                <td class="col_1">{{$device_static->device_id }}</td>
                                  <td class="col_2">{{$device_static->status }}</td>
                                  <td class="col_3">{{$device_static->last_active_at }}</td>
                                  
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
            {{ $device_statics->appends(request()->except('page'))->links() }}
        </div>
        <div>
           @if($device_statics->lastPage() > 1)
                <label for="">Jump To: 
                    <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                        @for ($i = 1; $i <= $device_statics->lastPage(); $i++)
                            <option value="{{ $i }}" {{ $device_statics->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </label>
           @endif
        </div>
    </div>
