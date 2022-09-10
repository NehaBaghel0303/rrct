@extends('frontend.layouts.assets')
@if(getSetting('recaptcha') == 1)
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
@endif

@section('meta_data')
    @php
		$meta_title = 'Login | '.getSetting('app_name');		
		$meta_description = '' ?? getSetting('seo_meta_description');
		$meta_keywords = '' ?? getSetting('seo_meta_keywords');
		$meta_motto = '' ?? getSetting('site_motto');		
		$meta_abstract = '' ?? getSetting('site_motto');		
		$meta_author_name = '' ?? 'Defenzelite';		
		$meta_author_email = '' ?? 'support@defenzelite.com';		
		$meta_reply_to = '' ?? getSetting('frontend_footer_email');		
		$meta_img = ' ';		
	@endphp
@endsection
<style>
    .alert {
        padding: 0px 15px !important;
    }
    .login-image{
        height: 55px;
        position: absolute;
        transform: translate(-50%);
        left: 26%;
        top: 42%;
    }

    @media(max-width:768px){
        .mobile_view{
            display: none;
        }
    }

        .bg-half-170{
            padding: 145px 0;
            background-size: cover !important;
            -ms-flex-item-align: center;
            align-self: center;
            position: relative;
            background-position: bottom center !important;
            height: 131vh !important;
            border-radius: 50%;
            overflow: hidden;
            width: 100%;
            position: absolute !important;
            width: 150vh;
            transform: translate(50%,-50%);
            right: 0;
            top: 53vh;
        }
</style>
@section('content')
<section class="h-100" style="background: #F1F2F6;overflow: hidden;">
    <div class="row no-gutters">
        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
            <div class="form-signin p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="mb-3 text-center">Login</h5>
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    <div class="form-wrapper mb-2 mt-60">
                        <input type="text" name="email" style="border-radius: 30px;padding: 12px" class="form-control  form-input @error('email') is-invalid @enderror" id="floatingInput" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-20">
                        <input type="password" style="border-radius: 30px;padding: 12px" class="form-control bg-white @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                        {{-- <label for="floatingPassword">Password</label> --}}
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- @if(getSetting('recaptcha') == 1)
                        <div class="form-floating mb-3 d-flex justify-content-center">
                            <div class=""> {!! htmlFormSnippet() !!} </div>
                        </div>
                    @endif --}}
                    <div class="d-flex justify-content-end">
                        {{-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option1" id="flexCheckDefault" name="item_checkbox">
                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                            </div>
                        </div> --}}
                        <div class="forgot-pass mt-2">
                            <a href="{{url('password/forget')}}" class="text-dark small">Forgot password?</a>
                        </div>    
                    </div>
                    <div class="login-btn w-100 mt-60 p-0" style="background: linear-gradient(180deg, rgb(104 137 165) 0%, rgba(9,9,121,1) 50%, rgba(5,18,52,1) 100%);">
                        <button class="w-100 text-white btn" type="submit">Login</button>
                    </div>

                    {{-- <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> {{ getSetting('app_name') }}</p> --}}
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 mobile_view">
            <section class="bg-half-170" style="background: url('frontend/assets/home/home-screen.jpeg');">
                <div class="bg-overlay"></div>

                <div>
                    <img src="{{ asset('frontend/assets/images/login/login.png') }}" class="login-image" alt="">
                </div>
            </section>   
        </div>
    </div>
</section>
@endsection