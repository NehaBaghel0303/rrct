<div class="row">
    <div class="col-lg-12 pl-1" style="padding-right: 9px;">
        <div class="card card-shadow" style="margin-bottom: 5px;border-left: 3px solid #1a237e; border-radius: 0;">
            <div class="card-body"style="padding:15px;">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <div class="text-muted pl-2">
                            <?php
                                $consignor_id = App\User::where('rr_id',$payload->lr_details->originDetails->consignor_id)->first();
                            ?>
                            <span class="text-dark"><i class="ik ik-map-pin text-warning"></i> Origin - <strong><?php echo e($payload->lr_details->originDetails->from_place); ?></strong><sup class="ml-1"><?php echo e($payload->lr_details->originDetails->from_place_id); ?></sup></span>  
                            <div class="d-flex">
                                <span class="mb-0" style="width: 251px; word-break: break-word;">Consignor : <small><a href="<?php echo e(route('panel.consignor.show',$consignor_id)); ?>"><?php echo e($payload->lr_details->originDetails->consignor); ?></a></small><sup class="ml-1"><?php echo e($payload->lr_details->originDetails->consignor_id); ?></sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-muted">   
                            <span class="text-dark"><i class="ik ik-map-pin text-info"></i> Now - <strong><?php echo e('Seoni'); ?></strong></span>  
                            <br>
                            <span class="text-wrapper mb-0"><small>TATA MOTORS</small></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-muted">  
                            <?php
                                $consignee_id = App\User::where('rr_id',$payload->lr_details->destinationDetails->consignee_id)->first();
                            ?>
                            <span class="text-dark"><i class="ik ik-map-pin text-success"></i> Destination - <strong><?php echo e($payload->lr_details->destinationDetails->to_place); ?></strong><sup class="ml-1"><?php echo e($payload->lr_details->destinationDetails->to_place_id); ?></sup></span>  
                           <div class="d-flex">
                                <span class="mb-0 text-wrapper">Consignee : <small><a href="<?php echo e(route('panel.consignee.show',$consignee_id)); ?>"><?php echo e($payload->lr_details->destinationDetails->consignee); ?></a></small><sup class="ml-1"><?php echo e($payload->lr_details->destinationDetails->consignee_id); ?></sup></span>
                           </div>
                        </div>
                    </div>
                </div> 
                 
            </div>
        </div>
    </div>
</div><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/track/include/vehicle-trip.blade.php ENDPATH**/ ?>