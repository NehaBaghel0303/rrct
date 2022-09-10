<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $__env->yieldContent('meta_data'); ?>
   <?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
</head>

	<body>
            
            <div class="main-content pl-0 ">
                <!-- yeild contents here -->
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- initiate footer section-->
                <!-- Back to top -->
                <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
       
		
		<!-- initiate scripts-->
		<?php echo $__env->make('frontend.include.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	</body>
</html><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/frontend/layouts/assets.blade.php ENDPATH**/ ?>