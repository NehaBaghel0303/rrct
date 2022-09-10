<style>
    .table-activity td {
        border-top: 0;
        padding: 0.35rem;
    }
</style>
<div class="card" style="margin-bottom:10px;">
    <div class="card-header d-flex justify-content-between" style="background-color: #1a237e;">
        <h3 class="vehicle-number text-white"><?php echo e($v_id); ?></h3>
        <span class="badge badge-light">Status</span>
    </div>
    <div class="card-body p-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="icon-wrapper">
                    <img src="<?php echo e(asset('backend/img/driver-shape.svg')); ?>" style="height:25px;" alt="">
                </div>
                <div style="line-height: 14px;">
                    <small class="text-muted d-block">
                        <i class="fas fa-steering-wheel"></i> Driver
                    </small>
                    <h6 class="mb-0">
                            Pratyush Nema
                    </h6>
                    <small class="text-muted">+917865341233</small>
               </div>
            </div>
        </div>
        <hr>
       <div class="d-flex">
            <div class="icon-wrapper">
                <img src="<?php echo e(asset('backend/img/vehicle-truck.svg')); ?>" style="height:22px;" alt="">
            </div>
            <div style="line-height: 14px;">
                <div>
                    
                    <small class="text-muted d-block">
                        
                    </small>
                    
                </div>
                <h6 class="mb-0">
                    <?php echo e($payload->vehicle_no); ?>

                </h6>
                <div>
                    <small class="text-muted">
                        eBill VT: 26 Jan 2023 -
                    </small>
                    <small class="text text-success font-weight-bold">Active</small>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="card mb-2">
    <div class="card-header d-flex justify-content-between" style="padding: 10px 10px;">
        <h6 class="mb-0">Trip Details :</h6>
        <div class="font-weight-bold text-primary">
          <?php echo e($payload->vehicle_type); ?>

        </div>
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col-12">
                
                <table class="table">
                        <tr>
                            <td>LR No. </td>
                            
                            <td><?php echo e($payload->lr_details->lrno); ?></td>
                        </tr>
                        <tr>
                            <td>EWB No.</td>
                            <td><?php echo e($payload->lr_details->ewb_no ?? ''); ?></td>
                        </tr>
                        <tr>
                            <td>Invoice No.</td>
                            <td><?php echo e($payload->lr_details->invoice_no); ?></td>
                        </tr>
                        <tr>
                            <td>Shipment No.</td>
                            <td><?php echo e($payload->lr_details->shipment_no); ?></td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-lg-6"style="padding-right:4px;">
        <div class="card" style="background-color:#007bff; margin-bottom:10px;">
            <div class="card-body p-2">
                <p class="text-center mb-0" style="color:#eee;">Avg Speed</p>
                <h5 class="text-center text-white font-weight-bold"> 14 km/h </h5>
            </div>
        </div>
    </div>  
    <div class="col-lg-6"style="padding-left:4px;">
        <div class="card" style="background-color: #f5365c; margin-bottom:10px;">
            <div class="card-body p-2">
                <p class="text-center mb-0"style="color:#eee;">Max Speed</p>
                <h5 class="text-center text-white font-weight-bold"> 109 km/h </h5>
            </div>
        </div>
    </div>  
</div>
<div class="card">
    <div class="card-body d-flex justify-content-between ptb15_20">
       <div class="">
            <img src="<?php echo e(asset('backend/img/fuel.svg')); ?>" alt="fuel" width="33"height="45">
       </div>
       <div>
            <h5 class="text-dark m-0 p-0">24 Liter</h5>
            <span class="text-muted">
                Left
            </span>
       </div>
    </div>
</div>


<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/track/include/vehicle-details.blade.php ENDPATH**/ ?>