<nav
    class="bg-brown-bg text-white drop-shadow-md px-4 py-2.5 dark:bg-gray-800 sm:dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-3 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-yellow-900 focus:bg-yellow-900 dark:focus:bg-gray-700 focus:ring-2 focus:ring-yellow-900 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <i class="fa-solid fa-bars text-gray-50"></i>
            </button>
            <img src="{{ asset('assets/img/stikom-logo.webp') }}" class="mr-3 hidden sm:block" alt="STIKOM Logo"
                width="48" height="48">

            <span class="self-center text-1xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">STIKOM 22
                Januari <br>
                <p class="self-center text-sm md:text-2xl md:hidden font-semibold whitespace-nowrap dark:text-white">
                    Learning
                    Management System</p>
            </span>

            </a>

        </div>
        <div class="flex items-center lg:order-2 gap-2">
            @include('includes._dark-mode')
            @auth
                <button type="button"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    @php
                        $user = Auth::user();
                        $profileTypes = ['dosen', 'mahasiswa', 'admin'];
                        $fotoUrl = asset('assets/img/user.png'); // Default foto URL
                        $nama = 'Akun belum aktif.';
                        $username = '';
                        $role = '';
                        foreach ($profileTypes as $type) {
                            $profile = $user->{$type};
                            if ($profile && $profile->foto) {
                                $fotoUrl = Storage::url($profile->foto);
                                $nama = $profile->nama;
                                $username = $profile->user->username;
                                $role = $profile->user->role->nama_role;
                                break; // Stop checking once a foto is found
                            }
                        }
                        
                    @endphp

                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $fotoUrl }}" alt="User Foto">

                </button>
                <!-- Mini iProfile Menu -->
                {{-- w-52 --}}
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded rounded-md divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ $nama }}</span>
                        <span class="block text-sm text-gray-900 dark:text-white">{{ $username }}</span>
                        <span class="block text-sm text-gray-900 dark:text-white">{{ $role }}</span>
                    </div>


                    {{-- <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <button id="theme-toggle" type="button"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 hover:font-bold dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline-none">
                                <i id="theme-toggle-dark-icon" class="fas fa-moon hidden mr-2"></i>
                                <i id="theme-toggle-light-icon" class="fas fa-sun hidden mr-2"></i>
                                Toggle Dark Mode
                            </button>
                        </li>
                    </ul> --}}

                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('edit-profile') }}"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 hover:font-bold dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"><i
                                    class="fas fa-user mr-2"></i>
                                Profil
                            </a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="/user/preferences"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 hover:font-bold dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"><i
                                    class="fas fa-cog mr-2"></i>
                                Pengaturan
                            </a>
                        </li>
                    </ul>

                    <ul class="py-1 text-gray-700 dark:text-gray-300 hover:bg-red-500 hover:rounded-b-md"
                        aria-labelledby="dropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button
                                    class="text-left w-full text-sm py-2 px-4 hover:text-white hover:font-bold dark:hover:text-gray-100 dark:text-gray-400 dark:hover:text-white"
                                    type="submit"><i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout</button>

                            </form>
                        </li>
                    </ul>
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
