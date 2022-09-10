@can('manager_manage_permission')
<div class="nav-item {{ activeClassIfRoutes(['panel.report.index'], 'active open') }}">
    <a href="{{route('panel.report.index')}}" class="a-item"><i class="ik ik-pie-chart"></i><span>{{ __('Reports')}}</span></a>
</div>
@endcan