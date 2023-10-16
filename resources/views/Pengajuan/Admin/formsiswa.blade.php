<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Siswa</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar Header --}}
    <nav
        class="font-poppins fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleDrawer" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ml-2 md:mr-24">
                        <img src="{{ asset('img/logo_smk.png') }}" class="h-8 mr-3" alt="Logo Brand" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PKL
                            Skuy</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar Header-end --}}

    {{-- Sidebar --}}
    @if (Auth::user()->role == 'hubin')
        @include('Pengajuan.Components.Sidebar.hubinSidebar')
    @endif
    @if (Auth::user()->role == 'kakom')
        @include('Pengajuan.Components.Sidebar.kakomSidebar')
    @endif
    @if (Auth::user()->role == 'kurikulum')
        @include('Pengajuan.Components.Sidebar.kurikulumSidebar ')
    @endif
    @if (Auth::user()->role == 'superadmin')
        @include('Pengajuan.Components.Sidebar.superadminSidebar ')
    @endif
    {{-- Sidebar-end --}}

    {{-- Content-end --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <div class="p-2">
                <h2 class="text-lg font-poppins font-bold"><span>Daftar Formulir Siswa</span></h2>
                <h2 class="text-md font-poppins"><span>Formulir-formulir siswa yang mendaftar PKL.</span></h2>
                @if (session('success'))
                    <h2 class="text-md font-poppins text-green-600 font-bold">
                        <span>
                            {{session('success')}}
                        </span>
                    </h2>
                @endif
                @if (session('error'))
                    <h2 class="text-md font-poppins text-red-600 font-bold">
                        <span>
                            {{session('error')}}
                        </span>
                    </h2>
                @endif
            </div>
            <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                <div class="block bg-transparent w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border border-solid border-l-0 border-r-0">
                                <th class="text-md px-4 py-3 font-poppins"></th>
                                <th class="text-md px-6 py-3 font-poppins">NIS</th>
                                <th class="text-md px-6 py-3 font-poppins">Nama Siswa</th>
                                <th class="text-md px-6 py-3 font-poppins">Perusahaan</th>
                                <th class="text-md px-6 py-3 font-poppins">Approve</th>
                                <th class="text-md px-6 py-3 font-poppins">Action</th>
                                <th class="text-md px-6 py-3 font-poppins">Tanggal Buat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataformulir as $item)
                            <tr class="border border-solid rounded-lg text-center">
                                <td class="text-md px-4 py-3 font-poppins"><i class="fa-solid fa-circle-user"></i></td>
                                <td class="text-md px-6 py-3 font-poppins">{{$item->nis}}</td>
                                <td class="text-md font-semibold px-6 py-3 font-poppins">{{$item->nama_lengkap}}</td>
                                <td class="text-md px-6 py-3 font-poppins">{{$item->nama_perusahaan}}</td>
                                <td class="text-lg px-6 py-3">
                                    @if ($item->approve_kakom === 1)
                                        <i class="fa-regular fa-square-check"></i>
                                    @else
                                        <i class="fa-regular fa-square"></i>
                                    @endif
                                </td>                         
                                <td class="text-md px-6 py-3 font-poppins">
                                    <a href="/admin/kakom/formsiswa/detail/{{$item->id_formulir}}">
                                        <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-sm">
                                            Approve
                                        </button>
                                    </a>
                                </td>
                                <td class="text-md px-6 py-3 font-poppins">{{$item->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @php
                $totalFormulirSiswa = count($dataformulir);
                $belumDiApprove = 0;
                $sudahDiApprove = 0;
                
                foreach ($dataformulir as $item) {
                    if ($item->approve_kakom == 0) {
                        $belumDiApprove++;
                    } else {
                        $sudahDiApprove++;
                    }
                }
            @endphp

            <div class="flex">
                <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4 mr-4">
                    <span class="font-poppins font-semibold text-gray-500">Total Formulir Siswa</span>
                    <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $totalFormulirSiswa }}</span>
                </div>
                
                <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4 mr-4">
                    <span class="font-poppins font-semibold text-gray-500">Belum di Approve</span>
                    <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $belumDiApprove }}</span>
                </div>
                
                <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <span class="font-poppins font-semibold text-gray-500">Sudah di Approve</span>
                    <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $sudahDiApprove }}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- Content-end --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleDrawer').click(function() {
                $('#logo-sidebar').toggleClass(
                    'translate-x-0'); // Mengganti class CSS untuk menggeser drawer
            });
        });
    </script>
</body>

</html>
