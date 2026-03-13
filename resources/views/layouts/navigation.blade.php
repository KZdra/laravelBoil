<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            {{-- Single Nav Items --}}
            @foreach ($navItems as $item)
                @if (!isset($item['roles']) || (auth()->check() && in_array(auth()->user()->role, $item['roles'])))
                    <li class="nav-item">
                        <a href="{{ route($item['route']) }}"
                            class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                            <i class="nav-icon {{ $item['icon'] }}"></i>
                            <p>{{ $item['label'] }}</p>
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- Collapsible Nav Items --}}
            @foreach ($collapseNavItems as $g)
                @if (!empty($g))
                    {{-- Cek akses untuk Parent Menu --}}
                    @if (!isset($g['roles']) || (auth()->check() && in_array(auth()->user()->role, $g['roles'])))
                        @php
                            $isOpen = collect($g['list'])->contains(function ($item) {
                                return request()->routeIs($item['route']);
                            });
                        @endphp

                        <li class="nav-item {{ $isOpen ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ $isOpen ? 'active' : '' }}">
                                <i class="nav-icon {{ $g['pIcon'] }}"></i>
                                <p>
                                    {{ $g['label'] }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                @foreach ($g['list'] as $gl)
                                    {{-- Cek akses untuk Child Menu --}}
                                    @if (!isset($gl['roles']) || (auth()->check() && in_array(auth()->user()->role, $gl['roles'])))
                                        <li class="nav-item">
                                            <a href="{{ route($gl['route']) }}"
                                                class="nav-link {{ request()->routeIs($gl['route']) ? 'active' : '' }}">
                                                <i class="{{ $gl['icon'] }} nav-icon"></i>
                                                <p>{{ $gl['label'] }}</p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
