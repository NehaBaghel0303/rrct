@extends('backend.layouts.main') 
@section('title', 'Report')
@section('content')
    @php
    $breadcrumb_arr = [
        ['name'=>'Manage', 'url'=> "javascript:void(0);", 'class' => ''],
        ['name'=>'Report', 'url'=> "javascript:void(0);", 'class' => 'active']
    ]
    @endphp

    <style>
        .table thead {
            background-color: #fff;
        }
        div.side-slide {
        background-color: #fff;
        top: 0;
        right: -100%; 
        height: 100%;
        position: fixed;
        width: 285px;
        z-index: 99999;
    }

    </style>

    <div class="container-fluid">
    	<div class="page-header" style="margin-bottom: 15px;">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <div class="btn-group mt-2 custom-group pb-2" role="group" aria-label="Basic example" style="overflow-x: scroll;
                            width: 100%;">
                                @php
                                    $reports = [
                                       [ 'slug' => 'inplant','name' => 'InPlant','route'=>route("panel.report.index")."?active=inplant"],
                                       [ 'slug' => 'fasttag','name' => 'FastTag','route'=>route("panel.report.index")."?active=fasttag"],
                                       [ 'slug' => 'diesel','name' => 'Diesel','route'=>route("panel.report.index")."?active=diesel"],
                                       [ 'slug' => 'trip','name' => 'Trip Report','route'=>route("panel.report.index")."?active=trip"],
                                       [ 'slug' => 'intransit','name' => 'Intransit Report','route'=>route("panel.report.index")."?active=intransit"],
                                       [ 'slug' => 'delay-eta','name' => 'Delay ETA','route'=>route("panel.report.index")."?active=delay-eta"],
                                       [ 'slug' => 'delay-loading-eta','name' => 'Delay-ETA-At-Loading','route'=>route("panel.report.index")."?active=delay-loading-eta"],
                                       [ 'slug' => 'delay-at-unloading','name' => 'Delay-ETA-At-Unloading','route'=>route("panel.report.index")."?active=delay-at-unloading"],
                                       [ 'slug' => 'delay-at-en-route','name' => 'Delay-ETA-At-En-Route','route'=>route("panel.report.index")."?active=delay-at-en-route"],
                                       [ 'slug' => 'delay-for-new-load','name' => 'Delay for New Load','route'=>route("panel.report.index")."?active=delay-for-new-load"],
                                       [ 'slug' => 'hvm','name' => 'HVM','route'=>route("panel.report.index")."?active=hvm"],
                                    ]
                                @endphp
                                @foreach ($reports as $report)
                                    <button type="button"  onclick="callAjax('{{$report['route']}}','{{$report['slug']}}')" class="btn btn-outline-primary {{$report['slug']}}-btn activeBtn @if(request()->get('active') == $report['slug']) active @elseif(!request()->get('active') && $loop->iteration == 1)  active @endif">{{ $report['name'] }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="title-name"></h3>
                        <button type="button" class="off-canvas btn btn-primary">Advance Filter</button>
                    </div>
                    <div id="ajax-container">
                        @include('backend.report.include.empty')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    
    <script src="{{asset('backend/js/index-page.js')}}"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    @yield('child-script')
    <script>
        var active = 'inplant';
         function html_table_to_excel(type)
        {
            var table_core = $(document).find("#table").clone();
            var clonedTable = $(document).find("#table").clone();
            clonedTable.find('[class*="no-export"]').remove();
            clonedTable.find('[class*="d-none"]').remove();
            $(document).find("#table").html(clonedTable.html());
            var data = document.getElementById('table');

            var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
            XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
            XLSX.writeFile(file, 'reportFile.' + type);
            $(document).find("#table").html(table_core.html());
            
        }

        $(document).on('click','#export_button',function(){
            html_table_to_excel('xlsx');
        })
        var empty = $('#ajax-container').html();

        $(document).on('click', '.off-canvas', function(e) {
            e.stopPropagation();
            var type = $(this).data('type');
            $('.side-slide').animate({right: type == 'close' ? "-100%" : "0px"}, 200);
        });

        $(document).on('click','body',function(){

          var type =  $('.close.off-canvas').data('type');
          $('.side-slide').animate({right: type == 'close' ? "-100%" : "0px"}, 200);
        });
        $(document).on('click','.add-remark',function(){
            $('#remarkText').val('');
            $('#remarkId').val(0);
            $('#remarkLrId').val($(this).data('lr_id'));
            $('#updateRemark').modal('show');
        });
        $(document).on('click','.edit-remark',function(){
                $('#remarkLrId').val();
                $('#remarkId').val($(this).data('id'));
                $('#remarkText').val($(this).data('remarks'));
                $('#updateRemark').modal('show');
        });
        $(document).on('submit','#RemarkForm',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var form_action = $(this).attr('action');
            $.ajax(form_action, {
                type: "post",
                data: data,
                success: function (data,status,xhr) {   // success callback function
                    $('#updateRemark').modal('hide');
                    $.toast({
                        heading: 'SUCCESS',
                        text: data.message,
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-right'
                    });
                    callAjax("{{route('panel.report.index').'?active='.request()->get('active')}}", getUrlParam('active'));
                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                    
                }
            });
        });

        var val = $('.activeBtn').html();
           $('.title-name').html(val);
       
        $(document).on('click', '.activeBtn', function() {
            $(this).addClass('active');
            var val = $(this).html();
            $('.title-name').html(val);
            $(this).siblings().removeClass('active');
            updateURLParam('page',1);
        });
        
        $(document).on('click', '.vehicle-boxes', function() {
            var val = $(this).html();
           $('.vehicle-number').html(val);
        });


        function callAjax(url, slug){
            $('#ajax-container').html('<div class="card-body"><p class="text-center p-5 m-5">Report Loading..</p></div>');
            updateURLParam('active',slug);
            $('.title-name').html($('.activeBtn.active').html());
            $.ajax(url, 
            {
                type: "GET",
                cache: false,     // type of response data
                contentType: false,
                processData: false,
                dataType: 'html', 
                success: function (data,status,xhr) {   // success callback function
                    $('#ajax-container').html(data);
                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                    $('#ajax-container').html("Something went wrong");
                }
            });
        }        

        $(document).ready(function() {
            @if(request()->get('active'))
                var default_route = "{{route('panel.report.index').'?active='.request()->get('active')}}";
                console.log(default_route);
                callAjax(default_route,"{{request()->get('active')}}");
            @else
                var default_route = "{{route('panel.report.index').'?active=inplant'}}";
                callAjax(default_route,'inplant');
            @endif
        });


        
    </script>
       
       
    @endpush
@endsection
