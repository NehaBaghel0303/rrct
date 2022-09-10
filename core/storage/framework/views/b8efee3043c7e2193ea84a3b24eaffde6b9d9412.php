 
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php if(auth()->check()): ?>    
            <?php if(auth()->user()->roles[0]->name == 'Super Admin'): ?>
                <?php echo $__env->make('backend.dashboard.developer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(auth()->user()->roles[0]->name == 'Admin'): ?>
               <?php echo $__env->make('backend.dashboard.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('backend.dashboard.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>  
        <?php endif; ?>
    </div>
	
    
   
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
   


    <script>
        $('#searchVehicle').on('keyup',function(){
            var search_value = $(this).val().toLowerCase();
            $(".vehicle-boxes").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_value) > -1)
            });
        });

        var urlPath = "<?php echo e(url('/')); ?>"+'/map/';
        var trucks = "<?php echo e(route('panel.get.devices.json')); ?>";
        var device_types = [];
        device_types['trucks'] = trucks;
        console.log(trucks);
 
    


        $('.vehicleStatus').on('click',function(){
            var statusId = $(this).val();
            if(statusId != 0){
                $('.vehicle-boxes').hide();
                $('.vehcile-no-'+statusId).show();
            }else{
                $('.vehicle-boxes').show();
            }
        });

        $('#searchVeichleBtn').on('click',function(){
          var formData = $('#vehicleFilterForm').serialize();
          console.log(formData);
          url = "<?php echo e(route('panel.get.vehicle.record')); ?>";
            $.ajax({
                url: url,   
                method: 'get',
                data: formData,
                success: function(data){
                    console.log(data);
                }   
            });
        })
      
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>