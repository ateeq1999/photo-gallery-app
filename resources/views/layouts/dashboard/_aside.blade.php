<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="hidden-xs">{{ auth()->user()->first_name }}  {{ auth()->user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>@lang('site.status') </a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
       
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>
            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>
            @endif
     
            @if (auth()->user()->hasPermission('read_categories'))
            <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span>@lang('site.categories')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_products'))
            <li><a href="{{route('dashboard.products.index')}}"><i class="fa fa-th"></i><span>@lang('site.products')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_clients'))
            <li><a href="{{route('dashboard.clients.index')}}"><i class="fa fa-th"></i><span>@lang('site.clients')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_profiles'))
            <li><a href="{{route('dashboard.profiles.index')}}"><i class="fa fa-th"></i><span>@lang('site.profiles')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_settings'))
            <li><a href="{{route('dashboard.settings.index')}}"><i class="fa fa-th"></i><span>@lang('site.settings')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_orders'))
            <li><a href="{{route('dashboard.orders.index')}}"><i class="fa fa-th"></i><span>@lang('site.orders')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_locations'))
                <li><a href="{{ route('dashboard.locations.index') }}"><i class="fa fa-th"></i><span>@lang('site.locations')</span></a></li>
            @endif
            
            @if (auth()->user()->hasPermission('read_awards'))
                <li><a href="{{ route('dashboard.awards.index') }}"><i class="fa fa-th"></i><span>@lang('site.awards')</span></a></li>
            @endif
           
            @if (auth()->user()->hasPermission('read_infos'))
                <li><a href="{{ route('dashboard.infos.index') }}"><i class="fa fa-th"></i><span>@lang('site.infos')</span></a></li>
            @endif
        </ul>
    </section>
</aside>

