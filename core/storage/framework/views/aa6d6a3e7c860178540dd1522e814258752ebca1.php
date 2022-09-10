<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <a href="<?php echo e(URL::previous()); ?>" type="button" id="" class="nav-link bg-gray mr-1"><i
                        class="ik ik-arrow-left"></i></a>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i
                        class="ik ik-maximize"></i></button>
                <a href="<?php echo e(url('/')); ?>" type="button" id="" class="nav-link bg-gray ml-1"><i
                        class="ik ik-home"></i></a>
            </div>
            <?php if(getSetting('notification')): ?>
                <?php
                    $notifications = App\Models\Notification::whereUserId(auth()->id())
                        ->whereIsReaded(0)
                        ->limit(5)
                        ->get();
                ?>
            <?php endif; ?>
            <div class="top-menu d-flex align-items-center">
                
                <?php if(getSetting('notification')): ?>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span
                                class="badge bg-danger"><?php echo e(fetchGetData('App\Models\Notification', ['user_id', 'is_readed'], [auth()->id(), 0])->count()); ?></span></a>
                        <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                            <h4 class="header"><?php echo e(__('Notifications')); ?></h4>
                            <div class="notifications-wrap">
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('panel.notification.read', $notification->id)); ?>" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-check"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading d-block"><?php echo e($notification->title); ?></span>
                                            <span class="media-content"><?php echo e($notification->notification); ?></span>
                                        </span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="footer"><a
                                    href="<?php echo e(route('panel.constant_management.notification.index')); ?>"><?php echo e(__('See all activity')); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="dropdown">
                    
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="avatar" src="<?php echo e(auth()->user() && auth()->user()->avatar ? auth()->user()->avatar : asset('backend/default/default-avatar.png')); ?>"
                            style="object-fit: cover; width: 35px; height: 35px" alt="">
                        <span class="user-name font-weight-bolder"
                            style="top: -0.8rem;position: relative;margin-left: 8px;"><?php echo e(auth()->user()->name); ?>

                            <span class="text-muted"
                                style="font-size: 10px;position: absolute;top: 16px;left: 3px;"><?php echo e(authRole()); ?></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo e(url('panel/user-profile')); ?>"><i
                                class="ik ik-user dropdown-icon"></i> <?php echo e(__('Profile')); ?></a>
                        
                        <a class="dropdown-item" href="<?php echo e(url('logout')); ?>">
                            <i class="ik ik-power dropdown-icon"></i>
                            <?php echo e(__('Logout')); ?>

                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/header.blade.php ENDPATH**/ ?>