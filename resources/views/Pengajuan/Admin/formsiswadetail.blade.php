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
    @include('Pengajuan.Components.headerNavbar')
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
                <h2 class="text-lg font-poppins font-bold">Detail Formulir Siswa</span></h2>
                <h2 class="text-md font-poppins">Biodata lengkap formulir yang diisi siswa</span></h2>
            </div>
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                        <i class="fa-solid fa-caret-left"></i>
                        Kembali
                    </button>
                </a>
            </div>

            @if(Auth::user()->role == 'kakom')
            <form action="/admin/kakom/formsiswa/approve" method="POST">
            @endif

            @if(Auth::user()->role == 'hubin')
            <form action="/admin/hubin/formsiswa/approve" method="POST">
            @endif

            @if(Auth::user()->role == 'kurikulum')
            <form action="/admin/kurikulum/formsiswa/approve" method="POST">
            @endif
                @csrf
                <input type="hidden" name="id_formulir" value="{{ $dataformulir->id_formulir }}">
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        @if($dataformulir->siswa)
                            @foreach($dataformulir->siswa as $item)
                                <span class="font-poppins font-semibold">Biodata Siswa</span>
                                <div class="flex mt-3">
                                    <div class="w-6/12 flex border-solid border rounded-lg">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">NIS</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$item->nis}}</span>
                                        </div>
                                    </div>
                                    <div class="w-6/12 flex border-solid border rounded-lg ml-3">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">Nama Lengkap</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$item->nama_siswa}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-3">
                                    <div class="w-6/12 flex border-solid border rounded-lg">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">Alamat Siswa</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$item->alamat}}</span>
                                        </div>
                                    </div>
                                    <div class="w-6/12 flex border-solid border rounded-lg ml-3">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">No. Handphone</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$item->nomor_telepon}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-3">
                                    <div class="w-6/12 flex border-solid border rounded-lg">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">Jenis Kelamin</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">
                                                @if($item->jenis_kelamin == 'l')
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-6/12 flex border-solid border rounded-lg ml-3">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">Jurusan</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$item->jurusan->nama_jurusan}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-3 mb-3">
                                    <div class="w-6/12 flex border-solid border rounded-lg">
                                        <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins font-semibold text-black">Posisi</span>
                                        </div>
                                        <div class="w-8/12 p-2 rounded-l-lg">
                                            <span class="text-md font-poppins text-black">{{$dataformulir->lowongan->posisi}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <span class="font-poppins font-semibold">Biodata Perusahaan</span>
                        <div class="flex mt-3">
                            <div class="w-6/12 flex border-solid border rounded-lg">
                                <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                    <span class="text-md font-poppins font-semibold text-black">Nama</span>
                                </div>
                                <div class="w-8/12 p-2 rounded-l-lg">
                                    <span class="text-md font-poppins text-black">{{$dataformulir->lowongan->perusahaan->nama_perusahaan}}</span>
                                </div>
                            </div>
                            <div class="w-6/12 flex border-solid border rounded-lg ml-3">
                                <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                    <span class="text-md font-poppins font-semibold text-black">Alamat</span>
                                </div>
                                <div class="w-8/12 p-2 rounded-l-lg">
                                    <span class="text-md font-poppins text-black">{{$dataformulir->lowongan->perusahaan->alamat_perusahaan}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 flex dataformulirs-end justify-end">
                            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-2 px-3 border border-black rounded-xl font-poppins font-semibold text-md" type="submit">
                                Approved
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
    </script>
</body>

</html>
