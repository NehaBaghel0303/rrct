
<?php $__env->startSection('title', 'General Settings'); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $breadcrumb_arr = [['name' => 'Setting', 'url' => 'javascript:void(0);', 'class' => ''], ['name' => 'General', 'url' => 'javascript:void(0);', 'class' => 'active']];
    ?>
    <style>
        .radio-toolbar-cus {
            margin: 10px;
        }

        .radio-toolbar-cus input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar-cus label {
            display: inline-block;
            background-color: #ddd;
            margin-top: 0;
            padding: 6px 12px;
            font-family: sans-serif, Arial;
            font-size: 14px;
            border: 2px solid rgb(255, 255, 255);
            border-radius: 4px;
        }

        .radio-toolbar-cus label:hover {
            background-color: rgb(194, 192, 192);
        }

        .radio-toolbar-cus input[type="radio"]:focus+label {
            border: 2px #444;
            background: #444;
        }

        .radio-toolbar-cus input[type="radio"]:checked+label {
            background-color: rgb(13, 110, 253);
            color: #ffffff;
            border: #444;
        }

    </style>
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-grid bg-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo e(__('General Setting')); ?></h5>
                            <span><?php echo e(__('This setting will be automatically updated in your website.')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <?php echo $__env->make('backend.include.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo $__env->make('backend.setting.sitemodal',['title'=>"How to use",'content'=>"You need to create a unique code and call the unique code with paragraph content helper."], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mx-auto justify-content-center">
                <div class="card card-484">
                    <div role="tabpanel">
                        <div class="card-header" style="border:none;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#general" class="nav-link active" aria-controls="general" role="tab"
                                        data-toggle="tab">General</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#currency" class="nav-link" aria-controls="currency" role="tab"
                                        data-toggle="tab">Currency</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#datetime" class="nav-link" aria-controls="datetime" role="tab"
                                        data-toggle="tab">Date & Time</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#troubleshoot" class="nav-link" aria-controls="troubleshoot" role="tab"
                                        data-toggle="tab">Troubleshoot</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#plugins" class="nav-link" aria-controls="plugins" role="tab"
                                        data-toggle="tab">Plugins</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#trip-logics" class="nav-link" aria-controls="trip-logics" role="tab"
                                        data-toggle="tab">Trip Logics</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#google-map" class="nav-link" aria-controls="google-map" role="tab"
                                        data-toggle="tab">Google Map API</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body pt-0">
                            <div class="tab-content">

                                <!--tab panel general-->
                                <div role="tabpanel" class="tab-pane fade show active pt-3" id="general"
                                    aria-labelledby="general-tab">

                                    <form class="forms-sample" action="<?php echo e(route('panel.setting.general.store')); ?>"
                                        method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="group_name" value="<?php echo e('general_setting'); ?>">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('App Name')); ?><span class="text-red">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="app_name" class="form-control"
                                                    placeholder="App Name"  required value="<?php echo e(getSetting('app_name')); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Site Motto')); ?><span class="text-red">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="site_motto" class="form-control"
                                                required value="<?php echo e(getSetting('site_motto')); ?>"
                                                    placeholder="Best eCommerce Website">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('App Url')); ?><span class="text-danger">*</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="app_url" class="form-control"
                                                   required value="<?php echo e(getSetting('app_url')); ?>" placeholder="App Url">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Global Meta Title')); ?><span class="text-danger">*</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="global_meta_title" class="form-control"
                                                     required value="<?php echo e(getSetting('global_meta_title')); ?>"
                                                    placeholder="Global Meta Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="logo" class="col-sm-3 col-form-label"><?php echo e(__('App Logo')); ?></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="app_logo" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Upload Logo">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-success"
                                                            type="button"><?php echo e(__('Upload')); ?></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-9">
                                                <div class="card m-0 p-2">
                                                    <div class="mx-auto">
                                                        <img src="<?php echo e(asset('storage/backend/logos/' . getSetting('app_logo'))); ?>"
                                                            alt="App Logo" width="120px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="logo"
                                                class="col-sm-3 col-form-label"><?php echo e(__('White Logo')); ?></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="app_white_logo" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Upload Logo">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-success"
                                                            type="button"><?php echo e(__('Upload')); ?></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="card m-0 p-2">
                                                    <div class="mx-auto">
                                                        <img src="<?php echo e(asset('storage/backend/logos/' . getSetting('app_white_logo'))); ?>"
                                                            alt="App White Logo" width="120px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="logo"
                                                class="col-sm-3 col-form-label"><?php echo e(__('App Favicon')); ?></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="app_favicon" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Upload Favicon">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-success"
                                                            type="button"><?php echo e(__('Upload')); ?></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="card m-0 p-2">
                                                    <div class="mx-auto">
                                                        <img src="<?php echo e(asset('storage/backend/logos/' . getSetting('app_favicon'))); ?>"
                                                            alt="Favicon" width="40px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Maintainance Mode')); ?></label>
                                            <div class="col-sm-9">
                                                <select  name="maintainance_mode" class="form-control" required>
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('ReCaptcha')); ?></label>
                                            <div class="col-sm-9">
                                                <select  name="recaptcha" class="form-control" required>
                                                    <option value="1" <?php echo e(getSetting('recaptcha') == '1' ? 'selected' : ''); ?>>Enable</option>
                                                    <option value="0" <?php echo e(getSetting('recaptcha') == '0' ? 'selected' : ''); ?>>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Voice Input')); ?></label>
                                            <div class="col-sm-9">
                                                <select  name="voice_input" class="form-control" required>
                                                    <option value="1" <?php echo e(getSetting('voice_input') == '1' ? 'selected' : ''); ?>>Enable</option>
                                                    <option value="0" <?php echo e(getSetting('voice_input') == '0' ? 'selected' : ''); ?>>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit"
                                                class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                        </div>
                                    </form>

                                </div>
                                <!--tab panel general-->

                                <!--tab panel currency-->
                                <div role="tabpanel" class="tab-pane fade show pt-3" id="currency"
                                    aria-labelledby="currency-tab">
                                    <form class="forms-sample" action="<?php echo e(route('panel.setting.currency.store')); ?>"
                                        method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="group_name" value="<?php echo e('general_setting_currency'); ?>">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Select Currency')); ?><span class="text-red">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select required name="app_currency" class="form-control" id="currency">
                                                    <?php $__currentLoopData = config('currencies'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($currency['symbol']); ?>"
                                                            <?php echo e($currency['symbol'] == getSetting('app_currency') ? 'selected' : ''); ?>>
                                                            <?php echo e($currency['symbol'] . ' - ' . $currency['name']); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-0">
                                            <label for="thousand_separator"
                                                class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Number Of Decimals')); ?><span class="text-red">*</span>
                                            </label>
                                            <select required name="no_of_decimal" class="form-control" id="">
                                                <option value="0"
                                                    <?php echo e(getSetting('no_of_decimal') == 0 ? ' selected' : ''); ?>>1234
                                                </option>
                                                <option value="1"
                                                    <?php echo e(getSetting('no_of_decimal') == 1 ? ' selected' : ''); ?>>123.4
                                                </option>
                                                <option value="2"
                                                    <?php echo e(getSetting('no_of_decimal') == 2 ? ' selected' : ''); ?>>12.34
                                                </option>
                                                <option value="3"
                                                    <?php echo e(getSetting('no_of_decimal') == 3 ? ' selected' : ''); ?>>1.234
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group d-flex m-0">
                                            <label for="decimal_separator"
                                                class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Decimal separator')); ?></label>
                                            <div class="radio-toolbar-cus col-sm-9 m-0 pl-1 col-form-label">
                                                <input type="radio" id="radiodot" name="decimal_separator" value="1"
                                                    <?php if(getSetting('decimal_separator') == 1): ?> checked <?php endif; ?>>
                                                <label for="radiodot">DOT(.)</label>

                                                <input type="radio" id="radiocomma" name="decimal_separator" value="2"
                                                    <?php if(getSetting('decimal_separator') == 2): ?> checked <?php endif; ?>>
                                                <label for="radiocomma">COMMA(,)</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-0">
                                            <label for="currency_positon"
                                                class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Currency position')); ?></label>
                                            <div class="radio-toolbar-cus col-sm-9 m-0 pl-1 col-form-label">
                                                <input type="radio" id="radioposition1" name="currency_position" value="1"
                                                    <?php if(getSetting('currency_position') == 1): ?> checked <?php endif; ?>>
                                                <label for="radioposition1">$1,100.00</label>
                                                <input type="radio" id="radioposition4" name="currency_position" value="2"
                                                    <?php if(getSetting('currency_position') == 2): ?> checked <?php endif; ?>>
                                                <label for="radioposition4">1,100 $</label>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit"
                                                class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <!--tab panel currency-->

                                <!--tab panel datetime-->
                                <div role="tabpanel" class="tab-pane fade show pt-3" id="datetime" aria-labelledby="datetime-tab">
                                    <form class="forms-sample" action="<?php echo e(route('panel.setting.dnt.store')); ?>"
                                        method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="group_name" value="<?php echo e('general_setting_date_time'); ?>">
                                        <div class="form-group d-flex">
                                            <label for="" class="col-sm-3"><?php echo e(__('Date format')); ?><span class="text-red">*</span>
                                            </label>
                                            <select required name="date_format" class="form-control select2 col-sm-9">
                                                <option value="" readonly><?php echo e(__('Select Date Format')); ?></option>
                                                <?php $__currentLoopData = getDateFormat(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item['id']); ?>"
                                                        <?php echo e(getSetting('date_format') == $item['id'] ? ' selected="selected"' : ''); ?>>
                                                        <?php echo e($item['name']); ?> | <?php echo e($item['ex']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="" class="col-sm-3"><?php echo e(__('Date/Time format')); ?><span class="text-red">*</span>
                                            </label>
                                            <select  required name="date_time_format" class="form-control select2 col-sm-9">
                                                <option value="" readonly><?php echo e(__('Select Date Format')); ?></option>
                                                <?php $__currentLoopData = getDateTimeFormat(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item['id']); ?>"
                                                        <?php echo e(getSetting('date_time_format') == $item['id'] ? ' selected="selected"' : ''); ?>>
                                                        <?php echo e($item['name']); ?> | <?php echo e($item['ex']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group d-flex ">
                                            <label for="" class="col-sm-3"><?php echo e(__('Time Zone')); ?><span class="text-red">*</span>
                                            </label>
                                            <select required name="time_zone" class="form-control select2 col-sm-9">
                                                <?php $__currentLoopData = config('time-zone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($zone['name']); ?>"
                                                        <?php echo e(getSetting('time_zone') == $zone['name'] ? ' selected' : ''); ?>>
                                                        <?php echo e($zone['name']); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <!--tab panel datetime-->
                            
                                <!--tab panel verification-->
                                
                                <!--tab panel verification-->

                                <!--tab panel troubleshoot-->
                                    <div role="tabpanel" class="tab-pane fade show pt-3" id="troubleshoot"
                                    aria-labelledby="troubleshoot-tab">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="card troubleshoot bg-light">
                                                    <h4>Storage Link</h4>
                                                    <p>This will remove old storage and create a new storage link.
                                                    </p>
                                                    <a href="<?php echo e(route('panel.setting.storage_link')); ?>"
                                                        class="btn btn-outline-dark"><?php echo e(__('Storage Link')); ?></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card troubleshoot bg-light">
                                                    <h4>Optimize Clear</h4>
                                                    <p>This will clear your project cache and provides you high performance.</p>
                                                    <a href="<?php echo e(route('panel.setting.optimize_clear')); ?>"
                                                        class="btn btn-outline-dark"><?php echo e(__('Optimize Clear')); ?></a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                <!--tab panel troubleshoot-->

                                <!--tab panel plugins-->
                                    <div role="tabpanel" class="tab-pane fade show pt-3" id="plugins"
                                        aria-labelledby="plugins-tab">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <form action="<?php echo e(route('panel.setting.plugin.store')); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="group_name" value="<?php echo e('custom_plugin'); ?>">
                                                    <div class="form-group">
                                                        <label for="plugin_css">Plugin CSS</label>
                                                        <textarea class="form-control" id="plugin_css" name="plugin_css" rows="3"
                                                            placeholder="Enter Plugin Css"><?php echo e(getSetting('plugin_css') ?? ''); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plugin_script">Java Script</label>
                                                        <textarea class="form-control" id="plugin_script" name="plugin_script"
                                                            rows="3"
                                                            placeholder="Enter Java Script"><?php echo e(getSetting('plug_script') ?? ''); ?></textarea>
                                                    </div>
                                                    <div class=" text-right">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!--tab panel plugins-->

                                <!--tab panel trip-logics-->
                                    <div role="tabpanel" class="tab-pane fade show pt-3" id="trip-logics"
                                        aria-labelledby="trip-logics-tab">
                                        <form action="<?php echo e(route('panel.setting.trip_logics.store')); ?>" method="post"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="group_name" value="<?php echo e('trip_logics'); ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="plugin_css">Delay ETA</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">In Hour</div>
                                                            </div>
                                                            <input type="number" class="form-control" id="" name="delay_eta" placeholder="Delay ETA" value="<?php echo e(getSetting('delay_eta')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="plugin_script">Delay at Loading Point</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">In Hour</div>
                                                            </div>
                                                            <input type="number" class="form-control" id="" name="delay_loading_point" placeholder="Delay at Loading Point" value="<?php echo e(getSetting('delay_loading_point')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="plugin_script">Delay at Unloading Point</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">In Hour</div>
                                                            </div>
                                                            <input type="number" class="form-control" id="" name="delay_unloading_point" placeholder="Delay at Unloading Point" value="<?php echo e(getSetting('delay_unloading_point')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="plugin_script">Delay at En-Route</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">In Hour</div>
                                                            </div>
                                                            <input type="number" class="form-control" id="" name="delay_enroute" placeholder="Delay at En-Route" value="<?php echo e(getSetting('delay_enroute')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="plugin_script">Delay for new Loading</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">In Hour</div>
                                                            </div>
                                                            <input type="number" class="form-control" id="" name="delay_new_loading" placeholder="Delay for new Loading" value="<?php echo e(getSetting('delay_new_loading')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class=" text-right">
                                                <button type="submit"
                                                    class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                <!--tab panel trip-logics-->

                                <!--tab panel cron logics-->
                                    <div role="tabpanel" class="tab-pane fade show pt-3" id="cron-logics"
                                        aria-labelledby="cron-logics-tab">
                                        <form class="forms-sample" action="<?php echo e(route('panel.setting.currency.store')); ?>"
                                            method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="group_name" value="<?php echo e('general_setting_currency'); ?>">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2"
                                                    class="col-sm-3 col-form-label"><?php echo e(__('Select Currency')); ?><span class="text-red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <select required name="app_currency" class="form-control" id="currency">
                                                        <?php $__currentLoopData = config('currencies'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($currency['symbol']); ?>"
                                                                <?php echo e($currency['symbol'] == getSetting('app_currency') ? 'selected' : ''); ?>>
                                                                <?php echo e($currency['symbol'] . ' - ' . $currency['name']); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex m-0">
                                                <label for="thousand_separator"
                                                    class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Number Of Decimals')); ?><span class="text-red">*</span>
                                                </label>
                                                <select required name="no_of_decimal" class="form-control" id="">
                                                    <option value="0"
                                                        <?php echo e(getSetting('no_of_decimal') == 0 ? ' selected' : ''); ?>>1234
                                                    </option>
                                                    <option value="1"
                                                        <?php echo e(getSetting('no_of_decimal') == 1 ? ' selected' : ''); ?>>123.4
                                                    </option>
                                                    <option value="2"
                                                        <?php echo e(getSetting('no_of_decimal') == 2 ? ' selected' : ''); ?>>12.34
                                                    </option>
                                                    <option value="3"
                                                        <?php echo e(getSetting('no_of_decimal') == 3 ? ' selected' : ''); ?>>1.234
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group d-flex m-0">
                                                <label for="decimal_separator"
                                                    class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Decimal separator')); ?></label>
                                                <div class="radio-toolbar-cus col-sm-9 m-0 pl-1 col-form-label">
                                                    <input type="radio" id="radiodot" name="decimal_separator" value="1"
                                                        <?php if(getSetting('decimal_separator') == 1): ?> checked <?php endif; ?>>
                                                    <label for="radiodot">DOT(.)</label>

                                                    <input type="radio" id="radiocomma" name="decimal_separator" value="2"
                                                        <?php if(getSetting('decimal_separator') == 2): ?> checked <?php endif; ?>>
                                                    <label for="radiocomma">COMMA(,)</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex m-0">
                                                <label for="currency_positon"
                                                    class="col-sm-3 pl-0 col-form-label"><?php echo e(__('Currency position')); ?></label>
                                                <div class="radio-toolbar-cus col-sm-9 m-0 pl-1 col-form-label">
                                                    <input type="radio" id="radioposition1" name="currency_position" value="1"
                                                        <?php if(getSetting('currency_position') == 1): ?> checked <?php endif; ?>>
                                                    <label for="radioposition1">$1,100.00</label>
                                                    <input type="radio" id="radioposition4" name="currency_position" value="2"
                                                        <?php if(getSetting('currency_position') == 2): ?> checked <?php endif; ?>>
                                                    <label for="radioposition4">1,100 $</label>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="submit"
                                                    class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                <!--tab panel cron logics-->

                                <!--tab panel google API-->
                                <div role="tabpanel" class="tab-pane fade show pt-3" id="google-map"
                                aria-labelledby="google-map-tab">
                                    <form class="forms-sample" action="<?php echo e(route('panel.setting.google_map.store')); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="group_name" value="<?php echo e('gmap_api_key'); ?>">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label"><?php echo e(__('Google Map API')); ?><span class="text-red">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="gmap_api" value="<?php echo e(getSetting('gmap_api')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit"
                                                class="btn btn-primary mr-2"><?php echo e(__('Update')); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <!--tab panel google API-->
                            </div>
                        <!--tab content-->
                    </div>
                </div>
                <!--tab panel-->
            </div>
        </div>
    </div>
</div>

    <!-- push external js -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/setting/general.blade.php ENDPATH**/ ?>