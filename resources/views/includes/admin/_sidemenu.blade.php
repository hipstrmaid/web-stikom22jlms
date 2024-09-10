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
        <li class="flex items-center pl-10 hover:bg-gray-100  dark:hover:bg-gray-700">
            <span class="dot"></span>
            <a href="{{ route('user.tambahDosen') }}"
                class="p-2 w-full text-base font-medium   transition duration-75 group">Dosen</a>
        </li>
        <li class="flex items-center pl-10 hover:bg-gray-100  dark:hover:bg-gray-700">
            <span class="dot"></span>
            <a href="{{ route('user.tambahMahasiswa') }}"
                class="p-2 w-full text-base font-medium  transition duration-75 group">Mahasiswa</a>
        </li>

        <li class="flex items-center pl-10 hover:bg-gray-100  dark:hover:bg-gray-700">
            <span class="dot"></span>
            <a href="{{ route('user.tambahAdmin') }}"
                class="p-2 w-full text-base font-medium  transition duration-75 group">Admin</a>
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
