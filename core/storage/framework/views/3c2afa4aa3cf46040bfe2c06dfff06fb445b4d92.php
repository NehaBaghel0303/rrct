<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manager_manage_permission')): ?>
<div class="nav-item <?php echo e(activeClassIfRoutes(['panel.report.index'], 'active open')); ?>">
    <a href="<?php echo e(route('panel.report.index')); ?>" class="a-item"><i class="ik ik-pie-chart"></i><span><?php echo e(__('Reports')); ?></span></a>
</div>
<?php endif; ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/partial/manager_sidebar.blade.php ENDPATH**/ ?>