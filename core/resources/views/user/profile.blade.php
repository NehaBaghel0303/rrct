@extends('backend.layouts.main') 
@section('title', 'Profile')
@section('content')
@push('head')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datedropper/datedropper.min.css') }}">
@endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Profile')}}</h5>
                            <span>{{ __('Update Profile')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('panel.dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            @include('backend.include.message')
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"> 
                            <div style="width: 150px; height: 150px; position: relative" class="mx-auto">
                                <img src="{{ ($user && $user->avatar) ?asset($user->avatar) : asset('backend/default/default-avatar.png') }}" class="rounded-circle" width="150" style="object-fit: cover; width: 150px; height: 150px" />
                                <button class="btn btn-dark rounded-circle position-absolute" style="width: 30px; height: 30px; padding: 8px; line-height: 1; top: 0; right: 0"  data-toggle="modal" data-target="#updateProfileImageModal"><i class="ik ik-camera"></i></button>
                            </div>
                            <h4 class="card-title mt-10">{{auth()->user()->name}}</h4>
                            <p class="card-subtitle">{{ ucfirst(auth()->user()->roles[0]->name ?? '') }}</p>
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{ $user->email }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{ $user->phone }}</h6> 
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link setting-tab active {{ request()->get('type') == "setting" ? "active"  : ""}}" data-type="setting" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Setting')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link setting-tab {{ request()->get('type') == "account" ? "active"  : ""}}" data-type="account" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Change Password')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      
                        <div class="tab-pane fade {{ (
                        request()->get('type') == "setting" || request()->get('type') == "") ? 'show active'  : ""}}" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form action="{{ route('panel.update-user-profile', $user->id) }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('Full Name')}}</label>
                                                <input type="text" placeholder="Johnathan Doe" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">{{ __('Email')}}</label>
                                                <input type="email" placeholder="test@test.com" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                            </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">{{ __('Phone No')}}</label>
                                                <input type="text" placeholder="123 456 7890" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
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
                                                <label for="gender">{{ __('Gender')}}<span class="text-red">*</span></label>
                                                <div class="form-radio">
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="gender" value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }}>
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
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success"  >Update Profile</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ request()->get('type') == "account" ? "show active"  : ""}}" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('panel.update-password', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="password">Last Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" placeholder="New Password" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">New Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" placeholder="New Password" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm-password">Confirm Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="confirm-password">
                                            </div>
                                            <button class="btn btn-success" type="submit">Update Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="pills-security-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header py-2">
                                                <p class="card-title m-0">Change Password</p>
                                            </div>
                                            <div class="card-body">
                                                <p>Security Not Yet! </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="updateProfileImageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateProfileImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('panel.update-profile-img', $user->id) }}" method="POST" enctype="multipart/form-data">
                
                <div class="modal-content" style="height:350px;width:376px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProfileImageModalLabel">Update profile image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        @csrf
                        <img src="{{ ($user && $user->avatar) ? asset($user->avatar) : asset('backend/default/default-avatar.png') }}"
                         class="img-fluid w-50 mx-auto d-block" alt="" id="avatar_file">
                        <div class="form-group mt-5">
                            <label for="avatar" class="form-label">Select profile image</label><br>
                            <input type="file" name="avatar" id="avatar" accept="image/jpg,image/png,image/jpeg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('script') 
        <script src="{{ asset('backend/plugins/datedropper/datedropper.min.js') }}"></script>
        <script src="{{ asset('backend/js/form-picker.js') }}"></script>
        <script src="{{ asset('backend/plugins/select2/dist/js/select2.min.js') }}"></script>
           <script>
            
            document.getElementById('avatar').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            $('#avatar_file').removeClass('d-none');
            document.getElementById('avatar_file').src = src
            }

            function updateURLParam(key,val){
                    var url = window.location.href;
                    var reExp = new RegExp("[\?|\&]"+key + "=[0-9a-zA-Z\_\+\-\|\.\,\;]*");

                    if(reExp.test(url)) {
                        // update
                        var reExp = new RegExp("[\?&]" + key + "=([^&#]*)");
                        var delimiter = reExp.exec(url)[0].charAt(0);
                        url = url.replace(reExp, delimiter + key + "=" + val);
                    } else {
                        // add
                        var newParam = key + "=" + val;
                        if(!url.indexOf('?')){url += '?';}

                        if(url.indexOf('#') > -1){
                            var urlparts = url.split('#');
                            url = urlparts[0] +  "&" + newParam +  (urlparts[1] ?  "#" +urlparts[1] : '');
                        }else if(url.indexOf('&') > -1 || url.indexOf('?') > -1){
                            url += "&" + newParam;
                        } else {
                            url += "?" + newParam;
                        }
                    }
                    window.history.pushState(null, document.title, url);
                return url;
                    // window.history.pushState(null, document.title, url);
            }
            $('.setting-tab').click(function{
                var type = $(this).data('type');
                updateURLParam('type',type);
            });

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

