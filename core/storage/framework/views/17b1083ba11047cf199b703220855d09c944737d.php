    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between ptb15_20">
            <div class="">
                <img src="<?php echo e(asset('backend/img/branch.png')); ?>" alt="fuel" width="100%" height="45">
            </div>
            <div>
                <h5 class="text-dark mb-0"><?php echo e($payload->branch); ?></h5>
                <span class="text-muted">
                    Branch 
                </span>
            </div>
        </div>

    </div>

    <div class="card mb-2">
        <div class="card-header" style="padding: 10px 10px;">
            <i class="ik ik-"></i>  <h6 class="mb-0">Remarks</h6>
        </div>
        <div class="card-body remark-card p-2 <?php if($remarks->count() <= 0): ?> d-flex justify-content-center align-items-center <?php endif; ?>">
            <?php $__empty_1 = true; $__currentLoopData = $remarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $user = App\User::whereId($remark->user_id)->first() ?? '';
            ?>
                <div class="card mb-2 p-2 shadow-none" style="background: #fffbce54;">
                    <div class="d-flex">
                        <img src="<?php echo e(($user && $user->avatar) ?asset($user->avatar) : asset('backend/default/default-avatar.png')); ?>" class="remark-avatar"  alt="">
                        <div class="ml-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0"><?php echo e(NameById($remark->user_id)); ?></h6> 
                                <div class="badge badge-primary ml-2 badge-sm" style="font-size:10px;background:#1a237e;"><?php echo e($remark->type); ?></div>
                            </div>
                            <span class="text-muted"><?php echo e($remark->remarks ?? ''); ?></span>
                            <div class="text-muted">
                                <small><i class="fa fa-clock mr-1"></i><?php echo e(\Carbon\Carbon::parse($remark->created_at)->diffForHumans()); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center">
                        <img src="<?php echo e(asset('backend/img/empty-box.png')); ?>" alt="Empty Image" height="100px">
                        <p class="text-muted">No Remarks!</p>
                    </div>   
            <?php endif; ?>
        </div>
    </div>

    <div class="card mb-2" style="margin-bottom:10px;">
        <div class="card-header">
            <h6 class="mb-0">Trip Insights</h6>
        </div>
        
        <div class="card-body p-3">
            <div id="sidebarMap">
            
                <div id="total"></div>
                <div id="directions-panel"></div>
            </div>
        </div>
    </div> 

    <div class="card mb-2" style="margin-bottom:10px;">
        <div class="card-header">
            <h6 class="mb-0">Today Activity</h6>
        </div>
        <div class="card-body p-3">
            <div class="d-flex justify-content-between">
                <i class="ik ik-flag text-muted" style="font-size: 20px;"></i>
                <h6 class="m-0 text-muted"> 25.26 km </h6>
                <i class="ik ik-truck text-muted"style="font-size: 20px;"></i>
            </div>
            <hr class="text-muted" style="border-top: dotted 3px; margin-top:0px;" />
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <table class="table table-activity">
                        <tr>
                            <td>Running</td>
                            <td class="text-green text-right font-weight-bold ">01:34 hrs</td>
                        </tr>
                        <tr>
                            <td>Stop</td>
                            <td class="text-red text-right font-weight-bold">01:34 hrs</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-activity">
                        <tr>
                            <td>Inactive</td>
                            <td class="text-blue text-right font-weight-bold">01:34 hrs</td>
                        </tr>
                        <tr>
                            <td>Idle</td>
                            <td class="text-yellow text-right font-weight-bold">01:34 hrs</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div> 

<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/track/include/trip-details.blade.php ENDPATH**/ ?>