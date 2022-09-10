@extends('frontend.layouts.intro')

@section('meta_data')
    @php
		$meta_title = 'Sound | '.getSetting('app_name');		
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

@push('style')
<link href="{{asset('frontend/assets/css/style.min.css')}}" class="theme-opt" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" class="theme-opt" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" referrerpolicy="no-referrer" />

<style>
    
    #pot {
        bottom: 15%;
        left: 50%;
        transform: translateX(-50%);
        position: absolute;
        animation: forwards;
        -webkit-animation-name: run;
        -webkit-animation-duration: 5s;
        animation-iteration-count: 1
    }
    @-webkit-keyframes run {
    0% {
        left: 50%;
    }
    50% {
        bottom: 25%;
        left: 50%;
    }
    100% {
        bottom: 25%;
        left: 50%;   
    }
    }
</style>

@endpush

@section('content')

<div style="display: none;">
    <audio class="win-play" controls autoplay>
        <source src="{{ asset('backend/audio/ubi_soft.mp3') }}" type="audio/mpeg">
    </audio>
    <button id="win-player">play</button>
</div>

<section class="bg-half-170 w-100 " style="background: url('frontend/assets/home/home-screen.jpeg');">
    <div class="bg-overlay"></div>
        <div class="container">
            <div id="pot" class="text-center">
                <img src="{{ asset('frontend/assets/images/sound-logo.png') }}" class=" mb-4 d-block mx-auto" alt="website-logo" style="height:45%;width: 50%;filter: invert(1);opacity: 0.7;"> 
                <h4 class="m-0 p-0 text-white">Raman Roadways Private Limited</h4>
                <span class="text-white" style="opacity: 0.9;">Control Tower</span>

                <div class="mt-5 loader d-none">
                    <i class="fa fa-spin fa-spinner text-white"></i>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

            function init(){
                $('.loader').removeClass('d-none');
                setTimeout(() => {
                   setTimeout(() => {
                    $('#win-player').focus().click();
                   }, 500);
                   window.location.href = "panel/dashboard";
               }, 5000);
            }

            init();
          function winplay() {
            $("audio.win-play").trigger("play");
            }

          $('#win-player').on('click',function(){
            winplay();
        });
</script>
@endpush