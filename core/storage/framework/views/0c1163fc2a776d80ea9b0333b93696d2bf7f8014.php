<div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex">
                <button type="button" id="export_button" class="btn btn-success btn-sm">Excel</button>
                <div style="position: relative;">
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Column Visibility</button>
                    <ul class="dropdown-menu multi-level"role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-item p-0 col-btn" data-val="col_1"><a href="javascript:void(0);"  class="btn btn-sm">Name</a></li>
                        <li class="dropdown-item p-0 col-btn" data-val="col_2"><a href="javascript:void(0);"  class="btn btn-sm">Location</a></li>
                    </ul>
                </div>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" id="search" value="<?php echo e(request()->get('search')); ?>" style="width:unset;">
        </div>
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th class="no-export">Actions</th> 
                        <th  class="text-center no-export"># <div class="table-div"><i class="ik ik-arrow-up  asc" data-val="id"></i><i class="ik ik ik-arrow-down desc" data-val="id"></i></div></th>             
                        <th class="col_1">Name</th>
                        <th class="col_2">Location</th>
                        <th class="col_2">Type</th>
                        <th class="col_3">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($geo_fences->count() > 0): ?>
                        <?php $__currentLoopData = $geo_fences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $geo_fence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="no-export">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i class="ik ik-chevron-right"></i></button>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <a href="<?php echo e(route('panel.geo_fences.edit', $geo_fence->id)); ?>" title="Edit Geo Fence" class="dropdown-item "><li class="p-0">Rename</li></a>
                                            <a href="<?php echo e(route('panel.geo_fences.destroy', $geo_fence->id)); ?>" title="Delete Geo Fence" class="dropdown-item  delete-item"><li class=" p-0">Delete</li></a>
                                        </ul>
                                    </div> 
                                </td>
                                <td  class="text-center no-export">#GEO<?php echo e($loop->iteration); ?></td>
                                <td class="col_1"><?php echo e($geo_fence->name); ?></td>
                                <td class="col_2"><?php echo e($geo_fence->location); ?></td>
                                <td class="col_2"><?php echo e($geo_fence->type == 1 ? 'Polygon' : ''); ?></td>
                                <td class="col_2"><?php echo e(getFormattedDate($geo_fence->created_at)); ?></td>
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
            <?php echo e($geo_fences->appends(request()->except('page'))->links()); ?>

        </div>
        <div>
           <?php if($geo_fences->lastPage() > 1): ?>
                <label for="">Jump To: 
                    <select name="page" style="width:60px;height:30px;border: 1px solid #eaeaea;"  id="jumpTo">
                        <?php for($i = 1; $i <= $geo_fences->lastPage(); $i++): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($geo_fences->currentPage() == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                </label>
           <?php endif; ?>
        </div>
    </div>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/panel/geo_fences/load.blade.php ENDPATH**/ ?>