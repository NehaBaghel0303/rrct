@extends('backend.layouts.main') 
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        @if(auth()->check())    
            @if(auth()->user()->roles[0]->name == 'Super Admin')
                @include('backend.dashboard.developer')
            @elseif(auth()->user()->roles[0]->name == 'Admin')
               @include('backend.dashboard.admin')
            @else
                @include('backend.dashboard.user')
            @endif  
        @endif
    </div>
	
    
   
@endsection

@push('script')
   


    <script>
        $('#searchVehicle').on('keyup',function(){
            var search_value = $(this).val().toLowerCase();
            $(".vehicle-boxes").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_value) > -1)
            });
        });

        var urlPath = "{{url('/')}}"+'/map/';
        var trucks = "{{route('panel.get.devices.json')}}";
        var device_types = [];
        device_types['trucks'] = trucks;
        console.log(trucks);
 
    


        $('.vehicleStatus').on('click',function(){
            var statusId = $(this).val();
            if(statusId != 0){
                $('.vehicle-boxes').hide();
                $('.vehcile-no-'+statusId).show();
            }else{
                $('.vehicle-boxes').show();
            }
        });

        $('#searchVeichleBtn').on('click',function(){
          var formData = $('#vehicleFilterForm').serialize();
          console.log(formData);
          url = "{{ route('panel.get.vehicle.record') }}";
            $.ajax({
                url: url,   
                method: 'get',
                data: formData,
                success: function(data){
                    console.log(data);
                }   
            });
        })
      
    </script>
@endpush