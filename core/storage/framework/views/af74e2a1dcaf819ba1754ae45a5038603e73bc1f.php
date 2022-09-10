 
<?php $__env->startSection('title', 'Lorry Receipts'); ?>
<?php $__env->startSection('content'); ?>
<?php
    $breadcrumb_arr = [
        ['name'=>'Lorry Receipts', 'url'=> "javascript:void(0);", 'class' => 'active']
    ]
    ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
    <?php $__env->stopPush(); ?>

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-grid bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lorry Receipts</h5>
                            <span>List of Lorry Receipts</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php echo $__env->make("backend.include.breadcrumb", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <form action="<?php echo e(route('panel.lorry_receipts.index')); ?>" method="GET" id="TableForm">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Lorry Receipts</h3>
                              
                            <div class="d-flex justicy-content-right">
                                <div class="form-group mb-0 mr-2">
                                    <span>From</span>
                                    <label for=""><input type="date" name="from" class="form-control" value="<?php echo e(request()->get('from')); ?>"></label>
                                </div>
                                <div class="form-group mb-0 mr-2"> 
                                    <span>To</span>
                                        <label for=""><input type="date" name="to" class="form-control" value="<?php echo e(request()->get('to')); ?>"></label> 
                                </div>
                                <button type="submit" class="btn btn-icon btn-sm mr-2 btn-outline-warning" title="Filter"><i class="fa fa-filter" aria-hidden="true"></i></button>
                                <a href="javascript:void(0);" id="reset" data-url="<?php echo e(route('panel.lorry_receipts.index')); ?>" class="btn btn-icon btn-sm btn-outline-danger mr-2" title="Reset"><i class="fa fa-redo" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div id="ajax-container">
                            <?php echo $__env->make('panel.lorry_receipts.load', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <form>
    </div>
    <!-- push external js -->
    <?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('backend/js/index-page.js')); ?>"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        <script>
           
           function html_table_to_excel(type)
        {
            var table_core = $(document).find("#table").clone();
            var clonedTable = $(document).find("#table").clone();
            clonedTable.find('[class*="no-export"]').remove();
            clonedTable.find('[class*="d-none"]').remove();
            $(document).find("#table").html(clonedTable.html());
            var data = document.getElementById('table');

            var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
            XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
            XLSX.writeFile(file, 'reportFile.' + type);
            $(document).find("#table").html(table_core.html());
            
        }

        $(document).on('click','#export_button',function(){
            html_table_to_excel('xlsx');
        })

        $(document).on('click','.confirm-btn',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var msg = $(this).data('msg') ?? "You won't be able to revert back!";
            $.confirm({
                draggable: true,
                title: 'Are You Sure!',
                content: msg,
                type: '',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Confirm',
                        btnClass: 'btn-info',
                        action: function(){
                                window.location.href = url;
                        }
                    },
                    close: function () {
                    }
                }
            });
        });

       
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/panel/lorry_receipts/index.blade.php ENDPATH**/ ?>