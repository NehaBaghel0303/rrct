<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" >
<head>
	<title><?php echo $__env->yieldContent('title',''); ?> | <?php echo e(getSetting('app_name')); ?></title>
	<!-- initiate head with meta tags, css and script -->
	<?php echo $__env->make('backend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg"></script>
	<script src="<?php echo e(asset('backend/js/v3_epoly.js')); ?>"></script>
	<!-- initiate scripts-->
	<?php echo $__env->make('backend.include.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
</head>
<body id="app" class="sidebar-mini">
	<div class="wrapper">
		<?php if(!request()->routeIs('panel.setting.maintanance') == true): ?>
			<?php echo $__env->make('backend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="page-wrap">
				<!-- initiate sidebar-->
				<?php echo $__env->make('backend.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<div class="main-content">
					<?php echo $__env->make('backend.include.logged-in-as', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!-- yeild contents here -->
					<?php echo $__env->yieldContent('content'); ?>
				</div>


				<!-- initiate footer section-->
				<?php echo $__env->make('backend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			</div>
		<?php endif; ?>
    </div>
    
	<!-- initiate modal menu section-->
	<?php echo $__env->make('backend.include.modalmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/layouts/track.blade.php ENDPATH**/ ?>