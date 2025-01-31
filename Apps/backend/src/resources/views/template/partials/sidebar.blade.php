<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo " style="background-color: #13b5dd !important">
        <a href="{{ route('dashboard') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2"
                style="text-transform: uppercase !important; color: white;">Donasi Kita</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">All Menu</span></li>

        <!-- Posts -->
        
       
        <li
            class="menu-item {{ Route::currentRouteName() == 'dashboard.posts.index' ||
            Route::currentRouteName() == 'dashboard.posts.index'
                ? 'active'
                : '' }}
        ">
            <a href="{{ route('dashboard.posts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box "></i>
                <div data-i18n="Basic">Buka Donasi</div>
            </a>
        </li>

        <li
            class="menu-item {{ Route::currentRouteName() == 'dashboard.donations.index' ||
            Route::currentRouteName() == 'dashboard.donations.index'
                ? 'active'
                : '' }}
        ">
            <a href="{{ route('dashboard.donations.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box "></i>
                <div data-i18n="Basic">List Donasi</div>
            </a>
        </li>




    </ul>
</aside>
<!-- / Menu -->
