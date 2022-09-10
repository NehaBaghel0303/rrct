
	<title> <?php echo e($meta_title ?? getSetting('seo_meta_title')); ?> </title>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta name="description" content="<?php echo e($meta_description ?? getSetting('seo_meta_description')); ?>">
    <meta name="keywords" content="<?php echo e($meta_keywords); ?>">
    <meta name='subject' content='<?php echo e($meta_motto); ?>'>
    <meta name='copyright' content='<?php echo e(env('APP_NAME')); ?>'>
    <meta name='language' content='IN'>
    <meta name='robots' content='index,follow'>
    <meta name='abstract' content='<?php if(isset($meta_abstract)): ?><?php echo e($meta_abstract); ?><?php endif; ?>'>
    <meta name='topic' content='Business'>
    <meta name='summary' content='<?php echo e($meta_motto); ?>'>
    <meta name='Classification' content='Business'>
    <meta name='author' content='<?php if(isset($meta_author_name)): ?><?php echo e($meta_author_email); ?><?php endif; ?>'>
    <meta name='designer' content='Defenzelite'>
    <meta name='reply-to' content='<?php if(isset($meta_author_name)): ?><?php echo e($meta_author_name); ?><?php endif; ?>'>
    <meta name='owner' content='<?php if(isset($meta_reply_to)): ?><?php echo e($meta_reply_to); ?><?php endif; ?>'>
    <meta name='url' content='<?php echo e(url()->current()); ?>'>

    <meta name="og:title" content="<?php echo e($meta_title); ?>"/>
    <meta name="og:type" content="<?php echo e($meta_motto); ?>"/>
    <meta name="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta name="og:image" content="<?php if(isset($meta_img)): ?><?php echo e($meta_img); ?><?php endif; ?>"/>
    <meta name="og:site_name" content="<?php echo e(env('APP_NAME')); ?>"/>
    <meta name="og:description" content="<?php echo e($meta_description ?? getSetting('seo_meta_description')); ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" href="<?php echo e(getBackendLogo(getSetting('app_favicon'))); ?>" />
    <!-- Css -->
     <!-- Style Css-->
     <link href="<?php echo e(asset('frontend/assets/css/style.min.css')); ?>" class="theme-opt" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('frontend/assets/libs/tiny-slider/tiny-slider.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('frontend/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('frontend/assets/libs/@iconscout/unicons/css/line.css')); ?>" type="text/css" rel="stylesheet" />
   

    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/ct-ultimate-gdpr.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">   
    <?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/frontend/include/head.blade.php ENDPATH**/ ?>