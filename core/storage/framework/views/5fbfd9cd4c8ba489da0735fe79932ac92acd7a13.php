<div class="col-md-12">
    
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                <?php echo e($error); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ik ik-x"></i>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/message.blade.php ENDPATH**/ ?>