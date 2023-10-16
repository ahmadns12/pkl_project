<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(Auth::user()->role == "hubin")
        <title>Dashboard Hubin</title>
    @endif
    @if(Auth::user()->role == "kurikulum")
        <title>Dashboard Kurikulum</title>
    @endif
    @if(Auth::user()->role == "kakom")
        <title>Dashboard Ketua Kompetensi</title>
    @endif
    @if(Auth::user()->role == "superadmin")
        <title>Dashboard Super Admin</title>
    @endif
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar Header --}}
    <nav class="font-poppins fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
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
                        <img src="{{asset('img/logo_smk.png')}}" class="h-8 mr-3" alt="Logo Brand" />
                        <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PKL Skuy</span>
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
    @if(Auth::user()->role == "hubin")
        @include('Pengajuan.Components.Sidebar.hubinSidebar')
    @endif
    @if(Auth::user()->role == "kakom")
        @include('Pengajuan.Components.Sidebar.kakomSidebar')
    @endif
    @if(Auth::user()->role == "kurikulum")
        @include('Pengajuan.Components.Sidebar.kurikulumSidebar ')
    @endif
    @if(Auth::user()->role == "superadmin")
        @include('Pengajuan.Components.Sidebar.superadminSidebar ')
    @endif
    {{-- Sidebar-end --}}

    {{-- Content --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h2 class="text-xl">Halo Selamat Datang <span class="font-bold italic">{{Auth::user()->name}}</span></h2>
            <a href="/logout">logout</a>
            <ul>
                @if (Auth::user()->role == "hubin")
                    <li>Menu hubin</li>
                @endif
                @if (Auth::user()->role == "kurikulum")
                    <li>Menu kurikulum</li>
                @endif
                @if (Auth::user()->role == "kakom")
                    <li>Menu kakom</li>
                @endif
                @if (Auth::user()->role == "superadmin")
                    <li>Menu superadmin</li>
                @endif
            </ul>
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
