<!-- Sidebar -->
@if (!isset($exclude_sidebar) || !$exclude_sidebar)
    <aside
        class="fixed text-gray-900 dark:text-white top-0 left-0 bg-white dark:bg-gray-800 z-40 w-60 h-full transition-transform -translate-x-full border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">

        {{-- <div class="flex justify-start items-center p-5 bg-brown-bg">
        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-3 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-yellow-900 focus:bg-yellow-900 dark:focus:bg-gray-700 focus:ring-2 focus:ring-yellow-900 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <i class="fa-solid fa-bars text-gray-50"></i>
        </button>
        <img src="{{ asset('assets/img/stikom-logo.webp') }}" class="mr-3 hidden sm:block" alt="STIKOM Logo"
            width="28" height="28">

        <span class="self-center text-white text-md font-semibold whitespace-nowrap dark:text-white">STIKOM 22 J-LMS
        </span>

        </a>

    </div> --}}

        <div class="menu-bar overflow-y-auto h-full grow mt-20">
            <ul class="space-y-1">
                <li>
                    <a href="{{ Auth::check() ? route('dashboard.index') : url('/') }}"
                        class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200 dark:hover:bg-gray-900 group">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>

                </li>
                <li>
                    <a href="/calendar"
                        class="flex items-center p-2 px-4 text-base font-medium  hover:bg-gray-200 dark:hover:bg-gray-900  group">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="ml-3">Calendar</span>
                    </a>
                </li>
                @auth
                    @if (in_array(Auth::user()->role->nama_role, ['Mahasiswa', 'Dosen']) && auth()->user()->status == 'Aktif')
                        @include('includes.user._sidemenu')
                    @elseif (Auth::user()->role->nama_role == 'Admin')
                        @include('includes.admin._sidemenu')
                    @endif
                @endauth
            </ul>
        </div>
    </aside>
@endif
