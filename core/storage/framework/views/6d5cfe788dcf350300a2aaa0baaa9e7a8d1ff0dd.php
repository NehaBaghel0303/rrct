<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $__env->yieldContent('meta_data'); ?>
   <?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
</head>

	<body style="background: aliceblue !important">
		<div>
				<div class="main-content pl-0 ">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
		</div>
		
		<!-- initiate scripts-->
		<?php echo $__env->make('frontend.include.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
		<?php echo $__env->yieldPushContent('script'); ?>
	</body>
</html><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/frontend/layouts/main.blade.php ENDPATH**/ ?>