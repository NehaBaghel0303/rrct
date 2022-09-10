@extends('backend.layouts.main') 
@section('title', 'Help Center')
@section('content')
@php
    $breadcrumb_arr = [
        ['name'=>'Help Center', 'url'=> "javascript:void(0);", 'class' => 'active']
    ];
    @endphp
    <!-- push external head elements to head -->
    @push('head')
  
    @endpush
        <div class="container-fluid mt-5">                
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3><i class="ik ik-help-circle"></i> Help Center</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="GET" id="helpCenterForm" action="{{ request()->url() }}">
                                <div class="row">
                                    <div class="col-lg-4 pr-0">
                                        <div class="form-group">
                                            <select name="category_id" id="" class="form-control select2">
                                                <option value="">Select Category</option>
                                                @foreach (fetchGetData('App\Models\Category',['category_type_id'],[12]) as $category)
                                                    <option value="{{$category->id}}" @if(request()->has('category_id') && request()->get('category_id') == $category->id) selected  @endif>{{ fetchFirst('App\Models\Category',$category->id ,'name') }} - #{{ $category->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="title" value="{{ request()->get('title') }}" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                              <button class="btn btn-primary" type="submit" id="search"><i class="ik ik-search"></i></button>
                                            </div> 
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-1 pl-0" style="padding-top: 1px">
                                        <a href="{{ route('panel.help-center') }}" class="btn btn-warning" style="height: 34px;"><i class="ik ik-refresh-cw"></i></a>
                                    </div>  --}}
                                </div>
                            </form>
                            <h6>Total Faqs ({{$faqs->count()}})</h6>
                            <div id="accordion">
                            @if($faqs->count() > 0)
                                @foreach($faqs as $faq)
                                    <div class="accordion-header mb-3" id="heading{{$faq->id}}">
                                        <button class="btn accordion-button collapsed" style="background: #fff;
                                        box-shadow: rgb(0 0 0 / 15%) 1.95px 1.95px 2.6px;
                                        border: 1px solid #9696f1;" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                          Q.{{$loop->iteration}}  {{ $faq->title }}
                                        </button>
                                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion" style="">
                                            <div class="accordion-body pt-3">
                                                {{ $faq->description }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center p-5">
                                    <img src="{{ asset('backend/img/box.png') }}" alt="">
                                    <p class="mt-3">No results found!</p>
                                </div>
                            @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
     @push('script')

     <script>
      
     </script>
      
    @endpush
@endsection
