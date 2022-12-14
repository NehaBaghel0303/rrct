
<?php if(getSetting('recaptcha') == 1): ?>
    <?php echo ReCaptcha::htmlScriptTagJsApi(); ?>

<?php endif; ?>

<?php $__env->startSection('meta_data'); ?>
    <?php
		$meta_title = '404 | '.getSetting('app_name');		
		$meta_description = '' ?? getSetting('seo_meta_description');
		$meta_keywords = '' ?? getSetting('seo_meta_keywords');
		$meta_motto = '' ?? getSetting('site_motto');		
		$meta_abstract = '' ?? getSetting('site_motto');		
		$meta_author_name = '' ?? 'Defenzelite';		
		$meta_author_email = '' ?? 'support@defenzelite.com';		
		$meta_reply_to = '' ?? getSetting('frontend_footer_email');		
		$meta_img = ' ';		
	?>
<?php $__env->stopSection(); ?>
<style>
    .alert {
        padding: 0px 15px !important;
    }
</style>
<?php $__env->startSection('content'); ?>
<section class="bg-home d-flex align-items-center position-relative" style="background: url('assets/images/shape01.png') center;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card form-signin p-4 rounded shadow" style="max-width: fit-content;margin-top:30px;" >
                    <div class="card-body">
                        <h1 style="color: #1969d3; font-weight:500 ; font-family: system-ui; margin-top: -10px;">404</h1>
                        <img src="<?php echo e(asset('frontend/customer/icons/404.png')); ?>"alt="404" width= "100px" class="img-fluid">
                    <h1 style="font-weight: 400; font-family: system-ui;">Ooops! You weren't supposed to see this</h1>
                    <h6> The page you're looking for no longer exists.<br> Return to the home page and remember you haven't seen anything</h6>
                   
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.assets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/global/404.blade.php ENDPATH**/ ?>