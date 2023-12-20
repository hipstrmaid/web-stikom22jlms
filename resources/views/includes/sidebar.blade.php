<!-- Sidebar -->
<aside
    class="fixed text-gray-900 dark:text-white top-0 left-0 bg-white dark:bg-gray-800 z-40 w-60 h-screen pt-14 transition-transform -translate-x-full border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">

    <div class="overflow-y-auto py-4 h-full">
        <ul class="space-y-1">
            <li>
                @auth
                    <a href="{{ route('dashboard.index') }}"
                        class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200 dark:hover:bg-gray-900  dark:bg-gray-900 group">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                @else
                    <a href="/"
                        class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200 dark:hover:bg-gray-900  dark:bg-gray-900 group">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                @endauth
            </li>
            <li>
                <a href="/calendar"
                    class="flex items-center p-2 px-4 text-base font-medium  hover:bg-gray-200 dark:hover:bg-gray-900  group">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="ml-3">Calendar</span>
                </a>
            </li>
            @auth
                @if (in_array(Auth::user()->role_id, [1, 2]))
                    <li>
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ route('matkul.index') }}"
                                class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200  dark:hover:bg-gray-900  group">
                                <i class="fas fa-book"></i>
                                <span class="ml-3">Mata Kuliah</span>
                            </a>
                        @else
                            <a href="{{ route('matkul.index') }}"
                                class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200  dark:hover:bg-gray-900 group">
                                <i class="fas fa-book"></i>
                                <span class="ml-3">Mata Kuliah</span>
                            </a>
                        @endif

                    </li>

                    <li>
                        <a href="/tugas"
                            class="flex items-center p-2 px-4 text-base font-medium hover:bg-gray-200  dark:hover:bg-gray-900  group"><i
                                class="fas fa-book"></i><span class="ml-3">Tugas</span></a>
                    </li>
                    <li>
                        <a href="/forum">
                            <button type="button"
                                class="flex items-center p-2 px-4 w-full text-base font-medium hover:bg-gray-200 dark:hover:bg-gray-900 transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">
                                <i class="fas fa-comments"></i>
                                <span class="flex-1 ml-2 text-left whitespace-nowrap">Forum</span>
                            </button>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role_id == 4)
                    <li>
                        <button type="button"
                            class="flex items-center  p-2 px-4 w-full text-base font-medium  transition duration-75 group hover:bg-gray-200  dark:hover:bg-gray-700"
                            aria-controls="dropdown-pages-3" data-collapse-toggle="dropdown-pages-3">
                            <i class="fas fa-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Data User</span>
                            <x-arrow-down></x-arrow-down>
                        </button>
                        <ul id="dropdown-pages-3" class="hidden py-2">
                            {{-- <li class="flex items-center pl-10">
                            <span class="dot"></span>
                            <a href="{{ route('user.index') }}"
                                class="p-2 w-full text-base font-medium  rounded-lg transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">User</a>
                        </li> --}}
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="{{ route('user.tambahDosen') }}"
                                    class="p-2 w-full text-base font-medium   transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Dosen</a>
                            </li>
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="{{ route('user.tambahMahasiswa') }}"
                                    class="p-2 w-full text-base font-medium  transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Mahasiswa</a>
                            </li>

                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="{{ route('user.tambahAdmin') }}"
                                    class="p-2 w-full text-base font-medium  transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Admin</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <button type="button"
                            class="flex items-center p-2 px-4 w-full text-base font-medium transition duration-75 group hover:bg-gray-200  dark:hover:bg-gray-700"
                            aria-controls="dropdown-pages-2" data-collapse-toggle="dropdown-pages-2">
                            <i class="fas fa-book"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Umum</span>
                            <x-arrow-down></x-arrow-down>
                        </button>
                        <ul id="dropdown-pages-2" class="hidden py-2">
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="#"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Mata
                                    Kuliah</a>
                            </li>
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="#"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Pertemuan</a>
                            </li>
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="#"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Semester</a>
                            </li>
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="#"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Materi</a>
                            </li>
                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="#"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Prodi</a>
                            </li>

                            <li class="flex items-center pl-10">
                                <span class="dot"></span>
                                <a href="{{ route('role.index') }}"
                                    class="p-2 w-full text-base font-medium transition duration-75 group hover:bg-gray-100  dark:hover:bg-gray-700">Role</a>
                            </li>

                        </ul>
                    </li>
                @endif
            @endauth

        </ul>
        {{-- Emergency logout --}}
        {{-- <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        class="text-left w-full py-2 px-4 text-sm hover:text-blue-700 dark:hover:text-gray-100 dark:text-gray-400 dark:hover:text-white"
                        type="submit">Logout</button>

                </form>
            </li>
        </ul> --}}
    </div>
</aside>
