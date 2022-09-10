
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('panel.dashboard')); ?>"><i class="ik ik-home"></i></a>
        </li>
        <?php $__currentLoopData = $breadcrumb_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item != null): ?>
                <li class=" breadcrumb-item <?php echo e($item['class']); ?>"><a href="<?php echo e($item['url']); ?>" class="item"><?php echo e($item['name']); ?></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </ol>
</nav><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/breadcrumb.blade.php ENDPATH**/ ?>