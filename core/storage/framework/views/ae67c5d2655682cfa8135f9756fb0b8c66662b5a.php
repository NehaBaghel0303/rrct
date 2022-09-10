 
<?php $__env->startSection('title', 'Consignor'); ?>
<?php $__env->startSection('content'); ?>
<?php
    $breadcrumb_arr = [
        ['name'=>'Consignor', 'url'=> "javascript:void(0);", 'class' => 'active']
    ];
    ?>
    <?php $__env->startPush('head'); ?>
    <style>
        .nav-link{
            padding: 0.1rem 1rem;
            font-size: 15px;
        }
    </style>
    <?php $__env->stopPush(); ?>

    <div class="container-fluid">
        <div class="page-header card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div>
                                <div class="header-icon bg-blue">
                                    <i class="ik ik-command text-white "></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0"><?php echo e($consignor->name); ?></h5>
                                <span class="text-muted"><?php echo e($consignor->email); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-type="overview" id="pills-overview-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-overview" aria-selected="false"><?php echo e(__('Overview')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-type="lr" id="pills-lorry-receipt-tab" data-toggle="pill" href="#lorry-receipt" role="tab" aria-controls="pills-lorry-receipt" aria-selected="true"><?php echo e(__('Lorry Receipts')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-type="vehicles" id="pills-vehicles-tab" data-toggle="pill" href="#vehicles" role="tab" aria-controls="pills-vehicles" aria-selected="true"><?php echo e(__('Vehicles')); ?></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>EWB No.</th>
                                            <td><?php echo e($payload->lr_details->ewb_no); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Invoice No.</th>
                                            <td><?php echo e($payload->lr_details->invoice_no); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipment No.</th>
                                            <td><?php echo e($payload->lr_details->shipment_no); ?></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lorry-receipt" role="tabpanel" aria-labelledby="pills-lorry-receipt-tab">
                      <div class="table-responsive">
                        <table id="lorryRecieptTable" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th class="text-center">Actions</th>
                                    <th class="">#</th>
                                    <th class="">Lorry Receipt No  </th>
                                    <th class="">Vehicle No.</th>
                                    <th class="">Branch</th>
                                    <th class="">EWB</th>
                                    <th class="">Invoice No.</th>
                                    <th class="">Source</th>
                                    <th class=""> Destination</th>
                                    <th class="">Consignor</th>
                                    <th class="">Consignee</th>
                                    <th class="">Status</th>
                                    <th class="">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $lr_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lr_record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $payloadRec = json_decode($lr_record->payload);
                                ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo e($lr_record->lr_no); ?></td>
                                        <td><?php echo e($payloadRec->vehicle_no); ?></td>
                                        <td><?php echo e($payloadRec->branch); ?></td>
                                        <td><?php echo e($payloadRec->branch); ?></td>
                                        <td><?php echo e($payloadRec->lr_details->ewb_no); ?> </td>
                                        <td><?php echo e($payloadRec->lr_details->invoice_no); ?> </td>
                                        <td><?php echo e($payloadRec->lr_details->originDetails->from_place); ?> </td>
                                        <td><?php echo e($payloadRec->lr_details->destinationDetails->to_place); ?> </td>
                                        <td><?php echo e(NameById($lr_record->consignor_id)); ?> </td>
                                        <td><?php echo e(NameById($lr_record->consignee_id)); ?> </td>
                                        <td><span class="badge badge-<?php echo e(lorryReceiptStatus($lr_record->status)['color']); ?>"><?php echo e(lorryReceiptStatus($lr_record->status)['name']); ?></span> </td>
                                        <td><?php echo e(getFormattedDate($lr_record->created_at)); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="vehicles" role="tabpanel" aria-labelledby="pills-vehicles-tab">
                      <div class="table-responsive">
                        <table class="table table-striped " id="vehiclesTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Actions</th>
                                    <th>#</th>
                                    <th>Vehicle</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i
                                                    class="ik ik-chevron-right"></i></button>
                                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">    
                                                <a href="" title="Edit Lorry Receipt" class="dropdown-item">
                                                    <li class="p-0">Edit</li>
                                                </a>
                                                <a href="" title="Show Lorry Receipt" class="dropdown-item">
                                                    <li class="p-0">Show</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>#VEH<?php echo e($vehicle->id); ?></td>
                                    <td><?php echo e($payload->lr_details->lrno); ?></td>
                                    <td><?php echo e($vehicle->vehicle_no); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="text-center">No Records!</td></tr>    
                            <?php endif; ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <?php $__env->startPush('script'); ?>

    <script>
        $(document).ready(function() {

            var table = $('#lorryRecieptTable').DataTable({
                responsive: true,
                fixedColumns: true,
                fixedHeader: true,
                scrollX: false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-success',
                        header: true,
                        footer: true,
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis',
                    {
                        extend: 'print',
                        className: 'btn-sm btn-primary',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible',
                            stripHtml: false
                        }
                    }
                ]

            });
            var table = $('#vehiclesTable').DataTable({
                responsive: true,
                fixedColumns: true,
                fixedHeader: true,
                scrollX: false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-success',
                        header: true,
                        footer: true,
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis',
                    {
                        extend: 'print',
                        className: 'btn-sm btn-primary',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible',
                            stripHtml: false
                        }
                    }
                ]

            });
        });
    </script>
      
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/consignor/show.blade.php ENDPATH**/ ?>