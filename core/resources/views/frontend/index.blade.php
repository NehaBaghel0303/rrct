@extends('frontend.layouts.main')

@section('meta_data')
    @php
		$meta_title = 'Home | '.getSetting('app_name');		
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

@section('content')
<section class="bg-half-170 w-100 " style="background: url('frontend/assets/home/home-screen.jpeg');">
    <div class="bg-overlay"></div>
    <div class="container d-flex justify-content-center home-page-container text-center align-items-center">
        <div class="row mt-5 ">
            <div class="col-md-12">
                <h2 >Welcome to</h2>
                <h1>RAMAN ROADWAYS PVT. LMT</h1>

                <a class="login-btn d-block" href="{{ url('login') }}">
                    Login
                </a>

                <div class="mt-3">
                    <span><i class="uil uil-angle-right-b" style="font-size:30px;"></i></span>
                </div>

                <div class="mt-5">
                    <img src="{{ asset('frontend/assets/images/sound-logo.png') }}" class=" mb-4 d-block mx-auto" alt="website-logo" style="height:45%;width: 20%;filter: invert(1);"> 
                </div>
            </div>
        </div><!--end row--> 
    </div>
</section>
    
@endsection