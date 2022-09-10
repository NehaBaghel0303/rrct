<div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <div>
                <label for="">Show
                    <select name="length" style="width:60px;height:30px;border: 1px solid #eaeaea;" id="length">
                        <option value="10"{{ $l_r_progress->perPage() == 10 ? 'selected' : ''}}>10</option>
                        <option value="25"{{ $l_r_progress->perPage() == 25 ? 'selected' : ''}}>25</option>
                        <option value="50"{{ $l_r_progress->perPage() == 50 ? 'selected' : ''}}>50</option>
                        <option value="100"{{ $l_r_progress->perPage() == 100 ? 'selected' : ''}}>100</option>
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
                        
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Lr Id</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Device Id</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_3"><a href="javascript:void(0);"  class="btn btn-sm">Type</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_4"><a href="javascript:void(0);"  class="btn btn-sm">Vht Type</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_5"><a href="javascript:void(0);"  class="btn btn-sm">Distance Covered</a></li>                        <li class="dropdown-item p-0 col-btn" data-val="col_6"><a href="javascript:void(0);"  class="btn btn-sm">Distance Remain</a></li>                                                
                    </ul>
                                         --}}
                                
                                     {{--
                                <a href="javascript:void(0);" id="print" data-url="{{ route('panel.l_r_progress.print') }}"  data-rows="{{json_encode($l_r_progress) }}" class="btn btn-primary btn-sm">Print</a>
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
                            Device Id <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="device_id"></i><i class="ik ik ik-arrow-down desc" data-val="device_id"></i></div></th>
                                                    <th class="col_3">
                            Type <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="type"></i><i class="ik ik ik-arrow-down desc" data-val="type"></i></div></th>
                                                    <th class="col_4">
                            Vht Type <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="vht_type"></i><i class="ik ik ik-arrow-down desc" data-val="vht_type"></i></div></th>
                                                    <th class="col_5">
                            Distance Covered <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="distance_covered"></i><i class="ik ik ik-arrow-down desc" data-val="distance_covered"></i></div></th>
                                                    <th class="col_6">
                            Distance Remain <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="distance_remain"></i><i class="ik ik ik-arrow-down desc" data-val="distance_remain"></i></div></th>
                                                                        </tr>
                </thead>
                <tbody>
                    @if($l_r_progress->count() > 0)
                                                    @foreach($l_r_progress as  $l_r_progress)
                            <tr>
                                <td class="no-export">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i class="ik ik-chevron-right"></i></button>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <a href="{{ route('panel.l_r_progress.edit', $l_r_progress->id) }}" title="Edit L R Progress" class="dropdown-item "><li class="p-0">Edit</li></a>
                                            <a href="{{ route('panel.l_r_progress.destroy', $l_r_progress->id) }}" title="Delete L R Progress" class="dropdown-item  delete-item"><li class=" p-0">Delete</li></a>
                                        </ul>
                                    </div> 
                                </td>
                                <td  class="text-center no-export"> {{  $loop->iteration }}</td>
                                <td class="col_1">{{$l_r_progress->lr_id }}</td>
                                  <td class="col_2">{{$l_r_progress->device_id }}</td>
                                  <td class="col_3">{{$l_r_progress->type }}</td>
                                  <td class="col_4">{{$l_r_progress->vht_type }}</td>
                                  <td class="col_5">{{$l_r_progress->distance_covered }}</td>
                                  <td class="col_6">{{$l_r_progress->distance_remain }}</td>
                                  
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
            {{ $l_r_progress->appends(request()->except('page'))->links() }}
        </div>
        <div>
           @if($l_r_progress->lastPage() > 1)
                <label for="">Jump To: 
                    <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                        @for ($i = 1; $i <= $l_r_progress->lastPage(); $i++)
                            <option value="{{ $i }}" {{ $l_r_progress->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </label>
           @endif
        </div>
    </div>
