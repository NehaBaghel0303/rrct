<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\ConstantManagement\MailSmsTemplateController;
use App\Http\Controllers\Admin\ConstantManagement\CategoryTypeController;
use App\Http\Controllers\Admin\ConstantManagement\CategoryController;
use App\Http\Controllers\Admin\ConstantManagement\UserEnquiryController;
use App\Http\Controllers\Admin\ConstantManagement\LocationController;
use App\Http\Controllers\Admin\ConstantManagement\ArticleController;
use App\Http\Controllers\Admin\ConstantManagement\ContentGroupController;
use App\Http\Controllers\Admin\ConstantManagement\NotificationController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\Admin\Manage\TicketConversationController;
use App\Http\Controllers\Admin\Manage\LeadController;
use App\Http\Controllers\Admin\Manage\ContactController;
use App\Http\Controllers\Admin\EmailComposerController;
use App\Http\Controllers\Admin\BulkController;
use App\Http\Controllers\Admin\WalletLogController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\VehicleController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Cron\LorryReceiptController;
use App\Http\Controllers\Cron\DeviceController;
use App\Http\Controllers\Cron\TripController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|'
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth','prefix' => 'panel', 'as' => 'panel.'], function () {
    
    // Backend Route Start-------------------------------------------------------------------------------------
    Route::get('/clear-cache', [CustomerController::class,'clearCache']);
    Route::get('/logout-as', [HomeController::class,'logoutAs'])->name('auth.logout-as');
    Route::get('/help-center', [HomeController::class,'helpCenter'])->name('help-center');
    Route::get('/view-notification/{notification}', [NotificationController::class,'show'])->name('notification.read');
    Route::get('/profile', function () {
        return view('user.profile');
    });
    Route::get('/invoice', function () {
        return view('pages.invoice');
    });

    Route::get('/rrct/devices/json', [MapController::class,'getDevicesJson'])->name('get.devices.json');
    Route::get('/get/vehicle', [VehicleController::class,'getVehicleRecord'])->name('get.vehicle.record');
   

    // dashboard route
    Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
    Route::get('analysis', [UserController::class,'analysis'])->name('board.analysis');
    Route::get('/track/{v_id}', [UserController::class,'track'])->name('track');
    
    Route::group(['middleware' => 'can:manage_setting','prefix' => 'wallet_logs', 'as' => 'wallet_logs.'], function () {
        Route::get('user/index/{id}', [WalletLogController::class,'index'])->name('index');
        Route::get('status/{id}/{s}', [WalletLogController::class,'updateStatus'])->name('status');
        Route::post('/user/wallet/update', [WalletLogController::class,'userWalletUpdate'])->name('users.wallet.update');
    });
    //only those have manage_user permission will get access
    Route::group(['namespace' => 'Admin\Message','middleware' => 'can:manage_chats','prefix' => 'chats','as' =>'chats.'], function () {
        Route::get('index', ['uses' => 'ChatController@index', 'as' => 'index']);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/user-profile', [UserController::class,'profile']);
        Route::post('/user/update-profile/{id}', [UserController::class,'updateProfile'])->name('update-user-profile');
        Route::post('/user/profile-update/{id}', [UserController::class,'updateProfileImage'])->name('update-profile-img');
        Route::post('/user/password-update/{id}', [UserController::class,'updatePassword'])->name('update-password');
        
    });
    //  consignor Routes
    Route::group(['prefix' => 'consignor', 'as' => 'consignor.'], function () {
        Route::get('/{id}/show', [ClientController::class,'consignorShow'])->name('show');
    });

    //  Client Routes
    Route::group(['prefix' => 'consignee', 'as' => 'consignee.'], function () {
        Route::get('/{id}/show', [ClientController::class,'consigneeShow'])->name('show');
    });

    Route::group(['middleware' => 'can:manage_user'], function () {
        Route::get('/users/index/{role?}', [UserController::class,'index'])->name('users.index');
        Route::get('/users-show/{id?}', [UserController::class,'userShow'])->name('users.show');
        Route::any('/users-print', [UserController::class,'print'])->name('users.print');
        Route::get('/user/create', [UserController::class,'create'])->name('users.create');
        Route::post('/user/create', [UserController::class,'store'])->name('create-user');
        Route::get('/user/{id}', [UserController::class,'edit']);
        Route::post('/user/update/{id}', [UserController::class,'update'])->name('update-user');
        Route::post('/user/update', [UserController::class,'update']);
        Route::get('/user/delete/{id}', [UserController::class,'delete']);
        Route::get('/user/login-as/{id}', [UserController::class,'loginAs']);
        Route::get('/user/status/{id}/{s}', [UserController::class,'status'])->name('user.status.update');
        Route::get('/user-log/{u_id}/{role?}', [UserController::class,'userlog'])->name('user_log.index');
        Route::post('/ekyc-status', [UserController::class,'updateEkycStatus'])->name('update-ekyc-status');
    });
    
    //only those have manage_role permission will get access
    Route::group(['middleware' => 'can:manage_role'], function () {
        Route::get('/roles', [RolesController::class,'index'])->name('roles');
        Route::post('/role/create', [RolesController::class,'create']);
        Route::get('/role/edit/{id}', [RolesController::class,'edit']);
        Route::post('/role/update', [RolesController::class,'update']);
        Route::get('/role/delete/{id}', [RolesController::class,'delete']);
    });


    //only those have manage_permission permission will get access
    Route::group(['middleware' => 'can:manage_permission'], function () {
        Route::get('/permission', [PermissionController::class,'index'])->name('permission');
        Route::post('/permission/create', [PermissionController::class,'create']);
        Route::get('/permission/update', [PermissionController::class,'update']);
        Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
    });

    //report route start
    Route::group(['middleware' => 'can:manage_user_enquiry', 'prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/', [ReportController::class,'index'])->name('index');
        Route::post('/remark/store', [ReportController::class,'remarkStore'])->name('remark.store');
    });


    // get permissions
    Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);
        
    Route::group(['namespace' => 'Admin\WebsiteSetting','middleware' => 'can:manage_setting', 'prefix' => 'website-setting', 'as' => 'website_setting.'], function () {

        Route::get('footer', ['uses' => 'FooterController@index', 'as' => 'footer']);
        Route::post('footer-about', ['uses' => 'FooterController@storeAbout', 'as' => 'footer.about.store']);
        Route::post('footer-contact', ['uses' => 'FooterController@storeContact', 'as' => 'footer.contact.store']);
        Route::post('footer-links', ['uses' => 'FooterController@storeFooterLinks', 'as' => 'footer.links.store']);
        Route::post('footer-bottom', ['uses' => 'FooterController@storeFooterBottom', 'as' => 'footer.bottom.store']);

        Route::get('pages', ['uses' => 'PagesController@index', 'as' => 'pages']);
        Route::post('pages/print', ['uses' => 'PagesController@print', 'as' => 'pages.print']);
        Route::get('pages/create', ['uses' => 'PagesController@createPage', 'as' => 'pages.create']);
        Route::post('pages', ['uses' => 'PagesController@storePages', 'as' => 'pages.store']);
        Route::get('pages/edit/{id}', ['uses' => 'PagesController@editPage', 'as' => 'pages.edit']);
        Route::post('pages/update/{id}', ['uses' => 'PagesController@updatePage', 'as' => 'pages.update']);
        Route::get('pages/delete/{id}', ['uses' => 'PagesController@destroy', 'as' => 'pages.delete']);
        Route::post('home-update', ['uses' => 'PagesController@storeHome', 'as' => 'home.store']);

        Route::get('appearance', ['uses' => 'AppearanceController@index', 'as' => 'appearance']);
        Route::post('theme-store', ['uses' => 'AppearanceController@storeTheme', 'as' => 'theme.store']);
        Route::post('seo-store', ['uses' => 'AppearanceController@storeSeo', 'as' => 'seo.store']);
        Route::post('cookies-store', ['uses' => 'AppearanceController@storeCookies', 'as' => 'cookies.store']);
        Route::post('script-store', ['uses' => 'AppearanceController@storeCustomScript', 'as' => 'script.store']);
        Route::post('style-store', ['uses' => 'AppearanceController@storeCustomStyles', 'as' => 'style.store']);
       
       
        Route::get('social-login', ['uses' => 'SocialLoginController@index', 'as' => 'social-login']);
        Route::post('social-login', ['uses' => 'SocialLoginController@store', 'as' => 'social-login.store']);
    });

    Route::group(['namespace' => 'Admin\Setting','middleware' => 'can:manage_setting', 'prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('maintanance', ['uses' => 'GeneralController@maintananceIndex', 'as' => 'maintanance']);
        Route::get('general', ['uses' => 'GeneralController@index', 'as' => 'general']);
        Route::get('storage-link', ['uses' => 'GeneralController@storageLink', 'as' => 'storage_link']);
        Route::get('optimize-clear', ['uses' => 'GeneralController@OptimizeClear', 'as' => 'optimize_clear']);
        Route::get('backup', ['uses' => 'GeneralController@backup', 'as' => 'backup']);
        Route::post('general', ['uses' => 'GeneralController@storeGeneral', 'as' => 'general.store']);
        Route::post('currency', ['uses' => 'GeneralController@storeCurrency', 'as' => 'currency.store']);
        Route::post('verification', ['uses' => 'GeneralController@storeVerification', 'as' => 'verification.store']);
        Route::post('dnt', ['uses' => 'GeneralController@storeDnT', 'as' => 'dnt.store']);
        Route::post('plugin', ['uses' => 'GeneralController@storePlugin', 'as' => 'plugin.store']);
        Route::post('trip-logics', ['uses' => 'GeneralController@storeTripLogics', 'as' => 'trip_logics.store']);
        Route::post('g-map/api', ['uses' => 'GeneralController@storeGMapAPI', 'as' => 'google_map.store']);

        Route::get('mail', ['uses' => 'MailController@index', 'as' => 'mail']);
        Route::post('mail', ['uses' => 'MailController@storeMail', 'as' => 'mail.store']);
        Route::post('sms', ['uses' => 'MailController@storeSMS', 'as' => 'sms.store']);
        Route::post('test', ['uses' => 'MailController@testSend', 'as' => 'test.send']);
        Route::post('notification', ['uses' => 'MailController@storePushNotification', 'as' => 'notification.store']);

        Route::get('payment', ['uses' => 'PaymentSettingController@index', 'as' => 'payment']);
        Route::post('payment', ['uses' => 'PaymentSettingController@storePayment', 'as' => 'payment.store']);

        Route::get('activation', ['uses' => 'ActivationController@index', 'as' => 'activation']);
        Route::post('activation', ['uses' => 'ActivationController@store', 'as' => 'activation.store']);

        Route::get('registration', ['uses' => 'SettingController@registration', 'as' => 'registration']);
        Route::post('registration', ['uses' => 'SettingController@registrationStore', 'as' => 'registration.store']);
    });
    
    Route::group(['namespace' => 'Admin\ConstantManagement','middleware' => 'can:manage_setting', 'prefix' => '', 'as' => 'constant_management.'], function () {

        Route::group(['middleware' => 'can:manage_article', 'prefix' => 'support-ticket', 'as' => 'support_ticket.'],
        function () {
            Route::get('/', [SupportTicketController::class,'AdminIndex'])->name('index');
            Route::get('show/{id}', [SupportTicketController::class,'AdminShow'])->name('show');
            Route::post('/reply', [SupportTicketController::class,'reply'])->name('reply');
            Route::get('/update-status/{ticket_id}/{status}', [SupportTicketController::class,'updateStatus'])->name('status');
        });

        Route::post('bulk-user/upload', [BulkController::class,'upload'])->name('bulk-user.upload');

        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'mail-sms-template', 'as' => 'mail_sms_template.'], function () {
            Route::get('/', [MailSmsTemplateController::class,'index'])->name('index');
            Route::get('/create', [MailSmsTemplateController::class,'create'])->name('create');
            Route::post('/store', [MailSmsTemplateController::class,'store'])->name('store');
            Route::get('/edit/{id}', [MailSmsTemplateController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [MailSmsTemplateController::class,'show'])->name('show');
            Route::post('/update/{id}', [MailSmsTemplateController::class,'update'])->name('update');
            Route::get('/delete/{id}', [MailSmsTemplateController::class,'destroy'])->name('delete');
        });
        Route::group(['middleware' => 'can:manage_category_type', 'prefix' => 'category-type', 'as' => 'category_type.'], function () {
            Route::get('/', [CategoryTypeController::class,'index'])->name('index');
            Route::get('/create', [CategoryTypeController::class,'create'])->name('create');
            Route::post('/store', [CategoryTypeController::class,'store'])->name('store');
            Route::get('/edit/{id}', [CategoryTypeController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [CategoryTypeController::class,'show'])->name('show');
            Route::post('/update/{id}', [CategoryTypeController::class,'update'])->name('update');
            Route::get('/delete/{id}', [CategoryTypeController::class,'destroy'])->name('delete');
        });
        Route::group(['middleware' => 'can:manage_category', 'prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/view/{type_id}', [CategoryController::class,'index'])->name('index');
            Route::get('/create/{type_id}/{level?}/{parent_id?}', [CategoryController::class,'create'])->name('create');
            Route::post('/store', [CategoryController::class,'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [CategoryController::class,'show'])->name('show');
            Route::post('/update/{id}', [CategoryController::class,'update'])->name('update');
            Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('delete');
        });

        Route::group(['middleware' => 'can:manage_user_enquiry', 'prefix' => 'website-enquiry', 'as' => 'user_enquiry.'], function () {
            Route::get('/', [UserEnquiryController::class,'index'])->name('index');
            Route::get('/create', [UserEnquiryController::class,'create'])->name('create');
            Route::post('/store', [UserEnquiryController::class,'store'])->name('store');
            Route::get('/edit/{id}', [UserEnquiryController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [UserEnquiryController::class,'show'])->name('show');
            Route::post('/update/{id}', [UserEnquiryController::class,'update'])->name('update');
            Route::get('/delete/{id}', [UserEnquiryController::class,'destroy'])->name('delete');
        });

        

        Route::group(['middleware' => 'can:manage_article', 'prefix' => 'article', 'as' => 'article.'], function () {
            Route::get('/', [ArticleController::class,'index'])->name('index');
            Route::any('/print', [ArticleController::class,'print'])->name('print');
            Route::get('/create', [ArticleController::class,'create'])->name('create');
            Route::post('/store', [ArticleController::class,'store'])->name('store');
            Route::get('/edit/{id}', [ArticleController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [ArticleController::class,'show'])->name('show');
            Route::post('/update/{id}', [ArticleController::class,'update'])->name('update');
            Route::get('/delete/{id}', [ArticleController::class,'destroy'])->name('delete');
        });
        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'location', 'as' => 'location.'], function () {
            Route::get('/', [LocationController::class,'country'])->name('country');
            Route::get('/create', [LocationController::class,'create'])->name('create');
            Route::post('/store', [LocationController::class,'store'])->name('store');
            Route::get('/edit/{id}', [LocationController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [LocationController::class,'show'])->name('show');
            Route::post('/update/{id}', [LocationController::class,'update'])->name('update');
            Route::get('/state', [LocationController::class,'state'])->name('state');
            Route::post('/state/store', [LocationController::class,'stateStore'])->name('state.store');
            Route::post('/state/update', [LocationController::class,'stateUpdate'])->name('state.update');
            Route::get('/city', [LocationController::class,'city'])->name('city');
            Route::post('/city/store', [LocationController::class,'cityStore'])->name('city.store');
            Route::post('/city/update', [LocationController::class,'cityUpdate'])->name('city.update');
            Route::get('/delete/{id}', [LocationController::class,'destroy'])->name('delete');
        });

        Route::group(['middleware' => 'can:manage_article', 'prefix' => 'notification', 'as' => 'notification.'], function () {
            Route::get('/', [NotificationController::class,'index'])->name('index');
        });
    });

    Route::group(['namespace' => 'Admin\Manage','middleware' => 'can:manage_setting', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::group(['middleware' => 'can:manage_enquiry', 'prefix' => 'ticket-conversation', 'as' => 'ticket_conversation.'], function () {
            Route::get('/', [TicketConversationController::class,'index'])->name('index');
            Route::get('/create', [TicketConversationController::class,'create'])->name('create');
            Route::post('/store', [TicketConversationController::class,'store'])->name('store');
            Route::get('/edit/{id}', [TicketConversationController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [TicketConversationController::class,'show'])->name('show');
            Route::post('/update/{id}', [TicketConversationController::class,'update'])->name('update');
            Route::get('/delete/{id}', [TicketConversationController::class,'destroy'])->name('delete');
            
        });
        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'ticket', 'as' => 'ticket.'], function () {
            Route::get('/', [TicketController::class,'index'])->name('index');
            Route::any('/print', [TicketController::class,'print'])->name('print');
            Route::get('/create', [TicketController::class,'create'])->name('create');
            Route::post('/store', [TicketController::class,'store'])->name('store');
            Route::get('/edit/{id}', [TicketController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [TicketController::class,'show'])->name('show');
            Route::post('/update/{id}', [TicketController::class,'update'])->name('update');
            Route::get('/update-status/{id}/{s}', [TicketController::class,'updateStatus'])->name('update.status');
            Route::get('/delete/{id}', [TicketController::class,'destroy'])->name('delete');
        });

        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'ticket-conversation', 'as' => 'ticket_conversation.'], function () {
            Route::get('/', [TicketConversationController::class,'index'])->name('index');
            Route::get('/create', [TicketConversationController::class,'create'])->name('create');
            Route::post('/store', [TicketConversationController::class,'store'])->name('store');
            Route::get('/edit/{id}', [TicketConversationController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [TicketConversationController::class,'show'])->name('show');
            Route::post('/update/{id}', [TicketConversationController::class,'update'])->name('update');
            Route::get('/delete/{id}', [TicketConversationController::class,'destroy'])->name('delete');
        });

        //-+
        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'lead', 'as' => 'lead.'], function () {
            Route::get('/', [LeadController::class,'index'])->name('index');
            Route::any('/print', [LeadController::class,'print'])->name('print');
            Route::get('/create', [LeadController::class,'create'])->name('create');
            Route::post('/store', [LeadController::class,'store'])->name('store');
            Route::get('/edit/{id}', [LeadController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [LeadController::class,'show'])->name('show');
            Route::post('/update/{id}', [LeadController::class,'update'])->name('update');
            Route::get('/delete/{id}', [LeadController::class,'destroy'])->name('delete');
        });

        Route::group(['middleware' => 'can:manage_setting', 'prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/', [ContactController::class,'index'])->name('index');
            Route::get('/create', [ContactController::class,'create'])->name('create');
            Route::post('/store', [ContactController::class,'store'])->name('store');
            Route::get('/edit/{id}', [ContactController::class,'edit'])->name('edit');
            Route::get('/show/{id}', [ContactController::class,'show'])->name('show');
            Route::post('/update/{id}', [ContactController::class,'update'])->name('update');
            Route::get('/delete/{id}', [ContactController::class,'destroy'])->name('delete');
        });
        Route::group(['middleware' => 'can:manage_compose_email', 'prefix' => 'email', 'as' => 'email.'], function () {
            Route::get('/compose-email', [EmailComposerController::class,'index'])->name('index');
            Route::post('/compose-email', [EmailComposerController::class,'send'])->name('send');
            Route::post('/message-prepare', [EmailComposerController::class,'msgPrepare'])->name('msg.prepare');
        });
    });




    //Backend Routes END--------------------------------------------------------------------------------------
});
