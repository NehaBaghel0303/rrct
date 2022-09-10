<div class="card" style="margin-bottom: 11px;position: sticky;top: 0;">
    <div class="card-header d-flex justify-content-between">
        <h3 class="dashboard-title">
            
             Vehicle Number</h3>
        <input type="search" id="searchVehicle" name="search" class="form-control" style="width: 140px;" placeholder="Enter Vehicle Number">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 pr-0">
                <input class="cl-custom-radio vehicleStatus" id="marking_01" name="my-radio" value="0" type="radio" checked />
                <label class="cl-custom-radio-label" for="marking_01" title="Click for select/unselect">All (300)</label>
            </div>
            <?php $__currentLoopData = getVehicleStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-6 p-1" >
                    <div class="form-radio custom-radio">
                        <div class="radio radio-outline radio-inline">
                            <label style="cursor: pointer;">
                                <input type="radio" id="<?php echo e($status['id']); ?>" class="custom vehicleStatus" name="radio" value="<?php echo e($status['id']); ?>">
                                <i class="helper"  style="--radio-color: <?php echo e($status['color']); ?> !important"></i> 
                                <span class="text-muted <?php echo e($status['id']); ?>"><?php echo e($status['name']); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row mt-3" style="overflow-y:scroll;height: 135px;">
            <?php
                $device_logs = \App\Models\DeviceLog::get();
                $vehicle_number = [];
                foreach ($device_logs as $key => $device_log) {
                    $vehicle_number[$key]['id'] = $device_log->id;
                    $vehicle_number[$key]['number'] = $device_log->vehicle_no;
                    $vehicle_number[$key]['status'] = 3;
                    $vehicle_number[$key]['box-wrapper'] = 'green';
                }
                
            ?>
            <?php $__currentLoopData = $vehicle_number; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-6 mb-2 px-1 vehicle-boxes vehcile-no-<?php echo e($vehicle['status']); ?>">
                   <a href="<?php echo e(route('panel.track',$vehicle['number'])); ?>" class="vehicle-number" data-active="<?php echo e($vehicle['id']); ?>">
                    <div class="p-2 wrapper-<?php echo e($vehicle['box-wrapper']); ?>" data-status=<?php echo e($vehicle['status']); ?>>
                        <div class="text-center"><?php echo e($vehicle['number']); ?></div>
                    </div>
                   </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/dashboard/include/vehicle-number.blade.php ENDPATH**/ ?>