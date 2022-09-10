<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_dev')): ?>

        <div class="nav-item <?php echo e(($segment2 == 'users' || $segment2 == 'roles'||$segment2 == 'permission' ||$segment2 == 'user') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-user"></i><span><?php echo e(__('Adminstrator')); ?></span></a>
            <div class="submenu-content">
                <!-- only those have manage_user permission will get access -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_user')): ?>
                <a href="<?php echo e(url('panel/users')); ?>" class="menu-item a-item <?php echo e(($segment2 == 'users') ? 'active' : ''); ?>"><?php echo e(__('Users')); ?></a>
                <a href="<?php echo e(url('panel/user/create')); ?>" class="menu-item a-item <?php echo e(($segment2 == 'user' && $segment2 == 'create') ? 'active' : ''); ?>"><?php echo e(__('Add User')); ?></a>
                <?php endif; ?>
                <!-- only those have manage_role permission will get access -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_role')): ?>
                <a href="<?php echo e(url('panel/roles')); ?>" class="menu-item a-item <?php echo e(($segment2 == 'roles') ? 'active' : ''); ?>"><?php echo e(__('Roles')); ?></a>
                <?php endif; ?>
                <!-- only those have manage_permission permission will get access -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_permission')): ?>
                <a href="<?php echo e(url('panel/permission')); ?>" class="menu-item a-item <?php echo e(($segment2 == 'permission') ? 'active' : ''); ?>"><?php echo e(__('Permission')); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="nav-lavel"><?php echo e(__('Crud Genrator')); ?> </div>
        <div class="nav-item <?php echo e(($segment2 == 'crudgen') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('crudgen.index')); ?>"><i class="ik ik-grid"></i><span><?php echo e(__('CRUD Genrator')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'crudgen') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('crudgen.bulkimport')); ?>"><i class="ik ik-upload"></i><span><?php echo e(__('Bulk Import')); ?></span></a>
        </div>
        <div class="nav-lavel"><?php echo e(__('Documentation')); ?> </div>

        <div class="nav-item <?php echo e(($segment2 == 'icons') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('dev/icons')); ?>"><i class="ik ik-command"></i><span><?php echo e(__('Icons')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'rest-api') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('dev/rest-api')); ?>"><i class="ik ik-cloud"></i><span><?php echo e(__('REST API')); ?></span> <span class=" badge badge-success badge-right"><?php echo e(__('New')); ?></span></a>
        </div>

        <div class="nav-item <?php echo e(($segment2 == 'form-components' || $segment2 == 'form-advance'||$segment2 == 'form-addon') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-edit"></i><span><?php echo e(__('Forms')); ?></span></a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/form-components')); ?>" class="menu-item <?php echo e(($segment2 == 'form-components') ? 'active' : ''); ?>"><?php echo e(__('Components')); ?></a>
                <a href="<?php echo e(url('dev/form-addon')); ?>" class="menu-item <?php echo e(($segment2 == 'form-addon') ? 'active' : ''); ?>"><?php echo e(__('Add-On')); ?></a>
                <a href="<?php echo e(url('dev/form-advance')); ?>" class="menu-item <?php echo e(($segment2 == 'form-advance') ? 'active' : ''); ?>"><?php echo e(__('Advance')); ?></a>
            </div>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'form-picker') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('dev/form-picker')); ?>"><i class="ik ik-cloud"></i><span><?php echo e(_('Form Picker')); ?></span> </a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'client-datatable' || $segment2 == 'server-datatable') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-edit"></i><span><?php echo e(__('Datatable')); ?></span></a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/client-datatable')); ?>" class="menu-item <?php echo e(($segment2 == 'client-datatable') ? 'active' : ''); ?>"><?php echo e(__('Client Side')); ?></a>
                <a href="<?php echo e(url('dev/server-datatable')); ?>" class="menu-item <?php echo e(($segment2 == 'server-datatable') ? 'active' : ''); ?>"><?php echo e(__('Server Side')); ?></a>
            </div>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'widgets' || $segment2 == 'widget-statistic'||$segment2 == 'widget-data'||$segment2 == 'widget-chart') ? 'active open' : ''); ?> has-sub">
            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span><?php echo e(__('Widgets')); ?></span> <span class="badge badge-danger"><?php echo e(__('150+')); ?></span></a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/widgets')); ?>" class="menu-item <?php echo e(($segment2 == 'widgets') ? 'active' : ''); ?>"><?php echo e(__('Basic')); ?></a>
                <a href="<?php echo e(url('dev/widget-statistic')); ?>" class="menu-item <?php echo e(($segment2 == 'widget-statistic') ? 'active' : ''); ?>"><?php echo e(__('Statistic')); ?></a>
                <a href="<?php echo e(url('dev/widget-data')); ?>" class="menu-item <?php echo e(($segment2 == 'widget-data') ? 'active' : ''); ?>"><?php echo e(__('Data')); ?></a>
                <a href="<?php echo e(url('dev/widget-chart')); ?>" class="menu-item <?php echo e(($segment2 == 'widget-chart') ? 'active' : ''); ?>"><?php echo e(__('Chart Widget')); ?></a>
            </div>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'alerts' || $segment2 == 'buttons'||$segment2 == 'badges'||$segment2 == 'navigation' ||$segment2 =='accordion-collapse') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-box"></i><span><?php echo e(__('Basic')); ?></span></a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/alerts')); ?>" class="menu-item <?php echo e(($segment2 == 'alerts') ? 'active' : ''); ?>"><?php echo e(__('Alerts')); ?></a>
                <a href="<?php echo e(url('dev/badges')); ?>" class="menu-item <?php echo e(($segment2 == 'badges') ? 'active' : ''); ?>"><?php echo e(__('Badges')); ?></a>
                <a href="<?php echo e(url('dev/buttons')); ?>" class="menu-item <?php echo e(($segment2 == 'buttons') ? 'active' : ''); ?>"><?php echo e(__('Buttons')); ?></a>
                <a href="<?php echo e(url('dev/navigation')); ?>" class="menu-item <?php echo e(($segment2 == 'navigation') ? 'active' : ''); ?>"><?php echo e(__('Navigation')); ?></a>
                <a href="<?php echo e(url('dev/accordion-collapse')); ?>" class="menu-item <?php echo e(($segment2 == 'accordion-collapse') ? 'active' : ''); ?>"><?php echo e(__('Accordion-Collapse')); ?></a>
            </div>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'modals' || $segment2 == 'notifications'||$segment2 == 'carousel'||$segment2 == 'range-slider' ||$segment2 == 'rating') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-gitlab"></i><span><?php echo e(__('Advance')); ?></span> </a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/modals')); ?>" class="menu-item <?php echo e(($segment2 == 'modals') ? 'active' : ''); ?>"><?php echo e(__('Modals')); ?></a>
                <a href="<?php echo e(url('dev/notifications')); ?>" class="menu-item <?php echo e(($segment2 == 'notifications') ? 'active' : ''); ?>" ><?php echo e(__('Notifications')); ?></a>
                <a href="<?php echo e(url('dev/carousel')); ?>" class="menu-item <?php echo e(($segment2 == 'carousel') ? 'active' : ''); ?>"><?php echo e(__('Slider')); ?></a>
                <a href="<?php echo e(url('dev/range-slider')); ?>" class="menu-item <?php echo e(($segment2 == 'range-slider') ? 'active' : ''); ?>"><?php echo e(__('Range Slider')); ?></a>
                <a href="<?php echo e(url('dev/rating')); ?>" class="menu-item <?php echo e(($segment2 == 'rating') ? 'active' : ''); ?>"><?php echo e(__('Rating')); ?></a>
            </div>
        </div>


        <div class="nav-item <?php echo e(($segment2 == 'charts-chartist' || $segment2 == 'charts-flot'||$segment2 == 'charts-knob'||$segment2 == 'charts-amcharts') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-pie-chart"></i><span><?php echo e(__('Charts')); ?></span> </a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/charts-chartist')); ?>" class="menu-item <?php echo e(($segment2 == 'charts-chartist') ? 'active' : ''); ?>"><?php echo e(__('Chartist')); ?></a>
                <a href="<?php echo e(url('dev/charts-flot')); ?>" class="menu-item <?php echo e(($segment2 == 'charts-flot') ? 'active' : ''); ?>"><?php echo e(__('Flot')); ?></a>
                <a href="<?php echo e(url('dev/charts-knob')); ?>" class="menu-item <?php echo e(($segment2 == 'charts-knob') ? 'active' : ''); ?>"><?php echo e(__('Knob')); ?></a>
                <a href="<?php echo e(url('dev/charts-amcharts')); ?>" class="menu-item <?php echo e(($segment2 == 'charts-amcharts') ? 'active' : ''); ?>"><?php echo e(__('Amcharts')); ?></a>
            </div>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'pricing') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('dev/pricing')); ?>"><i class="ik ik-dollar-sign"></i><span><?php echo e(__('Pricing')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'calendar') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('dev/calendar')); ?>"><i class="ik ik-dollar-sign"></i><span><?php echo e(__('Calendar')); ?></span><span class=" badge badge-success badge-right"><?php echo e(__('New')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'file-manager' || $segment2 == 'pdf-viewer'|| $segment2 == 'image-cropper') ? 'active open' : ''); ?> has-sub">
            <a href="#"><i class="ik ik-pie-chart"></i><span><?php echo e(__('Dev Tools')); ?></span> </a>
            <div class="submenu-content">
                <a href="<?php echo e(url('dev/file-manager')); ?>" class="menu-item <?php echo e(($segment2 == 'file-manager') ? 'active' : ''); ?>"><?php echo e(__('File Manager')); ?></a>
                <a href="<?php echo e(url('dev/pdf-viewer')); ?>" class="menu-item <?php echo e(($segment2 == 'pdf-viewer') ? 'active' : ''); ?>"><?php echo e(__('Pdf Viewer')); ?></a>
                <a href="<?php echo e(url('dev/image-cropper')); ?>" class="menu-item <?php echo e(($segment2 == 'image-cropper') ? 'active' : ''); ?>"><?php echo e(__('Image Cropper')); ?></a>
                <a href="<?php echo e(url('dev/drag-cropper')); ?>" class="menu-item <?php echo e(($segment2 == 'drag-cropper') ? 'active' : ''); ?>"><?php echo e(__('Image Drag & Cropper')); ?></a>
                <a href="<?php echo e(url('dev/notes')); ?>" class="menu-item <?php echo e(($segment2 == 'notes') ? 'active' : ''); ?>"><?php echo e(__('Notes')); ?></a>
            </div>
        </div>
        <div class="nav-item has-sub">
            <a href="javascript:void(0)"><i class="ik ik-list"></i><span><?php echo e(__('Menu Levels')); ?></span></a>
            <div class="submenu-content">
                <a href="javascript:void(0)" class="menu-item"><?php echo e(__('Menu Level 2.1')); ?></a>
                <div class="nav-item <?php echo e(($segment2 == '') ? 'active' : ''); ?> has-sub">
                    <a href="javascript:void(0)" class="menu-item"><?php echo e(__('Menu Level 2.2')); ?></a>
                    <div class="submenu-content">
                        <a href="javascript:void(0)" class="menu-item"><?php echo e(__('Menu Level 3.1')); ?></a>
                    </div>
                </div> 
                <a href="javascript:void(0)" class="menu-item"><?php echo e(__('Menu Level 2.3')); ?></a>
            </div>
        </div>
        <div class="nav-item">
            <a href="javascript:void(0)" class="disabled"><i class="ik ik-slash"></i><span><?php echo e(__('Disabled Menu')); ?></span></a>
        </div>


<?php endif; ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/partial/dev_sidebar.blade.php ENDPATH**/ ?>