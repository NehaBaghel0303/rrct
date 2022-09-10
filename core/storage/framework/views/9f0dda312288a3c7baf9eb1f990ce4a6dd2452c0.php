<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_by_super_admin')): ?>
<div class="nav-item <?php echo e(($segment2 == 'filemanager') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('panel.filemanager.index')); ?>" class="a-item" ><i class="ik ik-folder"></i><span><?php echo e('File Manager'); ?></span></a>
</div>
<div class="nav-item <?php echo e(($segment2 == 'qr') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('panel.qr.index')); ?>" class="a-item" ><i class="ik ik-folder"></i><span><?php echo e('QR Code '); ?></span></a>
</div>
<div class="nav-item <?php echo e(($segment2 == 'map') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('panel.map.index')); ?>" class="a-item" ><i class="ik ik-folder"></i><span><?php echo e('Map Location '); ?></span></a>
</div>
<?php endif; ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/partial/user_sidebar.blade.php ENDPATH**/ ?>