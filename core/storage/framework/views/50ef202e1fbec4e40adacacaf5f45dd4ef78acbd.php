<?php if(auth()->user() && session()->has("admin_user_id") && session()->has("temp_user_id")): ?>
    <div class="alert alert-warning logged-in-as mb-4">
        You are currently logged in as <?php echo e(auth()->user()->name); ?>. <a href="<?php echo e(route("panel.auth.logout-as")); ?>">Re-Login as <?php echo e(NameById(session()->get("admin_user_id"))); ?></a>.
    </div><!--alert alert-warning logged-in-as-->
<?php endif; ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/logged-in-as.blade.php ENDPATH**/ ?>