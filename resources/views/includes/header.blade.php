<nav
    class="bg-brown-bg text-white drop-shadow-md px-4 py-2.5 dark:bg-gray-800 sm:dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-3 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-900 focus:bg-gray-900 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-900 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <i class="fa-solid fa-bars text-gray-50"></i>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="#" class="flex items-center justify-between mr-4">
                <img src="{{ asset('assets/img/stikom-logo.png') }}" class="mr-3 sm:h-12 h-8 hidden sm:block"
                    alt="STIKOM Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">STIKOM 22
                    J-LMS</span>
            </a>

        </div>
        <div class="flex items-center lg:order-2 gap-2">
            @include('includes/_dark-mode')
            @auth
                <button type="button"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>

                    @if (Auth::user()->dosen)
                        @isset(Auth::user()->dosen->foto)
                            <img class="w-8 h-8 rounded-full" src="{{ Storage::url(Auth::user()->dosen->foto) }}"
                                alt="Foto dosen">
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                        @endisset
                    @elseif (Auth::user()->mahasiswa)
                        @isset(Auth::user()->mahasiswa->foto)
                            <img class="w-8 h-8 rounded-full" src="{{ Storage::url(Auth::user()->mahasiswa->foto) }}"
                                alt="Foto mahasiswa">
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                        @endisset
                    @elseif (Auth::user()->admin)
                        @isset(Auth::user()->admin->foto)
                            <img class="w-8 h-8 rounded-full" src="{{ Storage::url(Auth::user()->admin->foto) }}"
                                alt="Foto admin">
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="Default Foto">
                        @endisset
                    @endif


                </button>
                <!-- Mini iProfile Menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded rounded-md divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        @if (Auth::user()->dosen)
                            <span
                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->dosen->nama }}</span>
                            <span
                                class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->dosen->nidn }}</span>
                        @elseif (Auth::user()->mahasiswa)
                            <span
                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->mahasiswa->nama }}</span>
                            <span
                                class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->mahasiswa->nim }}</span>
                        @elseif (Auth::user()->admin)
                            <span
                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->admin->nama }}</span>
                            <span
                                class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->admin->nidn }}</span>
                        @else
                            <span class="block text-sm font-semibold text-gray-900 dark:text-white">Super Admin</span>
                        @endif
                    </div>

                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('edit-profile') }}"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Profile
                            </a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="/user/preferences"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Settings
                            </a>
                        </li>
                    </ul>

                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button
                                    class="text-left w-full py-2 px-4 text-sm hover:text-red-500 hover:font-bold dark:hover:text-gray-100 dark:text-gray-400 dark:hover:text-white"
                                    type="submit">Logout</button>

                            </form>
                        </li>
                    </ul>

                    {{-- @if (Auth::user()->role_id == 4)
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="{{ route('admin.index') }}"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Admin</a>
                            </li>
                        </ul>
                    @endif --}}
                </div>
            @endauth
            @guest
                <a href="/login"><button type="button"
                        class="text-gray-900 bg-brown-button hover:bg-brown-10 hover:text-gray-900 dark:bg-blue-600 dark:text-gray-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-gray-800"><i
                            class="fa-solid fa-user mr-2"></i>Login
                    </button></a>

            @endguest

        </div>
    </div>
</nav>
