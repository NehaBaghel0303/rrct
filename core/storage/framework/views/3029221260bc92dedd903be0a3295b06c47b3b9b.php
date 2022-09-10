<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_by_admin')): ?>
<div class="nav-item">
    <a href="<?php echo e(route('panel.board.analysis')); ?>" class="a-item" ><i class="ik ik-activity"></i><span><?php echo e(__('Analysis')); ?></span></a>
</div> 
<?php if(getSetting('order_activation') == 1): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_orders')): ?>
    <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.orders.index','panel.orders.show','panel.orders.invoice'], 'active')); ?>">
        <a href="<?php echo e(route('panel.orders.index')); ?>" class="a-item" ><i class="ik ik-shopping-cart"></i><span><?php echo e(__('Orders')); ?></span></a>
    </div>
<?php endif; ?>
<?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_administrator')): ?>
        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.users.index','panel.users.show', 'panel.users.create', 'panel.user_log.index','panel.roles','panel.permission'], 'active open')); ?> has-sub">
            <a href="#"><i class="ik ik-users"></i><span><?php echo e(__('Administrator')); ?></span></a>
            <div class="submenu-content">
                <!-- only those have manage_user permission will get access -->
                
              <?php
                  $roles = Spatie\Permission\Models\Role::whereNotIn('id',[1,3])->pluck('name');
              ?>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(getSetting('user_management_activation') == 1): ?>
                        <a href="<?php echo e(route('panel.users.index')); ?>?role=<?php echo e($role); ?>" class="menu-item a-item <?php if(request()->has('role') && request()->get('role') == $role): ?> active <?php endif; ?>">Manage <?php echo e($role); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_user')): ?>
                <a href="<?php echo e(route('panel.users.create')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.users.create', 'active')); ?>"><?php echo e(__('Add User')); ?></a>
                <?php endif; ?>
                <!-- only those have manage_role permission will get access -->
                <?php if(getSetting('roles_and_permission_activation') == 1): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_role')): ?>
                    <a href="<?php echo e(route('panel.roles')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.roles' ,'active')); ?>"><?php echo e(__('Roles')); ?></a>
                <?php endif; ?>
                <!-- only those have manage_permission permission will get access -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_permission')): ?>
                    <a href="<?php echo e(route('panel.permission')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.permission', 'active')); ?>"><?php echo e(__('Permission')); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.lorry_receipts.index'], 'active open')); ?>">
            <a href="<?php echo e(route('panel.lorry_receipts.index')); ?>" class="a-item"><i class="ik ik-command"></i><span><?php echo e(__('Lorry Receipt')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(($segment2 == 'vehicles') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('panel.vehicles.index')); ?>" class="a-item" ><i class="ik ik-truck"></i><span>Vehicles</span></a>
        </div> 
        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.report.index'], 'active open')); ?>">
            <a href="<?php echo e(route('panel.report.index')); ?>" class="a-item"><i class="ik ik-pie-chart"></i><span><?php echo e(__('Reports')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.geo_fences.index'], 'active open')); ?>">
            <a href="<?php echo e(route('panel.geo_fences.index')); ?>" class="a-item"><i class="ik ik-map-pin"></i><span><?php echo e(__('Geofence')); ?></span></a>
        </div>
        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.help-center'], 'active open')); ?>">
            <a href="<?php echo e(route('panel.help-center')); ?>" class="a-item"><i class="ik ik-help-circle"></i><span><?php echo e(__('Help Center')); ?></span></a>
        </div>
    <?php endif; ?>    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_manage')): ?>
        <?php if(getSetting('payout_activation') == 1): ?>
            <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.payouts.index','panel.payouts.show','panel.orders.invoice','panel.orders.create' ], 'active open')); ?> has-sub">
                <a href="#"><i class="ik ik-layers"></i><span><?php echo e(__('Manage')); ?></span></a>
                <div class="submenu-content">
                    <?php if(getSetting('payout_activation') == 1): ?>
                    <a href="<?php echo e(route('panel.payouts.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['panel.payouts.index', 'panel.payouts.edit'], 'active')); ?>"><?php echo e(__('Payouts')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>    
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_resources')): ?>
    <?php if(getSetting('website_enquiry_activation') == 1 || getSetting('ticket_activation') == 1): ?>
        <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.constant_management.user_enquiry.index', 'panel.constant_management.user_enquiry.create','backend/constant-management.news_letters.index','backend/constant-management.news_letters.create','panel.constant_management.support_ticket.index' , 'panel.constant_management.support_ticket.show','backend/constant-management.news_letters.edit'], 'active open')); ?> has-sub">
                <a href="#"><i class="ik ik-mail"></i><span><?php echo e(__('Contacts / Enquiry')); ?></span></a>
                <div class="submenu-content">
                    <?php if(getSetting('website_enquiry_activation') == 1): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_user_enquiry')): ?>
                        <a href="<?php echo e(route('panel.constant_management.user_enquiry.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['panel.constant_management.user_enquiry.index', 'panel.constant_management.user_enquiry.create','panel.constant_management.user_enquiry.edit'], 'active')); ?>"><?php echo e(__('Website Enquiry')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(getSetting('ticket_activation') == 1): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_support_ticket')): ?>
                        <a href="<?php echo e(route('panel.constant_management.support_ticket.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['panel.constant_management.support_ticket.index', 'panel.constant_management.support_ticket.show'], 'active')); ?>"><?php echo e(__('Support Tickets')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(getSetting('newsletter_activation') == 1): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_newsletter')): ?>
                        <a href="<?php echo e(route('backend/constant-management.news_letters.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['backend/constant-management.news_letters.index', 'backend/constant-management.news_letters.create','backend/constant-management.news_letters.edit'], 'active')); ?>"><?php echo e(__('Newsletter')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
        </div>
    <?php endif; ?>    
    <?php endif; ?>
   
    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mange_constant_management')): ?>
    <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.constant_management.mail_sms_template.index','backend/constant-management.faqs.index','backend/constant-management.faqs.create','backend/constant-management.faqs.edit','panel.constant_management.mail_sms_template.create','panel.constant_management.mail_sms_template.edit','panel.constant_management.mail_sms_template.show', 'panel.constant_management.category_type.index','panel.constant_management.category_type.create','panel.constant_management.category_type.edit','panel.constant_management.category.index','panel.constant_management.category.create','panel.constant_management.category.edit', 'backend.site_content_managements.index','backend.site_content_managements.create','backend.site_content_managements.edit','backend.constant-management.slider_types.index','backend.constant-management.slider_types.create','backend.constant-management.slider_types.edit','backend.constant-management.sliders.index','backend.constant-management.sliders.create','panel.constant_management.article.index','panel.constant_management.article.create','panel.constant_management.article.edit','panel.constant_management.article.show','backend.constant-management.sliders.edit','panel.constant_management.location.country' ], 'active open')); ?> has-sub">
        <a href="#"><i class="ik ik-hard-drive"></i><span><?php echo e(__('Content Management')); ?></span></a>
        <div class="submenu-content">
            <?php if(getSetting('article_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_article')): ?>
                <a href="<?php echo e(route('panel.constant_management.article.index')); ?>" class="menu-item <?php echo e(activeClassIfRoutes(['panel.constant_management.article.index','panel.constant_management.article.create','panel.constant_management.article.edit','panel.constant_management.article.show'], 'active')); ?>"><?php echo e(__('Articles/Blogs')); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_mail_sms')): ?>
                <a href="<?php echo e(route('panel.constant_management.mail_sms_template.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['panel.constant_management.mail_sms_template.index','panel.constant_management.mail_sms_template.create','panel.constant_management.mail_sms_template.edit','panel.constant_management.mail_sms_template.show'], 'active')); ?>"><?php echo e(__('Mail/Text Templates')); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_category')): ?>
                <a href="<?php echo e(route('panel.constant_management.category_type.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['panel.constant_management.category_type.index','panel.constant_management.category_type.create','panel.constant_management.category_type.edit','panel.constant_management.category.index','panel.constant_management.category.create','panel.constant_management.category.edit',], 'active')); ?>"><?php echo e(__('Category Group')); ?></a>
            <?php endif; ?>
            <?php if(getSetting('slider_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_slider')): ?>
                <a href="<?php echo e(route('backend.constant-management.slider_types.index')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoutes(['backend.constant-management.slider_types.index','backend.constant-management.slider_types.create','backend.constant-management.slider_types.edit'], 'active')); ?>" ><span>Slider Group</span></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(getSetting('paragraph_content_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_paragraph_content')): ?>
                <a href="<?php echo e(route('backend.site_content_managements.index')); ?>" class="menu-item <?php echo e(activeClassIfRoutes(['backend.site_content_managements.index','backend.site_content_managements.create','backend.site_content_managements.edit',], 'active')); ?>"><?php echo e(__('Paragraph Content')); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(getSetting('faq_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_faq')): ?>
                <a href="<?php echo e(route('backend/constant-management.faqs.index')); ?>" class="menu-item <?php echo e(activeClassIfRoutes(['backend/constant-management.faqs.index','backend/constant-management.faqs.create','backend/constant-management.faqs.edit',], 'active')); ?>"><?php echo e(__('Manage FAQs')); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(getSetting('location_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_location')): ?>
                <a href="<?php echo e(route('panel.constant_management.location.country')); ?>" class="menu-item <?php echo e(activeClassIfRoutes(['panel.constant_management.location.country','panel.constant_management.location.create','panel.constant_management.location.edit',], 'active')); ?>"><?php echo e(__('Location')); ?></a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>


    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_setup_configuation')): ?>
    <div class="nav-item <?php echo e(activeClassIfRoutes(['panel.setting.general', 'panel.setting.general', 'panel.setting.mail', 'panel.setting.payment','panel.setting.activation'], 'active open')); ?> has-sub">
        <a href="#"><i class="ik ik-settings"></i><span><?php echo e(__('Setup & Configurations')); ?></span></a>
        <div class="submenu-content">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_general_configuration')): ?>
            <a href="<?php echo e(route('panel.setting.general')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.setting.general', 'active')); ?>"><?php echo e(__('General Configuration')); ?></a>
            <?php endif; ?>
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mail_sms_configuration')): ?>
            <a href="<?php echo e(route('panel.setting.mail')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.setting.mail', 'active')); ?>"><?php echo e(__('Mail/SMS Configuration')); ?></a>
            <?php endif; ?>
            <?php if(getSetting('payment_gateway_activation') == 1): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_configuaration')): ?>
            <a href="<?php echo e(route('panel.setting.payment')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.setting.payment', 'active')); ?>"><?php echo e(__('Payment Configuration')); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('features_activation')): ?>
            <a href="<?php echo e(route('panel.setting.activation')); ?>" class="menu-item a-item <?php echo e(activeClassIfRoute('panel.setting.activation', 'active')); ?>"><?php echo e(__('Features Activation')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/partial/admin_sidebar.blade.php ENDPATH**/ ?>