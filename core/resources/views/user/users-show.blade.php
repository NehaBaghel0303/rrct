@extends('backend.layouts.main')
@section('title', 'Show User')
@section('content')

    @push('head')
        <link rel="stylesheet" href="{{ asset('backend/plugins/fullcalendar/dist/fullcalendar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/plugins/datedropper/datedropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    <style>
        .customer-buttons {
            margin-bottom: 15px;
        }

        .note-toolbar-wrapper {
            height: 50px !important;
            overflow-x: auto;
        }

        .dgrid {
            display: grid !important;
        }

    </style>
    @php
    $statistics = [
            ['a' => '#!', 'name'=>'Total Enquiry', "count"=>"2476", "icon"=>"<i class='fas fa-cube f-24 text-mute'></i>" ,'col'=>'3', 'color'=> 'primary'],
            ['a' => '#!', 'name'=>'Total Ticket', "count"=>"2476", "icon"=>"<i class='fas fa-cube f-24 text-mute'></i>" ,'col'=>'3', 'color'=> 'primary'],
            ['a' => '#!', 'name'=>'Total Lead', "count"=>"2476", "icon"=>"<i class='fas fa-cube f-24 text-mute'></i>" ,'col'=>'3', 'color'=> 'primary'],
            ['a' => '#!', 'name'=>'Total Article', "count"=>"2476", "icon"=>"<i class='fas fa-user f-24 text-mute'></i>" ,'col'=>'3', 'color'=> 'red'],
        ];
    @endphp 

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fas fa-user bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ $user->name }}</h5>
                            <span>User Name </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('panel.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Customer') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>

        @include('backend.include.message')

        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div style="width: 150px; height: 150px; position: relative" class="mx-auto">
                                <img src="{{ ($user && $user->avatar) ? $user->avatar : asset('backend/default/default-avatar.png') }}" class="rounded-circle" width="150" style="object-fit: cover; width: 150px; height: 150px" />
                                <button class="btn btn-dark rounded-circle position-absolute" style="width: 30px; height: 30px; padding: 8px; line-height: 1; top: 0; right: 0"  data-toggle="modal" data-target="#updateProfileImageModal"><i class="ik ik-camera"></i></button>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block pt-10">{{ __('Full Name') }} </small>
                        <h6>{{ $user->name ?? '' }}</h6>
                        <small class="text-muted d-block">{{ __('Email address') }} </small>
                        <h6>{{ $user->email ?? '' }}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Phone') }}</small>
                        <h6>{{ $user->phone ?? '' }}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Added At') }}</small>
                        <h6>{{ getFormattedDate($user->created_at) ?? '' }}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Added By') }}</small>
                        <h6>{{ NameById($user->id) ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
               
                {{-- tab start --}}
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item " >
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-activity" aria-selected="true">{{ __('Setting')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-note-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-note" aria-selected="false">{{ __('Kyc')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show" id="previous-month" role="tabpanel" aria-labelledby="pills-note-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        @php
                                            if(isset($user_kyc->details) && $user_kyc->details != null){
                                                $kyc_record = json_decode($user_kyc->details,true);
                                            }
                                        @endphp
                                        <div class="card-body">
                                            <form action="{{ route('panel.update-ekyc-status', $user->id) }}" method="POST" class="form-horizontal">
            
                                                 @if(isset($user_kyc) && $user_kyc->status == 0)
                                                    <div class="alert alert-info">
                                                        eKyc Request isn't submitted yet!
                                                    </div>
                                                @elseif(isset($user_kyc) && $user_kyc->status == 1)
                                                    <div class="alert alert-success">
                                                        User eKyc Request has been verified!
                                                    </div>
                                                @elseif(isset($user_kyc) && $user_kyc->status == 2)
                                                    <div class="alert alert-danger">
                                                        User eKyc Request has been rejected!
                                                    </div>
                                                @elseif(isset($user_kyc) && $user_kyc->status == 3)
                                                   <div class="alert alert-warning">
                                                        User submited eKyc Request, Please validate and take appropriated action.
                                                    </div>
                                                @endif
            
                                                @csrf
                                                <input id="status" type="hidden" name="status" value="">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                @if(isset($user_kyc) && $user_kyc->status != null)
                                                    <div class="row">
                                                        <div class="col-md-6 col-6"> <label>{{ __('Document Type')}}</label>
                                                            <br>
                                                            <h5 class="strong text-muted">{{ $kyc_record['document_type'] ?? '' }}</h5>
                                                        </div>
                                                        <div class="col-md-6 col-6"> <label>{{ __('Document Number')}}</label>
                                                            <br>
                                                            <h5 class="strong text-muted">{{ $kyc_record['document_number']  ?? ''}}</h5>
                                                        </div>
                                                        <div class="col-md-6 col-6"> <label>{{ __('Document Front Image')}}</label>
                                                            <br>
                                                                @if ($kyc_record != null && $kyc_record['document_front'] != null)
                                                                <a href="{{ asset($kyc_record['document_front']) }}" target="_blank" class="badge badge-info">View Attachment</a>
                                                                @endif
                                                        </div>
                                                        <div class="col-md-6 col-6"> <label>{{ __('Document Back Image')}}</label>
                                                            <br>
                                                            @if ($kyc_record != null && $kyc_record['document_back'] != null)
                                                                @if ($kyc_record != null && $kyc_record['document_back'] != null)
                                                                    <a href="{{ asset($kyc_record['document_back']) }}" target="_blank" class="badge badge-info">View Attachment</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <hr class="m-2">
                                                        @if(AuthRole() == 'Admin')
                                                            @if(isset($user_kyc) && $user_kyc->status == 1)
                                                                <div class="col-md-12 col-12 mt-5"> 
                                                                    <label>{{ __('Note')}}</label>
                                                                    <textarea class="form-control" name="remark" type="text" >{{ $ekyc['admin_remark'] ?? '' }}</textarea>
                                                                    <button type="submit" class="btn btn-danger mt-2 btn-lg reject">Reject</button>
                                                                </div>
                                                            @elseif(isset($user_kyc) && $user_kyc->status == 2)
                                                                <div class="col-md-12 col-12 mt-5"> 
                                                                    <button type="submit" class="btn btn-success mt-2 btn-lg accept">Accept</button>
                                                                </div>
                                                            @elseif(isset($user_kyc) && $user_kyc->status == 3)
                                                                <div class="col-md-12 col-12 mt-5"> <label>{{ __('Rejection Reason (If Any)')}}</label>
                                                                    <textarea class="form-control" name="remark" type="text" >{{ $kyc_record['admin_remark'] ?? '' }}</textarea>
                                                                    <button  type="submit" class="btn btn-danger mt-2 btn-lg reject">Reject</button>
                                                                    <button type="submit" class="btn btn-success accept ml-5 mt-2 btn-lg">Accept</button>
                                                                </div>
                                                            @endif
                                                        @endif    
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form action="{{ route('panel.update-user-profile', $user->id) }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('User Name')}}<span class="text-red">*</span></label>
                                                <input type="text" placeholder="Assign To" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">{{ __('Email')}}<span class="text-red">*</span></label>
                                                <input type="email" placeholder="test@test.com" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                            </div>  
                                        </div>
                                         
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">{{ __('Contact No')}}</label>
                                                <input type="number" placeholder="123 456 7890" id="phone" name="phone" class="form-control" required
                                                 value="{{ $user->phone }}">
                                            </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dob">{{ __('DOB')}}</label>
                                                <input class="form-control" type="date" name="dob" placeholder="Select your date" value="{{ $user->dob }}" />
                                                <div class="help-block with-errors"></div>
                                            </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">{{ __('Status')}} </label>                                 
                                                <select required name="status" class="form-control select2"  >
                                                    <option value="" readonly>{{ __('Select Status')}}</option>
                                                    @foreach (getStatus() as $index => $item)
                                                        <option value="{{ $item['id'] }}" {{ $user->status == $item['id'] ? 'selected' :'' }}>{{ $item['name'] }}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="country">{{ __('Country')}}</label>
                                                <select name="country" id="country" class="form-control select2">
                                                    <option value="" readonly>{{ __('Select Country')}}</option>
                                                    @foreach (\App\Models\Country::all() as  $country)
                                                        <option value="{{ $country->id }}" @if($user->country != null) {{ $country->id == $user->country ? 'selected' : '' }} @elseif($country->name == 'India') selected @endif>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="state">{{ __('State')}}</label> 
                                                <select name="state" id="state" class="form-control select2">
                                                    @if($user->state != null)
                                                        <option  required value="{{ $user->state }}" selected>{{ fetchFirst('App\Models\State', $user->state, 'name') }}</option>
                                                    @endif
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="city">{{ __('City')}}</label>
                                                <select name="city" id="city" class="form-control select2">
                                                    @if($user->city != null)
                                                        <option required value="{{ $user->city }}" selected>{{ fetchFirst('App\Models\City', $user->city, 'name') }}</option>
                                                    @endif
                                                </select> 
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pincode">{{ __('Pincode')}}</label>
                                                <input id="pincode" type="number" class="form-control" name="pincode" placeholder="Enter Pincode" value="{{ $user->pincode ?? old('pincode') }}" >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <div class="form-radio">
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="gender"  value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }}>
                                                                <i class="helper"></i>{{ __('Male')}}
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="gender" value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }}>
                                                                <i class="helper"></i>{{ __('Female')}}
                                                            </label>
                                                        </div>
                                                </div>                                        
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-top: 20px;">
                                                <div class="form-check mx-sm-2">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="is_verified" class="custom-control-input" value="1" {{ $user->is_verified == 1 ? 'checked' : '' }}>
                                                        <span class="custom-control-label">&nbsp; Verified</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-top: 20px;">
                                                <div class="form-check mx-sm-2">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" value="{{ now() }}" @if($user->email_verified_at != null)  checked @endif name="email_verified_at">
                                                        <span class="custom-control-label">&nbsp; Email verified</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">{{ __('Address')}}</label>
                                                <textarea name="address" name="address" rows="5" class="form-control">{{ $user->address }}</textarea>
                                            </div>  
                                        </div>                                    
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success"  >Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tab end --}}
                {{-- Modals Start--}}

                <div class="modal fade" id="updateProfileImageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateProfileImageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="{{ route('panel.update-profile-img', $user->id) }}" method="POST" enctype="multipart/form-data">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateProfileImageModalLabel">Update profile image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    @csrf
                                    <img 
                                    src="{{ ($user && $user->avatar) ? asset('storage/backend/users/'.$user->avatar) : asset('backend/default/default-avatar.png') }}"
                                     class="img-fluid w-50 mx-auto d-block" alt="" id="profile-image">
                                    <div class="form-group mt-5">
                                        <label for="avatar" class="form-label">Select profile image</label> <br>
                                        <input type="file" name="avatar" id="avatar" accept="image/jpg,image/png,image/jpeg">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Modals End--}}

            </div>
            
        </div>
    </div>

   @push('script') 
    
    <script src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('backend/plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datedropper/datedropper.min.js') }}"></script>
    <script src="{{ asset('backend/js/form-picker.js') }}"></script>

    <script>
            function getStates(countryId = 101) {
				$.ajax({
					url: '{{ route("world.get-states") }}',
					method: 'GET',
					data: {
						country_id: countryId
					},
					success: function(res) {
						$('#state').html(res).css('width', '100%').select2();
					}
				})
			}
			
			function getCities(stateId = 101) {
				$.ajax({
					url: '{{ route("world.get-cities") }}',
					method: 'GET',
					data: {
						state_id: stateId
					},
					success: function(res) {
						$('#city').html(res).css('width', '100%').select2();
					}
				})
			}
    
        	// Country, City, State Code
			$('#state, #country, #city').css('width', '100%').select2();
			
			$('#country').on('change', function(e) {
				getStates($(this).val());
			})
		
			$('#state').on('change', function(e) {
				getCities($(this).val());
			})

			 // this functionality work in edit page
			function getStateAsync(countryId) {
				return new Promise((resolve, reject) => {
					$.ajax({
						url: '{{ route("world.get-states") }}',
						method: 'GET',
					data: {
						country_id: countryId
					},
					success: function (data) {
						$('#state').html(data);
						$('.state').html(data);
					resolve(data)
					},
					error: function (error) {
					reject(error)
					},
				})
				})
			}
    
			function getCityAsync(stateId) {
				if(stateId != ""){
					return new Promise((resolve, reject) => {
						$.ajax({
							url: '{{ route("world.get-cities") }}',
							method: 'GET',
							data: {
								state_id: stateId
							},
							success: function (data) {
								$('#city').html(data);
								$('.city').html(data);
							resolve(data)
							},
							error: function (error) {
							reject(error)
							},
						})
					})
				}
			}
            $(document).ready(function(){
                $('.accept').on('click',function(){
                   $('#status').val(1)
                });
                $('.reject').on('click',function(){
                   $('#status').val(2)
                });
            var country = "{{ $user->country }}";
			var state = "{{ $user->state }}";
			var city = "{{ $user->city }}";

            if(state){
                getStateAsync(country).then(function(data){
                    $('#state').val(state).change();
                    $('#state').trigger('change');
                });
			}
			if(city){
                $('#state').on('change', function(){
                    if(state == $(this).val()){
                        getCityAsync(state).then(function(data){
                            $('#city').val(city).change();
                            $('#city').trigger('change');
                        });
                    }
                });
			}
            });
    </script>
      
    @endpush



@endsection
