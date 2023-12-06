<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar Header --}}
    @include('Pengajuan.Components.headerNavbar')
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
            <div class="p-2">
                <h2 class="text-lg font-poppins font-bold"><span>Daftar Akun</span></h2>
                <h2 class="text-md font-poppins"><span>Jenis akun-akun yang sudah disiapkan serta beberapa isinya yang sudah dimasukkan sebelumnya.</span></h2>
            </div>
            <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                <div class="flex">
                    <div class="w-4/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 bg-blue-500">
                        <span class="font-poppins font-semibold text-white">Akun Siswa</span>
                        <span class="font-poppins text-sm text-white">Beberapa daftar akun siswa yang sudah dimasukkan sebelumnya sesuai dengan data siswa.</span>
                        <a class="mt-8" href="/admin/superadmin/akunsiswa">
                            <div class="p-2 border rounded-lg border-white font-poppins font-bold flex justify-center items-center bg-blue-500 hover:bg-white text-white hover:text-blue-500 transition ease-linear">
                                Lihat
                            </div>
                        </a>
                    </div>
                    
                    <div class="w-4/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 bg-blue-500">
                        <span class="font-poppins font-semibold text-white">Akun Pembimbing</span>
                        <span class="font-poppins text-sm text-white">Beberapa daftar akun pembimbing yang sudah dimasukkan sebelumnya sesuai dengan data guru.</span>
                        <a class="mt-8" href="/admin/superadmin/akunpembimbing">
                            <div class="p-2 border rounded-lg border-white font-poppins font-bold flex justify-center items-center bg-blue-500 hover:bg-white text-white hover:text-blue-500 transition ease-linear">
                                Lihat
                            </div>
                        </a>
                    </div>

                    <div class="w-4/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 bg-blue-500">
                        <span class="font-poppins font-semibold text-white">Akun Kakom</span>
                        <span class="font-poppins text-sm text-white">Beberapa daftar akun Kakom yang sudah dibuat sebelumnya sesuai dengan data guru.</span>
                        <a class="mt-8" href="/admin/superadmin/akunkakom">
                            <div class="p-2 border rounded-lg border-white font-poppins font-bold flex justify-center items-center bg-blue-500 hover:bg-white text-white hover:text-blue-500 transition ease-linear">
                                Lihat
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex mt-2">
                    <div class="w-4/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 bg-blue-500">
                        <span class="font-poppins font-semibold text-white">Akun Hubin</span>
                        <span class="font-poppins text-sm text-white">Beberapa daftar akun Hubin yang sudah dibuat sebelumnya.</span>
                        <a class="mt-8" href="/admin/superadmin/akunhubin">
                            <div class="p-2 border rounded-lg border-white font-poppins font-bold flex justify-center items-center bg-blue-500 hover:bg-white text-white hover:text-blue-500 transition ease-linear">
                                Lihat
                            </div>
                        </a>
                    </div>
                    <div class="w-4/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 bg-blue-500">
                        <span class="font-poppins font-semibold text-white">Akun Kurikulum</span>
                        <span class="font-poppins text-sm text-white">Beberapa daftar akun Kurikulum yang sudah dibuat sebelumnya.</span>
                        <a class="mt-8" href="/admin/superadmin/akunkurikulum">
                            <div class="p-2 border rounded-lg border-white font-poppins font-bold flex justify-center items-center bg-blue-500 hover:bg-white text-white hover:text-blue-500 transition ease-linear">
                                Lihat
                            </div>
                        </a>
                    </div>
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
