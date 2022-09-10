<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="<?php echo e(getSetting('seo_meta_description')); ?>">
<meta name="keywords" content="<?php echo e(getSetting('seo_meta_keywords')); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<link rel="icon" href="<?php echo e(getBackendLogo(getSetting('app_favicon'))); ?>" />

<!-- font awesome library -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<script src="<?php echo e(asset('backend/js/app.js')); ?>"></script>


<!-- themekit admin template asstes -->
<link rel="stylesheet" href="<?php echo e(asset('backend/all.css?v='.rand(0, 99999))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/theme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/fontawesome-free/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/fonts/roboto.css')); ?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/icon-kit/dist/css/iconkit.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/ionicons/dist/css/ionicons.min.css')); ?>">


<!-- Bootstrap CDN -->


<!-- Stack array for including inline css or head elements -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<?php echo $__env->yieldPushContent('head'); ?>

<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/DataTables/datatables.min.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

<link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/summernote/dist/summernote-bs4.css')); ?>">



<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<?php if(getSetting('plugin_css') != 'null' || getSetting('plugin_css') != 0): ?>

<?php echo getSetting('plugin_css'); ?>


<?php endif; ?>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/head.blade.php ENDPATH**/ ?>