<?php
use App\Http\Controllers\CrudGenrator\CrudGenController;

Route::group(['middleware' => 'can:manage_dev','prefix' => 'dev/crudgen', 'as' => 'crudgen.'], function () {

    Route::get('/', [CrudGenController::class,'index'])->name('index');
    Route::get('/bulkimport', [CrudGenController::class,'bulkImport'])->name('bulkimport');
    Route::Post('/bulkimport/generate', [CrudGenController::class,'bulkImportGenerate'])->name('bulkimport.generate');
    Route::post('/generate', [CrudGenController::class,'generate'])->name('generate');
    Route::get('/getcol', [CrudGenController::class,'getColumns'])->name('getcol');
});

Route::group(['namespace' => 'Admin\ConstantManagement', 'prefix' => 'backend/slider-types','as' =>'backend.constant-management.slider_types.'], function () {
    Route::get('index', ['uses' => 'SliderTypeController@index', 'as' => 'index']);
    Route::get('create', ['uses' => 'SliderTypeController@create', 'as' => 'create']);
    Route::post('store', ['uses' => 'SliderTypeController@store', 'as' => 'store']);
    Route::get('edit/{slider_type}', ['uses' => 'SliderTypeController@edit', 'as' => 'edit']);
    Route::post('update/{slider_type}', ['uses' => 'SliderTypeController@update', 'as' => 'update']);
    Route::get('delete/{slider_type}', ['uses' => 'SliderTypeController@destroy', 'as' => 'destroy']);
}); 

Route::group(['namespace' => 'Backend\ConstantManagement', 'prefix' => 'backend/constant-management/sliders','as' =>'backend.constant-management.sliders.'], function () {
    Route::get('index', ['uses' => 'SliderController@index', 'as' => 'index']);
    Route::get('create', ['uses' => 'SliderController@create', 'as' => 'create']);
    Route::post('store', ['uses' => 'SliderController@store', 'as' => 'store']);
    Route::get('edit/{slider}', ['uses' => 'SliderController@edit', 'as' => 'edit']);
    Route::post('update/{slider}', ['uses' => 'SliderController@update', 'as' => 'update']);
    Route::get('delete/{slider}', ['uses' => 'SliderController@destroy', 'as' => 'destroy']);
}); 

    Route::group(['namespace' => 'Admin\ConstantManagement', 'prefix' => 'backend/newsletter','as' =>'backend/constant-management.news_letters.'], function () {
        Route::get('index', ['uses' => 'NewsLetterController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'NewsLetterController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'NewsLetterController@store', 'as' => 'store']);
        Route::get('edit/{news_letter}', ['uses' => 'NewsLetterController@edit', 'as' => 'edit']);
        Route::post('update/{news_letter}', ['uses' => 'NewsLetterController@update', 'as' => 'update']);
        Route::get('delete/{news_letter}', ['uses' => 'NewsLetterController@destroy', 'as' => 'destroy']);
        Route::get('/launchcampaign', ['uses' => 'NewsLetterController@launchcampaignShow', 'as' => 'launchcampaign.show']);
        Route::post('launchcampaign', ['uses' => 'NewsLetterController@runCampaign', 'as' => 'run.campaign']);
    }); 
    

    Route::group(['namespace' => 'Admin', 'prefix' => 'backend/site-content-managements','as' =>'backend.site_content_managements.'], function () {
        Route::get('index', ['uses' => 'SiteContentManagementController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'SiteContentManagementController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'SiteContentManagementController@store', 'as' => 'store']);
        Route::get('edit/{site_content_management}', ['uses' => 'SiteContentManagementController@edit', 'as' => 'edit']);
        Route::post('update/{site_content_management}', ['uses' => 'SiteContentManagementController@update', 'as' => 'update']);
        Route::get('delete/{site_content_management}', ['uses' => 'SiteContentManagementController@destroy', 'as' => 'destroy']);
    }); 
    Route::group(['namespace' => 'Admin', 'prefix' => 'backend/faqs','as' =>'backend/constant-management.faqs.'], function () {
        Route::get('index', ['uses' => 'FaqController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'FaqController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'FaqController@store', 'as' => 'store']);
        Route::get('edit/{faq}', ['uses' => 'FaqController@edit', 'as' => 'edit']);
        Route::post('update/{faq}', ['uses' => 'FaqController@update', 'as' => 'update']);
        Route::get('delete/{faq}', ['uses' => 'FaqController@destroy', 'as' => 'destroy']);
    });


    Route::group(['middleware' => 'auth','namespace' => 'Panel', 'prefix' => 'panel/filemanager','as' =>'panel.filemanager.'], function () {
            Route::get('', ['uses' => 'FileManager@index', 'as' => 'index']);
    }); 
    Route::group(['middleware' => 'auth','namespace' => 'Panel', 'prefix' => 'panel/qr','as' =>'panel.qr.'], function () {
            Route::get('', ['uses' => 'QRController@index', 'as' => 'index']);
    }); 
    Route::group(['middleware' => 'auth','namespace' => 'Panel', 'prefix' => 'panel/map','as' =>'panel.map.'], function () {
            Route::get('', ['uses' => 'QRController@map', 'as' => 'index']);
    }); 
    
    Route::group(['namespace' => 'Panel', 'prefix' => 'panel/lorry-receipts','as' =>'panel.lorry_receipts.'], function () {
        Route::get('', ['uses' => 'LorryReceiptController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'LorryReceiptController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'LorryReceiptController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'LorryReceiptController@store', 'as' => 'store']);
        Route::get('/{lorry_receipt}', ['uses' => 'LorryReceiptController@show', 'as' => 'show']);
        Route::get('edit/{lorry_receipt}', ['uses' => 'LorryReceiptController@edit', 'as' => 'edit']);
        Route::post('update/{lorry_receipt}', ['uses' => 'LorryReceiptController@update', 'as' => 'update']);
        Route::get('/get/destination', ['uses' => 'LorryReceiptController@getDestination', 'as' => 'get.destination']);
        Route::get('update/{lorry_receipt}/{status}', ['uses' => 'LorryReceiptController@updateStatus', 'as' => 'update.status']);
        Route::get('delete/{lorry_receipt}', ['uses' => 'LorryReceiptController@destroy', 'as' => 'destroy']);
    });   
    

Route::group(['namespace' => 'Panel', 'prefix' => 'panel/device-logs','as' =>'panel.device_logs.'], function () {
        Route::get('', ['uses' => 'DeviceLogController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'DeviceLogController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'DeviceLogController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'DeviceLogController@store', 'as' => 'store']);
        Route::get('/{device_log}', ['uses' => 'DeviceLogController@show', 'as' => 'show']);
        Route::get('edit/{device_log}', ['uses' => 'DeviceLogController@edit', 'as' => 'edit']);
        Route::post('update/{device_log}', ['uses' => 'DeviceLogController@update', 'as' => 'update']);
        Route::get('delete/{device_log}', ['uses' => 'DeviceLogController@destroy', 'as' => 'destroy']);
    }); 
    
    

Route::group(['namespace' => 'Panel', 'prefix' => 'panel/l-r-progress','as' =>'panel.l_r_progress.'], function () {
        Route::get('', ['uses' => 'LRProgresController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'LRProgresController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'LRProgresController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'LRProgresController@store', 'as' => 'store']);
        Route::get('/{l_r_progress}', ['uses' => 'LRProgresController@show', 'as' => 'show']);
        Route::get('edit/{l_r_progress}', ['uses' => 'LRProgresController@edit', 'as' => 'edit']);
        Route::post('update/{l_r_progress}', ['uses' => 'LRProgresController@update', 'as' => 'update']);
        Route::get('delete/{l_r_progress}', ['uses' => 'LRProgresController@destroy', 'as' => 'destroy']);
    }); 
    
    

Route::group(['namespace' => 'Panel', 'prefix' => 'panel/device-statics','as' =>'panel.device_statics.'], function () {
        Route::get('', ['uses' => 'DeviceStaticController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'DeviceStaticController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'DeviceStaticController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'DeviceStaticController@store', 'as' => 'store']);
        Route::get('/{device_static}', ['uses' => 'DeviceStaticController@show', 'as' => 'show']);
        Route::get('edit/{device_static}', ['uses' => 'DeviceStaticController@edit', 'as' => 'edit']);
        Route::post('update/{device_static}', ['uses' => 'DeviceStaticController@update', 'as' => 'update']);
        Route::get('delete/{device_static}', ['uses' => 'DeviceStaticController@destroy', 'as' => 'destroy']);
    }); 
    
    

    Route::group(['namespace' => 'Panel', 'prefix' => 'panel/geo-fences','as' =>'panel.geo_fences.'], function () {
        Route::get('', ['uses' => 'GeoFenceController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'GeoFenceController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'GeoFenceController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'GeoFenceController@store', 'as' => 'store']);
        Route::get('/{geo_fence}', ['uses' => 'GeoFenceController@show', 'as' => 'show']);
        Route::get('edit/{geo_fence}', ['uses' => 'GeoFenceController@edit', 'as' => 'edit']);
        Route::post('update/{geo_fence}', ['uses' => 'GeoFenceController@update', 'as' => 'update']);
        Route::get('delete/{geo_fence}', ['uses' => 'GeoFenceController@destroy', 'as' => 'destroy']);
    }); 
    
    

Route::group(['namespace' => 'Panel', 'prefix' => 'panel/vehicles','as' =>'panel.vehicles.'], function () {
        Route::get('', ['uses' => 'VehicleController@index', 'as' => 'index']);
        Route::any('/print', ['uses' => 'VehicleController@print', 'as' => 'print']);
        Route::get('create', ['uses' => 'VehicleController@create', 'as' => 'create']);
        Route::post('store', ['uses' => 'VehicleController@store', 'as' => 'store']);
        Route::get('/{vehicle}', ['uses' => 'VehicleController@show', 'as' => 'show']);
        Route::get('edit/{vehicle}', ['uses' => 'VehicleController@edit', 'as' => 'edit']);
        Route::post('update/{vehicle}', ['uses' => 'VehicleController@update', 'as' => 'update']);
        Route::get('delete/{vehicle}', ['uses' => 'VehicleController@destroy', 'as' => 'destroy']);
    }); 
    
    

