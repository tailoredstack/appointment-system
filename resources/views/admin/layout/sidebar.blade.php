<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            @can('admin.patient')
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/patients') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.patient.title') }}</a></li>
            @endcan
            @can('admin.secretary')
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/secretaries') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.secretary.title') }}</a></li>
            @endcan
            @can('admin.dentist')
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/dentists') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.dentist.title') }}</a></li>
           @endcan
           @can('admin.service')
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/services') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.service.title') }}</a></li>
           @endcan
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            @canany(['admin.admin-user.index', 'admin.translation.index'])
                <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
                @can('admin.admin-user.index')
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
                @endcan
                @can('admin.translation.index')
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
                @endcan
                    {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li> --}}
            @endcanany
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
