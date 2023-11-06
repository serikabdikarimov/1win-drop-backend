<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Добавляем переключатель выпадающий список  --}}
                <li>
                    <div id="select-lang-block-wrapper">
                        <span class="current-lang-block">{{ isset($currentLocalization->locale_name) ? $currentLocalization->locale_name : __('labels.add_locale', ['locale_type' => $siteSettings->site_type == 'multi_domain' ? 'домен' : 'язык']) }}</span>
                        @if ($localizationList)
                        <div id="select-lang-block">
                            <ul>
                                @foreach($localizationList as $localization)
                                    <li data-value="{{ $localization->code }}" {{ session('admin_locale') != null &&  session('admin_locale') == $localization->code ? 'diabled' : '' }}>{{ $localization->locale_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </li>
                <li></li>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
