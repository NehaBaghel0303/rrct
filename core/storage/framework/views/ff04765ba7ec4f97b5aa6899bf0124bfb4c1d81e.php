 
<?php $__env->startSection('title', 'Analysis'); ?>
<?php $__env->startPush('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/chartist/dist/chartist.min.css')); ?>">
<style>
    .ct-series-a .ct-area, .ct-series-a .ct-slice-donut-solid, .ct-series-a .ct-slice-pie {
        fill: #0229f1 !important;
    }
    .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {
        stroke: #03499d !important;
    }
    .btn.focus, .btn:focus {
        outline: none;
        box-shadow: none !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('Analysis', 'Report'); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid mt-3">
    <div class="accordion" id="myAccordion">
        <div class="accordion-item">
                <h2 class="accordion-header bg-white rounded" style="cursor:pointer;" id="headingOne">
                    <div class="d-flex justify-content-between">
                            <button type="button" class="accordion-button collapsed fw-700 collapsed btn bg-white align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                <img src="<?php echo e(asset('backend/img/truck-delay.png')); ?>" style="height:28px;"> <span style="padding: 5px 0px 0px 8px;">Delay ETA</span>
                            </button>
                        <div>
                            <a href="<?php echo e(route('panel.report.index',['active' => 'delay-eta','page' => 1])); ?>" class="btn btn-sm btn-primary">Expand all</a>
                        </div>
                    </div>  									
                </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-block">
                                <div id="lineChart_area1" class="chart-shadow st-cir-chart lineChart_area_one"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <table class="mt-3 table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th> 
                                        <th>Vehicle No.</th> 
                                        <th>Customer</th> 
                                        <th>Delay</th> 
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 1; $i < 11; $i++): ?>
                                        <tr>
                                            <td>#<?php echo e($i); ?></td> 
                                            <td>121982<?php echo e($i); ?></td> 
                                            <td><?php echo e('Neha'); ?></td> 
                                            <td><?php echo e('5 Minutes'); ?></td> 
                                            <td><?php echo e('Test'); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="accordion-item">
            <h2 class="accordion-header bg-white rounded" style="cursor:pointer;" id="headingTwo">
                <div class="d-flex justify-content-between">
                    <button type="button" class="accordion-button collapsed fw-700 btn btn bg-white align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseTwo"> 
                        <img src="<?php echo e(asset('backend/img/shipping.png')); ?>" style="height:30px;">
                        <span class="pl-1">Delay at Loading Point</span>
                    </button>
                    <div>
                        <a href="<?php echo e(route('panel.report.index',['active' => 'delay-loading-eta','page' => 1])); ?>" class="btn btn-sm btn-primary">Expand all</a>
                    </div>
                </div>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show onload-remove" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-block">
                                <div id="lineChart_area2" class="chart-shadow st-cir-chart lineChart_area_two"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                       <th>Sr No.</th> 
                                       <th>Vehicle No.</th> 
                                       <th>Customer</th> 
                                       <th>Delay</th> 
                                       <th>Remark</th>  
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php for($i = 1; $i < 11; $i++): ?>
                                        <tr>
                                            <td>#<?php echo e($i); ?></td>
                                            <td>8967<?php echo e($i); ?></td>
                                            <td><?php echo e('Anjali'); ?></td>
                                            <td><?php echo e('10 Minutes'); ?></td>
                                            <td><?php echo e('nothing'); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                               </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header bg-white rounded" style="cursor:pointer;" id="headingThree">
                <div class="d-flex justify-content-between">
                    <button type="button" class="accordion-button collapsed fw-700 btn bg-white align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        <img src="<?php echo e(asset('backend/img/container.png')); ?>" style="height:24px;"><span class="pl-1">Delay at Un-Loading Point</span>
                    </button>									
                    <div>
                        <a href="<?php echo e(route('panel.report.index',['active' => 'delay-at-unloading','page' => 1])); ?>" class="btn btn-sm btn-primary">Expand all</a>
                    </div>
                </div>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse show onload-remove" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-block">
                                <div id="lineChart_area3" class="chart-shadow st-cir-chart lineChart_area_three"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                       <th>Sr No.</th> 
                                       <th>Vehicle No.</th> 
                                       <th>Customer</th> 
                                       <th>Delay</th> 
                                       <th>Remark</th>  
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php for($i = 1; $i < 11; $i++): ?>
                                        <tr>
                                            <td>#<?php echo e($i); ?></td>
                                            <td>8967<?php echo e($i); ?></td>
                                            <td><?php echo e('Anjali'); ?></td>
                                            <td><?php echo e('10 Minutes'); ?></td>
                                            <td><?php echo e('nothing'); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                               </tbody>   
                            </table> <table class="table table-striped mt-3">
                                <tr>
                                   <th>Sr No.</th> 
                                   <th>Vehicle No.</th> 
                                   <th>Customer</th> 
                                   <th>Delay</th> 
                                   <th>Remark</th> 
                                   <th>HOD Remark</th> 
                                </tr>
                                <tr>
                                   <td>1</td> 
                                   <td>GJ18AX0458</td> 
                                   <td>HUL</td> 
                                   <td>04:50</td> 
                                   <td>--</td> 
                                   <td>--</td> 
                                </tr>
                                <tr>
                                    <td>1</td> 
                                    <td>GJ18AX0458</td> 
                                    <td>HUL</td> 
                                    <td>04:50</td> 
                                    <td>--</td> 
                                    <td>--</td> 
                                 </tr>
                                 <tr>
                                    <td>1</td> 
                                    <td>GJ18AX0458</td> 
                                    <td>HUL</td> 
                                    <td>04:50</td> 
                                    <td>--</td> 
                                    <td>--</td> 
                                 </tr>
                                 <tr>
                                    <td>1</td> 
                                    <td>GJ18AX0458</td> 
                                    <td>HUL</td> 
                                    <td>04:50</td> 
                                    <td>--</td> 
                                    <td>--</td> 
                                 </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header bg-white rounded" style="cursor:pointer;" id="headingFour">
                <div class="d-flex justify-content-between">
                    <button type="button" class="accordion-button collapsed fw-700 btn bg-white align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                        <img src="<?php echo e(asset('backend/img/loading.png')); ?>" style="height:28px;">
                        <span class="pl-1">Delay for New Load</span>
                    </button>	
                    <div>
                        <a href="<?php echo e(route('panel.report.index',['active' => 'delay-for-new-load','page' => 1])); ?>" class="btn btn-sm btn-primary">Expand all</a>
                    </div>								
                </div>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse show onload-remove" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-block">
                                <div id="lineChart_area4" class="chart-shadow st-cir-chart lineChart_area_four"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                       <th>Sr No.</th> 
                                       <th>Vehicle No.</th> 
                                       <th>Customer</th> 
                                       <th>Delay</th> 
                                       <th>Remark</th>  
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php for($i = 1; $i < 11; $i++): ?>
                                        <tr>
                                            <td>#<?php echo e($i); ?></td>
                                            <td>8967<?php echo e($i); ?></td>
                                            <td><?php echo e('Anjali'); ?></td>
                                            <td><?php echo e('10 Minutes'); ?></td>
                                            <td><?php echo e('nothing'); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                               </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header bg-white rounded" style="cursor:pointer;" id="headingFive">
                <div class="d-flex justify-content-between">
                    <button type="button" class="accordion-button collapsed fw-700 btn bg-white align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                        <img src="<?php echo e(asset('backend/img/tracking.png')); ?>" style="height:24px;"><span class="pl-1">Route Diversion</span>
                    </button>						
                </div>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse show onload-remove" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-block">
                                <div id="lineChart_area5" class="chart-shadow st-cir-chart _five"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                       <th>Sr No.</th> 
                                       <th>Vehicle No.</th> 
                                       <th>Customer</th> 
                                       <th>Delay</th> 
                                       <th>Remark</th>  
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php for($i = 1; $i < 11; $i++): ?>
                                        <tr>
                                            <td>#<?php echo e($i); ?></td>
                                            <td>8967<?php echo e($i); ?></td>
                                            <td><?php echo e('Anjali'); ?></td>
                                            <td><?php echo e('10 Minutes'); ?></td>
                                            <td><?php echo e('nothing'); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                               </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('backend/plugins/chartist/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/chart-chartist.js')); ?>"></script>

<script>
    
    new Chartist.Line('#lineChart_area1', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [1, 6, 7, 8, 8, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });

    setTimeout(() => {
        $('.onload-remove').removeClass('show');
    }, 200);

    new Chartist.Line('#lineChart_area2', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [9, 5, 2, 5, 0, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });
    
    new Chartist.Line('#lineChart_area3', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [4, 8, 3, 5, 2, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });

    new Chartist.Line('#lineChart_area4', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [2, 4, 7, 8, 5, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });

    new Chartist.Line('#lineChart_area5', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [7, 2, 0, 4, 5, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/dashboard/board/analysis.blade.php ENDPATH**/ ?>