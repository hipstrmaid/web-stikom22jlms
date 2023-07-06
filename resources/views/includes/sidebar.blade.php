        <!-- Sidebar -->
        <aside
            class="fixed top-0 left-0 bg-gray-50 dark:bg-gray-800 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full">
                <form action="#" method="GET" class="md:hidden mb-2">
                    <label for="sidebar-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="sidebar-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search" />
                    </div>
                </form>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-900 dark:text-white dark:bg-gray-900 group">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('matkul.index') }}"
                                class="flex items-center p-2 text-base font-medium text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-900 rounded-lg dark:text-white group"><i
                                    class="fas fa-book"></i><span class="ml-3">Mata
                                    Kuliah</span></a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-base font-medium text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-900 rounded-lg dark:text-white group"><i
                                    class="fas fa-book"></i><span class="ml-3">Tugas</span></a>
                        </li>
                        <li>
                            <a href="/forum">
                                <button type="button"
                                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    <i class="fas fa-comments"></i>
                                    <span class="flex-1 ml-2 text-left whitespace-nowrap">Forum</span>
                                </button>
                            </a>
                        </li>
                    @endauth
                    <li>
                        <a href="/calendar"
                            class="flex items-center p-2 text-base font-medium text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-900 dark:text-white group">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="ml-3">Calendar</span>
                        </a>
                    </li>
                    @auth
                        @if (request()->is('admin'))
                            <hr>
                            <li>
                                <button type="button"
                                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="dropdown-pages-2" data-collapse-toggle="dropdown-pages-2">
                                    <i class="fas fa-book"></i>
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Umum</span>
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-pages-2" class="hidden py-2">
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="#"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mata
                                            Kuliah</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="#"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pertemuan</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="#"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Semester</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="#"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Materi</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="#"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Prodi</a>
                                    </li>

                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="{{ route('role.index') }}"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Role</a>
                                    </li>

                                </ul>
                            </li>
                            <hr>
                            <li>
                                <button type="button"
                                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="dropdown-pages-3" data-collapse-toggle="dropdown-pages-3">
                                    <i class="fas fa-book"></i>
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Data User</span>
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-pages-3" class="hidden py-2">
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="{{ route('user.index') }}"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="{{ route('user.indexMahasiswa') }}"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mahasiswa</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="{{ route('user.indexDosen') }}"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dosen</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="/matkul/matkul-saya"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">BAAK</a>
                                    </li>
                                    <li class="flex items-center pl-10">
                                        <span class="dot"></span>
                                        <a href="{{ route('admin.index') }}"
                                            class="p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Admin</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </aside>
