<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Lowongan</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar-Header --}}
    @include('Pengajuan.Components.headerNavbar')
    {{-- Navbar-Header-end --}}

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
                <h2 class="text-lg font-poppins font-bold"><span>Tambah Lowongan</span></h2>
                <h2 class="text-md font-poppins"><span>Tambah Lowongan sesuai dengan data yang sudah disiapkan.</span></h2>
            </div>
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                        <i class="fa-solid fa-caret-left"></i>
                        Kembali
                    </button>
                </a>
            </div>
            <form action="/admin/kakom/lowongan/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        <span class="font-poppins font-semibold">Lowongan & Perusahaan</span>
                        <div class="flex w-full">
                            <div class="mt-1 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Perusahaan</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_perusahaan">
                                            @foreach ($perusahaan as $item)
                                            <option value="{{$item->id_perusahaan}}">{{$item->nama_perusahaan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jumlah Siswa</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="number" name="jumlah_siswa">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Posisi</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="posisi">
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-1 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Tanggal Mulai</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="date" name="tanggal_mulai">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Tanggal Selesai</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="date" name="tanggal_selesai">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Angkatan</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_angkatan">
                                            <option disabled>Tahun Ajaran</option>
                                            @foreach ($angkatan as $item)
                                            <option value="{{$item->id_angkatan}}">{{$item->angkatan}} / {{$item->tahun_pembelajaran}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 flex items-end justify-end">
                            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-2 px-3 border border-black rounded-xl font-poppins font-semibold text-md" type="submit">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @include('Components/Footer/footer')
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

        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>
