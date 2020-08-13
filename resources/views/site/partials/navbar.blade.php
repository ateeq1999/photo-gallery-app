<header>
    <article class="header_inner">
        {{-- Logo --}}
        <div class="logo">
            <a href='{{ route('site.home') }}'>
            <img src='{{ asset('demo/img/logo.png') }}' alt="logo" /></a>
        </div>
        {{-- Navbar Toggle --}}
        <div id="nav_toggle">
            <img src='{{ asset('demo/img/nav-toggle.png') }}' alt="Menu" />
        </div>
        {{-- Nab Links --}}
        <nav>
            <ul>
                <li>
                    <a id="aProducts" class="product_nav_link">@lang('site.lang')
                        <img src='{{ asset('demo/img/dropdown-menu.png') }}' alt="Icon" class="dropdown_menu_icon" />
                    </a>
                    <ul class="fallback">
                        <ul class="menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                </li>
                <li><a class="{{ Route::currentRouteName() == 'site.contact-us' ? 'nav_active' : ''}}" href="{{ route('site.contact-us') }}" id="aContactUs">@lang('navbar.contact-us')</a></li>
                {{-- <li><a href="{{ route('site.careers') }}" id="aCareers">@lang('navbar.careers')</a></li> --}}
                <li><a class="{{ Route::currentRouteName() == 'site.clients' ? 'nav_active' : ''}}" href="{{ route('site.clients') }}" id="aClients" >@lang('navbar.clients')</a></li>
                <li>
                    <a id="aProducts" class="product_nav_link">@lang('navbar.products')
                        <img src='{{ asset('demo/img/dropdown-menu.png') }}' alt="Icon" class="dropdown_menu_icon" />
                    </a>
                    <ul class="fallback">
                        @foreach ($categories as $category)
                            <li>
                                <a class="{{ Route::currentRouteName() == 'site.category_products' ? 'nav_active' : ''}}" href='{{ route('site.category_products', $category->id) }}'>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                            
                    </ul>
                </li>
                <li><a href="{{ route('site.profile') }}" class="{{ Route::currentRouteName() == 'site.profile' ? 'nav_active' : ''}}" id="aProfile">@lang('navbar.profile')</a></li>
                <li><a href="{{ route('site.home') }}" class="{{ Route::currentRouteName() == 'site.home' ? 'nav_active' : ''}}" id="aHome">@lang('navbar.home')</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </article>
</header>