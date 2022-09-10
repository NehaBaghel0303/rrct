<div class="card-body">
    <div class="d-flex justify-content-between mb-2">
        <div>
            <label for="">Show
                <select name="length" style="width:60px;height:30px;border: 1px solid #eaeaea;" id="length">
                    <option value="10"
                        <?php echo e($vehicles->perPage() == 10 ? 'selected' : ''); ?>>
                        10</option>
                    <option value="25"
                        <?php echo e($vehicles->perPage() == 25 ? 'selected' : ''); ?>>
                        25</option>
                    <option value="50"
                        <?php echo e($vehicles->perPage() == 50 ? 'selected' : ''); ?>>
                        50</option>
                    <option value="100"
                        <?php echo e($vehicles->perPage() == 100 ? 'selected' : ''); ?>>
                        100</option>
                </select>
                entries
            </label>
        </div>
        <input type="text" name="search" class="form-control" placeholder="Search" id="search"
            value="<?php echo e(request()->get('search')); ?>" style="width:unset;">
    </div>
    <div class="table-responsive">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th class="no-export">Actions</th>
                    <th class="text-center no-export"># <div class="table-div"><i class="ik ik-arrow-up  asc"
                                data-val="id"></i><i class="ik ik ik-arrow-down desc" data-val="id"></i></div>
                    </th>
                    <th class="col_1"> Vehicle<div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="vehicle_no"></i><i
                        class="ik ik ik-arrow-down desc" data-val="vehicle_no"></i></div>
                    </th>
                    <th class="col_4">
                        Status <div class="table-div"><i class="ik ik-arrow-up  asc  " data-val="status"></i><i
                                class="ik ik ik-arrow-down desc" data-val="status"></i></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if($vehicles->count() > 0): ?>
                    <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="no-export">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i
                                            class="ik ik-chevron-right"></i></button>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                        <a href="<?php echo e(route('panel.vehicles.edit', $vehicle->id)); ?>"
                                            title="Edit Vehicle" class="dropdown-item ">
                                            <li class="p-0">Edit</li>
                                        </a>
                                        <a href="<?php echo e(route('panel.vehicles.destroy', $vehicle->id)); ?>"
                                            title="Delete Vehicle" class="dropdown-item  delete-item">
                                            <li class=" p-0">Delete</li>
                                        </a>
                                    </ul>
                                </div>
                            </td>
                            <td class="text-center no-export"> <?php echo e(getVehiclePrefix($vehicle->id)); ?></td>
                            <td class=""> 
                                <div class="d-flex align-items-center">
                                    <?php if($vehicle->image && $vehicle->image != null): ?>
                                        <img height="75px" width="85px" src="<?php echo e(asset('storage/backend/vehicle/'.$vehicle->image)); ?>" alt="vehicle-image">
                                    <?php else: ?>   
                                        <img height="75px" width="85px" src="<?php echo e(asset('backend/img/placeholder.png')); ?>" alt="vehicle-image">
                                    <?php endif; ?>
                                    <span class="pl-2"><a href="<?php echo e(route('panel.track',$vehicle->vehicle_no)); ?>" class="btn btn-link p-0"><?php echo e($vehicle->vehicle_no); ?></a></span>
                                </div>
                            </td>
                            <td class="col_4"><span class="badge badge-<?php echo e(getVehicleCurrentStatus($vehicle->status)['color']); ?> p-2"><?php echo e(getVehicleCurrentStatus($vehicle->status)['name']); ?></span> </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td class="text-center" colspan="8">No Data Found...</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <div class="pagination">
        <?php echo e($vehicles->appends(request()->except('page'))->links()); ?>

    </div>
    <div>
        <?php if($vehicles->lastPage() > 1): ?>
            <label for="">Jump To:
                <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;" id="jumpTo">
                    <?php for($i = 1; $i <= $vehicles->lastPage(); $i++): ?>
                        <option value="<?php echo e($i); ?>"
                            <?php echo e($vehicles->currentPage() == $i ? 'selected' : ''); ?>>
                            <?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </label>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/panel/vehicles/load.blade.php ENDPATH**/ ?>