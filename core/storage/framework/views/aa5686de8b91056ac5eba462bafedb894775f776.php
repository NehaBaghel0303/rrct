<div class="card hide-statistics" style="margin-bottom: 14px;">
    <div class="card-header">
        <h3 class="dashboard-title">Dashboard</h3>
    </div>
    <div class="card-body ">
        <div class="row dashboard-statistics-one">
            <?php $__currentLoopData = $statistics_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div>
                        <span class="text-muted" title="<?php echo e($item_1['title']); ?>"><?php echo e($item_1['name']); ?></span>
                        <h4 class="<?php echo e($item_1['text-color']); ?>"><?php echo e($item_1['count']); ?></h4>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <hr class="p-0 m-1">

        <div class="row mt-3 dashboard-statistics-two">
            <?php $__currentLoopData = $statistics_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-6 <?php if($loop->iteration == 1): ?> pr-lg-0 <?php endif; ?> <?php if($loop->iteration == 2): ?> pl-lg-0 <?php endif; ?>" >
                    <div>
                        <span class="text-muted"><?php echo e($item_2['name']); ?></span>
                        <h4 class="<?php echo e($item_2['text-color']); ?>"><?php echo e($item_2['count']); ?></h4>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/dashboard/include/statistics.blade.php ENDPATH**/ ?>