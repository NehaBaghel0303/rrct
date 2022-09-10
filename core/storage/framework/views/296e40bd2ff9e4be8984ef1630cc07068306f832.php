



<?php
 $statistics_1 = [
    ['title'=>"",'name'=>'On Hold','text-color'=>'purple', "count"=>'90','col'=>'3', 'color'=> 'primary'],

    ['title'=>"",'name'=>'Loading','text-color'=>'sky-blue', "count"=>App\User::count(),'col'=>'3', 'color'=> 'primary'],

    ['title'=>"",'name'=>'In-Transit', 'text-color'=>'green',"count"=>fetchAll('App\Models\Article')->count(),'col'=>'3', 'color'=> 'primary'],

    ['title'=>"(Unloading)",'name'=>'At Destination','text-color'=>'rama-green', "count"=>App\Models\UserEnquiry::count(),'col'=>'3', 'color'=> 'red'],
 ];

 $statistics_2 = [

    ['name'=>'Not on trip','text-color'=>'orange', "count"=>'90','col'=>'3', 'color'=> 'primary'],

    ['name'=>'No Device','text-color'=>'pink', "count"=>App\User::count(),'col'=>'3', 'color'=> 'primary'],

    ['name'=>'Breakdown', 'text-color'=>'red',"count"=>fetchAll('App\Models\Article')->count(),'col'=>'3', 'color'=> 'primary'],

    ['name'=>'Total','text-color'=>'black', "count"=>App\Models\UserEnquiry::count(),'col'=>'3', 'color'=> 'red'],
];

?> 
  
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="">
                    <div class="filter-list">
                       <ul class="vehicle-list">
                            <li class="item active">
                                <div>
                                    <div class="count text-white">90</div>
                                    <div class="text text-white">All</div>
                                </div>
                            </li>
                            <li class="item moving">
                                <div class="count">19</div>
                                <div class="text">Moving</div>
                            </li>
                            <li class="item stopped">
                                <div class="count">60</div>
                                <div class="text">Stopped</div>
                            </li>
                            <li class="item idling">
                                <div class="count">4</div>
                                <div class="text">Idling</div>
                            </li>
                            <li class="item offline">
                                <div class="count">9</div>
                                <div class="text">Offline</div>
                            </li>
                        </ul> 
                    </div>
                    <?php echo $__env->make('backend.dashboard.include.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
        <?php echo $__env->make('backend.dashboard.include.all-vehicles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    </div>
</div>

<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/dashboard/admin.blade.php ENDPATH**/ ?>