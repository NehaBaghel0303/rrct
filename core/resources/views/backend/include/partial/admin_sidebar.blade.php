@can('access_by_admin')
<div class="nav-item">
    <a href="{{ route('panel.board.analysis')}}" class="a-item" ><i class="ik ik-activity"></i><span>{{ __('Analysis')}}</span></a>
</div> 
@if(getSetting('order_activation') == 1)
@can('manage_orders')
    <div class="nav-item {{ activeClassIfRoutes(['panel.orders.index','panel.orders.show','panel.orders.invoice'], 'active')  }}">
        <a href="{{route('panel.orders.index')}}" class="a-item" ><i class="ik ik-shopping-cart"></i><span>{{ __('Orders')}}</span></a>
    </div>
@endcan
@endif
    @can('manage_administrator')
        <div class="nav-item {{ activeClassIfRoutes(['panel.users.index','panel.users.show', 'panel.users.create', 'panel.user_log.index','panel.roles','panel.permission'], 'active open') }} has-sub">
            <a href="#"><i class="ik ik-users"></i><span>{{ __('Administrator')}}</span></a>
            <div class="submenu-content">
                <!-- only those have manage_user permission will get access -->
                
              @php
                  $roles = Spatie\Permission\Models\Role::whereNotIn('id',[1,3])->pluck('name');
              @endphp
                @foreach ($roles as $role)
                    @if(getSetting('user_management_activation') == 1)
                        <a href="{{route('panel.users.index')}}?role={{$role}}" class="menu-item a-item @if(request()->has('role') && request()->get('role') == $role) active @endif">Manage {{ $role }}</a>
                    @endif
                @endforeach
                @can('create_user')
                <a href="{{route('panel.users.create')}}" class="menu-item a-item {{ activeClassIfRoute('panel.users.create', 'active')  }}">{{ __('Add User')}}</a>
                @endcan
                <!-- only those have manage_role permission will get access -->
                @if(getSetting('roles_and_permission_activation') == 1)
                @can('manage_role')
                    <a href="{{route('panel.roles')}}" class="menu-item a-item {{ activeClassIfRoute('panel.roles' ,'active')  }}">{{ __('Roles')}}</a>
                @endcan
                <!-- only those have manage_permission permission will get access -->
                @can('manage_permission')
                    <a href="{{route('panel.permission')}}" class="menu-item a-item {{ activeClassIfRoute('panel.permission', 'active')  }}">{{ __('Permission')}}</a>
                @endcan
                @endif
            </div>
        </div>

        <div class="nav-item {{ activeClassIfRoutes(['panel.lorry_receipts.index'], 'active open') }}">
            <a href="{{route('panel.lorry_receipts.index')}}" class="a-item"><i class="ik ik-command"></i><span>{{ __('Lorry Receipt')}}</span></a>
        </div>
        <div class="nav-item {{ ($segment2 == 'vehicles') ? 'active' : '' }}">
            <a href="{{ route('panel.vehicles.index')}}" class="a-item" ><i class="ik ik-truck"></i><span>Vehicles</span></a>
        </div> 
        <div class="nav-item {{ activeClassIfRoutes(['panel.report.index'], 'active open') }}">
            <a href="{{route('panel.report.index')}}" class="a-item"><i class="ik ik-pie-chart"></i><span>{{ __('Reports')}}</span></a>
        </div>
        <div class="nav-item {{ activeClassIfRoutes(['panel.geo_fences.index'], 'active open') }}">
            <a href="{{ route('panel.geo_fences.index') }}" class="a-item"><i class="ik ik-map-pin"></i><span>{{ __('Geofence')}}</span></a>
        </div>
        <div class="nav-item {{ activeClassIfRoutes(['panel.help-center'], 'active open') }}">
            <a href="{{ route('panel.help-center') }}" class="a-item"><i class="ik ik-help-circle"></i><span>{{ __('Help Center')}}</span></a>
        </div>
    @endcan    

    @can('manage_manage')
        @if(getSetting('payout_activation') == 1)
            <div class="nav-item {{ activeClassIfRoutes(['panel.payouts.index','panel.payouts.show','panel.orders.invoice','panel.orders.create' ], 'active open')  }} has-sub">
                <a href="#"><i class="ik ik-layers"></i><span>{{ __('Manage')}}</span></a>
                <div class="submenu-content">
                    @if(getSetting('payout_activation') == 1)
                    <a href="{{route('panel.payouts.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.payouts.index', 'panel.payouts.edit'], 'active')  }}">{{ __('Payouts')}}</a>
                    @endif
                </div>
            </div>
        @endif    
    @endcan


    @can('manage_resources')
    @if(getSetting('website_enquiry_activation') == 1 || getSetting('ticket_activation') == 1)
        <div class="nav-item {{ activeClassIfRoutes(['panel.constant_management.user_enquiry.index', 'panel.constant_management.user_enquiry.create','backend/constant-management.news_letters.index','backend/constant-management.news_letters.create','panel.constant_management.support_ticket.index' , 'panel.constant_management.support_ticket.show','backend/constant-management.news_letters.edit'], 'active open')  }} has-sub">
                <a href="#"><i class="ik ik-mail"></i><span>{{ __('Contacts / Enquiry')}}</span></a>
                <div class="submenu-content">
                    @if(getSetting('website_enquiry_activation') == 1)
                    @can('manage_user_enquiry')
                        <a href="{{route('panel.constant_management.user_enquiry.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.constant_management.user_enquiry.index', 'panel.constant_management.user_enquiry.create','panel.constant_management.user_enquiry.edit'], 'active')  }}">{{ __('Website Enquiry')}}</a>
                    @endcan
                    @endif
                    @if(getSetting('ticket_activation') == 1)
                    @can('manage_support_ticket')
                        <a href="{{route('panel.constant_management.support_ticket.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.constant_management.support_ticket.index', 'panel.constant_management.support_ticket.show'], 'active')  }}">{{ __('Support Tickets')}}</a>
                    @endcan
                    @endif
                    @if(getSetting('newsletter_activation') == 1)
                    @can('manage_newsletter')
                        <a href="{{ route('backend/constant-management.news_letters.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['backend/constant-management.news_letters.index', 'backend/constant-management.news_letters.create','backend/constant-management.news_letters.edit'], 'active')  }}">{{ __('Newsletter')}}</a>
                    @endcan
                    @endif
                </div>
        </div>
    @endif    
    @endcan
   
    

    @can('mange_constant_management')
    <div class="nav-item {{ activeClassIfRoutes(['panel.constant_management.mail_sms_template.index','backend/constant-management.faqs.index','backend/constant-management.faqs.create','backend/constant-management.faqs.edit','panel.constant_management.mail_sms_template.create','panel.constant_management.mail_sms_template.edit','panel.constant_management.mail_sms_template.show', 'panel.constant_management.category_type.index','panel.constant_management.category_type.create','panel.constant_management.category_type.edit','panel.constant_management.category.index','panel.constant_management.category.create','panel.constant_management.category.edit', 'backend.site_content_managements.index','backend.site_content_managements.create','backend.site_content_managements.edit','backend.constant-management.slider_types.index','backend.constant-management.slider_types.create','backend.constant-management.slider_types.edit','backend.constant-management.sliders.index','backend.constant-management.sliders.create','panel.constant_management.article.index','panel.constant_management.article.create','panel.constant_management.article.edit','panel.constant_management.article.show','backend.constant-management.sliders.edit','panel.constant_management.location.country' ], 'active open')  }} has-sub">
        <a href="#"><i class="ik ik-hard-drive"></i><span>{{ __('Content Management')}}</span></a>
        <div class="submenu-content">
            @if(getSetting('article_activation') == 1)
            @can('manage_article')
                <a href="{{route('panel.constant_management.article.index')}}" class="menu-item {{ activeClassIfRoutes(['panel.constant_management.article.index','panel.constant_management.article.create','panel.constant_management.article.edit','panel.constant_management.article.show'], 'active')  }}">{{ __('Articles/Blogs')}}</a>
            @endcan
            @endif
            @can('manage_mail_sms')
                <a href="{{route('panel.constant_management.mail_sms_template.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.constant_management.mail_sms_template.index','panel.constant_management.mail_sms_template.create','panel.constant_management.mail_sms_template.edit','panel.constant_management.mail_sms_template.show'], 'active')  }}">{{ __('Mail/Text Templates')}}</a>
            @endcan

            @can('manage_category')
                <a href="{{route('panel.constant_management.category_type.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.constant_management.category_type.index','panel.constant_management.category_type.create','panel.constant_management.category_type.edit','panel.constant_management.category.index','panel.constant_management.category.create','panel.constant_management.category.edit',], 'active')  }}">{{ __('Category Group')}}</a>
            @endcan
            @if(getSetting('slider_activation') == 1)
            @can('manage_slider')
                <a href="{{ route('backend.constant-management.slider_types.index')}}" class="menu-item a-item {{ activeClassIfRoutes(['backend.constant-management.slider_types.index','backend.constant-management.slider_types.create','backend.constant-management.slider_types.edit'], 'active')  }}" ><span>Slider Group</span></a>
            @endcan
            @endif
            @if(getSetting('paragraph_content_activation') == 1)
            @can('manage_paragraph_content')
                <a href="{{ route('backend.site_content_managements.index')}}" class="menu-item {{ activeClassIfRoutes(['backend.site_content_managements.index','backend.site_content_managements.create','backend.site_content_managements.edit',], 'active')  }}">{{ __('Paragraph Content')}}</a>
            @endcan
            @endif
            @if(getSetting('faq_activation') == 1)
            @can('manage_faq')
                <a href="{{ route('backend/constant-management.faqs.index')}}" class="menu-item {{ activeClassIfRoutes(['backend/constant-management.faqs.index','backend/constant-management.faqs.create','backend/constant-management.faqs.edit',], 'active')  }}">{{ __('Manage FAQs')}}</a>
            @endcan
            @endif
            @if(getSetting('location_activation') == 1)
            @can('manage_location')
                <a href="{{ route('panel.constant_management.location.country')}}" class="menu-item {{ activeClassIfRoutes(['panel.constant_management.location.country','panel.constant_management.location.create','panel.constant_management.location.edit',], 'active')  }}">{{ __('Location')}}</a>
            @endcan
            @endif
        </div>
    </div>
    @endcan


    {{-- @can('manage_webiste_setup')
    <div class="nav-item {{ activeClassIfRoutes(['panel.website_setting.footer', 'panel.website_setting.pages','panel.website_setting.pages.create','panel.website_setting.pages.edit', 'panel.website_setting.appearance', 'panel.website_setting.social-login'] ,'active open' ) }} has-sub">
        <a href="#"><i class="ik ik-monitor"></i><span>{{ __('Website Setup')}}</span></a>
        <div class="submenu-content">
            @can('manage_basic_detail')
                <a href="{{route('panel.website_setting.footer')}}" class="menu-item a-item {{ activeClassIfRoute('panel.website_setting.footer', 'active')  }}">{{ __('Basic Details')}}</a>
            @endcan
            @if(getSetting('pages_activation') == 1)
            @can('manage_pages')
                <a href="{{route('panel.website_setting.pages')}}" class="menu-item a-item {{ activeClassIfRoutes(['panel.website_setting.pages','panel.website_setting.pages.create','panel.website_setting.pages.edit'], 'active')  }}">{{ __('Pages')}}</a>
            @endcan
            @endif
            <a href="{{route('panel.website_setting.appearance')}}" class="menu-item a-item {{ activeClassIfRoute('panel.website_setting.appearance', 'active')  }}">{{ __('Appearance')}}</a>
            <a href="{{route('panel.website_setting.social-login')}}" class="menu-item a-item {{ activeClassIfRoute('panel.website_setting.social-login',  'active')  }}">{{ __('Social Login')}}</a>
        </div>
    </div>
    @endcan --}}

    @can('manage_setup_configuation')
    <div class="nav-item {{ activeClassIfRoutes(['panel.setting.general', 'panel.setting.general', 'panel.setting.mail', 'panel.setting.payment','panel.setting.activation'], 'active open')  }} has-sub">
        <a href="#"><i class="ik ik-settings"></i><span>{{ __('Setup & Configurations')}}</span></a>
        <div class="submenu-content">
            @can('manage_general_configuration')
            <a href="{{route('panel.setting.general')}}" class="menu-item a-item {{ activeClassIfRoute('panel.setting.general', 'active')  }}">{{ __('General Configuration')}}</a>
            @endcan
            {{-- <a href="{{route('panel.setting.general')}}" class="menu-item a-item {{ activeClassIfRoute('panel.setting.general', 'active')  }}">{{ __('Content Group')}}</a> --}}

            @can('mail_sms_configuration')
            <a href="{{route('panel.setting.mail')}}" class="menu-item a-item {{ activeClassIfRoute('panel.setting.mail', 'active')  }}">{{ __('Mail/SMS Configuration')}}</a>
            @endcan
            @if(getSetting('payment_gateway_activation') == 1)
            @can('payment_configuaration')
            <a href="{{route('panel.setting.payment')}}" class="menu-item a-item {{ activeClassIfRoute('panel.setting.payment', 'active')  }}">{{ __('Payment Configuration')}}</a>
            @endcan
            @endif
            @can('features_activation')
            <a href="{{route('panel.setting.activation')}}" class="menu-item a-item {{ activeClassIfRoute('panel.setting.activation', 'active')  }}">{{ __('Features Activation')}}</a>
            @endcan
        </div>
    </div>
    @endcan
@endcan
