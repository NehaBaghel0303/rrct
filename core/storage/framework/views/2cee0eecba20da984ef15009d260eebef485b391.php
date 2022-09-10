<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo e(route('panel.dashboard')); ?>">
            <div class="logo-img ">
               <img height="40" src="<?php echo e(getBackendLogo(getSetting('app_white_logo'))); ?>" class="header-brand-img" title="DZE"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"></button>
    </div>
    <?php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
        $segment3 = request()->segment(3);
        $segment4 = request()->segment(4);
    ?>
    
    <div class="sidebar-content">
        <div class="nav-container">
            <div class="px-20px mt-3 mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" style="background-color: #131923;border-color: #131923;" type="text" name="" placeholder="<?php echo e(__('Search')); ?>" id="menu-search" onkeyup="menuSearch()">
            </div>
            <nav id="search-menu-navigation" class="navigation-main">
            </nav>
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item <?php echo e(($segment2 == 'dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('panel.dashboard')); ?>" class="a-item" ><i class="ik ik-bar-chart-2"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                </div>  
                <?php if(auth()->user()->roles[0]->name != 'Super Admin'): ?>
                   <?php echo $__env->make('backend.include.partial.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php echo $__env->make('backend.include.partial.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php echo $__env->make('backend.include.partial.crud_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <?php echo $__env->make('backend.include.partial.manager_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                   <?php echo $__env->make('backend.include.partial.dev_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>
        </div>
    </div>
</div><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/sidebar.blade.php ENDPATH**/ ?>