<div class="card hide-statistics" style="margin-bottom: 14px;">
    <div class="card-header">
        <h3 class="dashboard-title">Dashboard</h3>
    </div>
    <div class="card-body ">
        <div class="row dashboard-statistics-one">
            @foreach ($statistics_1 as $item_1)
                <div class="col-lg-3 col-md-4 col-6">
                    <div>
                        <span class="text-muted" title="{{$item_1['title']}}">{{ $item_1['name'] }}</span>
                        <h4 class="{{ $item_1['text-color'] }}">{{ $item_1['count'] }}</h4>
                    </div>
                </div>
            @endforeach

        </div>
        <hr class="p-0 m-1">

        <div class="row mt-3 dashboard-statistics-two">
            @foreach ($statistics_2 as $item_2)
                <div class="col-lg-3 col-md-4 col-6 @if($loop->iteration == 1) pr-lg-0 @endif @if($loop->iteration == 2) pl-lg-0 @endif" >
                    <div>
                        <span class="text-muted">{{ $item_2['name'] }}</span>
                        <h4 class="{{ $item_2['text-color'] }}">{{ $item_2['count'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>