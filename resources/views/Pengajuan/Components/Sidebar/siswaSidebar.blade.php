<div class="w-[3.35rem] sidebar hover:w-[17rem]">
    <div class="sidebar min-h-screen w-[3.35rem] overflow-hidden border-r hover:w-56 hover:bg-white hover:shadow-lg fixed">
        <div class="flex h-screen flex-col justify-between pt-2 pb-6">
            <div>
            <div class="w-max p-3 flex">
                <div class="flex justify-center items-center">
                    <img class="w-8" src="{{asset('img/logo_baru.png')}}" alt="">
                </div>
                <div class="ml-2 flex flex-col">
                    <span class="font-bold font-poppins text-md">Pengajuan PKL</span>
                    <span class="text-sm font-poppins">SMK Negeri 1 Cimahi</span>
                </div>
            </div>
            <ul class="mt-2 space-y-2 tracking-wide">
                <li class="min-w-max">
                    <a href="#" aria-label="dashboard" class="relative flex items-center space-x-4 bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white">
                        <i class="fa-solid fa-bars w-5 h-5 text-center pt-[0.1rem]"></i>
                        <span class="-mr-1 font-medium font-poppins ">Dashboard</span>
                    </a>
                </li>
                <li class="min-w-max">
                <a href="/siswa/lowongan" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-gray-600">
                    <i class="fa-solid fa-building-circle-exclamation text-center pt-[0.1rem] pl-[0.15rem] h-5 w-5 text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700 font-poppins">Lowongan</span>
                </a>
                </li>
                <li class="min-w-max">
                <a href="/siswa/panduanartikel" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                    <i class="fa-solid fa-book text-center pt-[0.1rem] pl-[0.15rem] h-5 w-5 text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700 font-poppins line-clamp-1">Panduan</span>
                </a>
                </li>
            </ul>
            </div>
            <div class="w-max -mb-3">
                <a href="/siswa/profil" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                    <i class="fa-solid fa-circle-user text-center pt-[0.1rem] pl-[0.15rem] h-5 w-5 text-gray-600 group-hover:text-cyan-600"></i>
                    <span class="group-hover:text-gray-700 font-poppins">User</span>
                </a>
                <a href="/logout" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="group-hover:text-gray-700 font-poppins">Logout</span>
                </a>
            </div>
        </div>
    </div>
</div>