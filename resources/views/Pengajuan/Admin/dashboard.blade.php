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
                <h2 class="text-xl font-bold font-poppins">Dashboard <span>{{Auth::user()->role}}</span></h2>
                <span class="font-poppins">Daftar terbaru siswa yang mengajukan formulir.</span>
                <ul>
                    @if (Auth::user()->role == "hubin")
                        
                    @endif
                    @if (Auth::user()->role == "kurikulum")
                        
                    @endif
                    @if (Auth::user()->role == "kakom")
                        
                    @endif
                    @if (Auth::user()->role == "superadmin")
                        
                    @endif
                </ul>
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        @foreach ($formulir as $item)
                        <div class="flex justify-between border border-gray-300 p-3 rounded-xl w-full mb-2">
                            <div class="w-3/12 font-poppins font-semibold text-center line-clamp-1 overflow-hidden">
                                {{$item->siswa->nama_siswa}}
                            </div>
                            <div class="flex justify-center items-center w-3/12 font-poppins font-semibold text-gray-400 text-center">
                                {{$item->perusahaan->nama_perusahaan}}
                            </div>
                            <div class="flex justify-center items-center w-3/12 font-poppins font-semibold text-center">
                                Pembimbing
                            </div>
                            <div class="flex justify-center items-center w-3/12 font-poppins font-semibold text-gray-400 text-center">
                                {{$item->created_at}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-full flex flex-col">
                        <div class="flex">
                            <div class="relative flex flex-col shadow-lg rounded-lg p-4 w-6/12 mr-3">
                                <span class="font-semibold font-poppins text-gray-400">Total siswa yang mengajukan</span>
                                <span class="font-bold font-poppins text-3xl">{{$siswaPengajuan}}</span>
                                <div class="w-full flex justify-end">
                                    @if(Auth::user()->role == 'kakom')
                                    <a href="/admin/kakom/daftarsiswa">
                                    @else
                                    <a href=""></a>
                                    @endif
                                        <span class="p-2 border border-blue-500 text-blue-500 font-poppins font-semibold rounded-xl text-sm hover:bg-blue-500 hover:text-white transition ease-linear">
                                            Lebih Detail
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="relative flex flex-col shadow-lg rounded-lg p-4 w-6/12 mr-3">
                                <span class="font-semibold font-poppins text-gray-400">Total siswa yang monitoring</span>
                                <span class="font-bold font-poppins text-3xl">{{$siswaMonitoring}}</span>
                                <div class="w-full flex justify-end">
                                    @if(Auth::user()->role == 'kakom')
                                    <a href="/admin/kakom/daftarsiswa">
                                    @else
                                    <a href=""></a>
                                    @endif
                                        <span class="p-2 border border-blue-500 text-blue-500 font-poppins font-semibold rounded-xl text-sm hover:bg-blue-500 hover:text-white transition ease-linear">
                                            Lebih Detail
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col shadow-lg rounded-lg p-4 w-4/12 bg-[#7091F5]">
                        <span class="font-semibold font-poppins text-white">Guru Pembimbing</span>
                        @foreach ($pembimbing as $item)
                        <div class="w-full bg-white p-2 rounded-xl mt-2 flex justify-center items-center">
                            <i class="fa-solid fa-user mr-4 flex justify-center items-center"></i>
                            <span class="font-poppins font-semibold line-clamp-1 overflow-hidden">{{$item->guru->nama_guru}}</span>
                        </div>
                        @endforeach
                        @if(Auth::user()->role == 'kakom')
                        <a href="/admin/kakom/akunpembimbing">
                        @else
                        <a href=""></a>
                        @endif
                            <div class="w-full border border-black p-2 font-poppins font-bold shadow-lg rounded-xl mt-2 flex justify-center items-center hover:bg-white hover:border-white hover:text-[#7091F5] transition ease-linear">
                                LIHAT LEBIH
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
