
<?php if(getSetting('recaptcha') == 1): ?>
    <?php echo ReCaptcha::htmlScriptTagJsApi(); ?>

<?php endif; ?>

<?php $__env->startSection('meta_data'); ?>
    <?php
		$meta_title = 'Login | '.getSetting('app_name');		
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
    .login-image{
        height: 55px;
        position: absolute;
        transform: translate(-50%);
        left: 26%;
        top: 42%;
    }

    @media(max-width:768px){
        .mobile_view{
            display: none;
        }
    }

        .bg-half-170{
            padding: 145px 0;
            background-size: cover !important;
            -ms-flex-item-align: center;
            align-self: center;
            position: relative;
            background-position: bottom center !important;
            height: 131vh !important;
            border-radius: 50%;
            overflow: hidden;
            width: 100%;
            position: absolute !important;
            width: 150vh;
            transform: translate(50%,-50%);
            right: 0;
            top: 53vh;
        }
</style>
<?php $__env->startSection('content'); ?>
<section class="h-100" style="background: #F1F2F6;overflow: hidden;">
    <div class="row no-gutters">
        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
            <div class="form-signin p-4">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <h5 class="mb-3 text-center">Login</h5>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    <?php endif; ?>
                        <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <?php echo e($error); ?>

                                    <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <div class="form-wrapper mb-2 mt-60">
                        <input type="text" name="email" style="border-radius: 30px;padding: 12px" class="form-control  form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingInput" placeholder="Email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-20">
                        <input type="password" style="border-radius: 30px;padding: 12px" class="form-control bg-white <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingPassword" placeholder="Password" name="password" required>
                        
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        
                        <div class="forgot-pass mt-2">
                            <a href="<?php echo e(url('password/forget')); ?>" class="text-dark small">Forgot password?</a>
                        </div>    
                    </div>
                    <div class="login-btn w-100 mt-60 p-0" style="background: linear-gradient(180deg, rgb(104 137 165) 0%, rgba(9,9,121,1) 50%, rgba(5,18,52,1) 100%);">
                        <button class="w-100 text-white btn" type="submit">Login</button>
                    </div>

                    
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 mobile_view">
            <section class="bg-half-170" style="background: url('frontend/assets/home/home-screen.jpeg');">
                <div class="bg-overlay"></div>

                <div>
                    <img src="<?php echo e(asset('frontend/assets/images/login/login.png')); ?>" class="login-image" alt="">
                </div>
            </section>   
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.assets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/global/login.blade.php ENDPATH**/ ?>