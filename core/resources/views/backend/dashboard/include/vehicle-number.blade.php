<div class="card" style="margin-bottom: 11px;position: sticky;top: 0;">
    <div class="card-header d-flex justify-content-between">
        <h3 class="dashboard-title">
            {{-- <img src="{{ asset('backend/img/truck_icon.svg') }}" alt=""> --}}
             Vehicle Number</h3>
        <input type="search" id="searchVehicle" name="search" class="form-control" style="width: 140px;" placeholder="Enter Vehicle Number">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 pr-0">
                <input class="cl-custom-radio vehicleStatus" id="marking_01" name="my-radio" value="0" type="radio" checked />
                <label class="cl-custom-radio-label" for="marking_01" title="Click for select/unselect">All (300)</label>
            </div>
            @foreach (getVehicleStatus() as $status)
                <div class="col-lg-3 col-md-6 col-6 p-1" >
                    <div class="form-radio custom-radio">
                        <div class="radio radio-outline radio-inline">
                            <label style="cursor: pointer;">
                                <input type="radio" id="{{ $status['id'] }}" class="custom vehicleStatus" name="radio" value="{{ $status['id'] }}">
                                <i class="helper"  style="--radio-color: {{$status['color']}} !important"></i> 
                                <span class="text-muted {{ $status['id'] }}">{{$status['name']}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3" style="overflow-y:scroll;height: 135px;">
            @php
                $device_logs = \App\Models\DeviceLog::get();
                $vehicle_number = [];
                foreach ($device_logs as $key => $device_log) {
                    $vehicle_number[$key]['id'] = $device_log->id;
                    $vehicle_number[$key]['number'] = $device_log->vehicle_no;
                    $vehicle_number[$key]['status'] = 3;
                    $vehicle_number[$key]['box-wrapper'] = 'green';
                }
                
            @endphp
            @foreach ($vehicle_number as $vehicle)
                <div class="col-lg-4 col-md-6 col-6 mb-2 px-1 vehicle-boxes vehcile-no-{{ $vehicle['status'] }}">
                   <a href="{{route('panel.track',$vehicle['number'])}}" class="vehicle-number" data-active="{{$vehicle['id']}}">
                    <div class="p-2 wrapper-{{ $vehicle['box-wrapper'] }}" data-status={{ $vehicle['status'] }}>
                        <div class="text-center">{{ $vehicle['number'] }}</div>
                    </div>
                   </a>
                </div>
            @endforeach
        </div>
    </div>
</div>