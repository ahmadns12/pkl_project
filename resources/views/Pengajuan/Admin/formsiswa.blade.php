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
                    <h2 class="text-lg font-poppins font-bold"><span>Daftar Formulir Siswa</span></h2>
                    <h2 class="text-md font-poppins"><span>Formulir-formulir siswa yang mendaftar PKL.</span></h2>
                    @if(Auth::user()->role == 'hubin')
                    <h2 class="text-md font-poppins italic text-gray-400">Note: Jika data kosong atau tidak seusai jumlah formulir maka formulir-formulir tersebut belum di approve oleh Kakom</h2>
                    @endif

                    @if(Auth::user()->role == 'kurikulum')
                    <h2 class="text-md font-poppins italic text-gray-400">Note: Jika data kosong atau tidak seusai jumlah formulir maka formulir-formulir tersebut belum di approve oleh Hubin</h2>
                    @endif
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
                <div class="flex">
                    
                    <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4 mr-4">
                        <span class="font-poppins font-semibold text-gray-500">Total Formulir Siswa</span>
                        <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $totalFormulirSiswa }}</span>
                    </div>
                    
                    <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4 mr-4">
                        <span class="font-poppins font-semibold text-gray-500">Belum di Approve</span>
                        <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $belumDiApproveKakom }}</span>
                    </div>
                    
                    <div class="w-3/12 relative flex flex-col shadow-lg mb-6 rounded-lg p-4 mr-4">
                        <span class="font-poppins font-semibold text-gray-500">Sudah di Approve</span>
                        <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{ $sudahDiApproveKakom }}</span>
                    </div>
                    
                </div>
                <div>
                    @if(Auth::user()->role=='kakom')
                    <div class="w-2/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 hover:bg-[#8AA7FF] transition ease-linear font-poppins font-semibold text-gray-500 hover:text-white cursor-pointer text-center"  onclick="window.location='{{ route('tambahFormulirKakom') }}'">
                        Tambah
                        <i class="fa-solid fa-plus w-full h-full flex justify-center items-center text-2xl"></i>
                    </div>
                    @endif
                </div>
                <div class="relative flex flex-col shadow-lg rounded-lg p-4">
                    {{-- Search --}}
                    <div class="p-2 mb-2">
                        <label for="search" class="font-poppins font-semibold text-gray-500">Cari Formulir siswa:</label>
                        <input type="text" id="search" class="w-full p-2 border border-gray-300 border-solid rounded-lg outline-none font-poppins" placeholder="Nama siswa...">
                    </div>
                    {{-- Search-end --}}
                    <div class="block bg-transparent w-full overflow-x-auto">
                        <table class="w-full mt-2">
                            <thead>
                                <tr class="border border-solid border-l-0 border-r-0">
                                    <th class="text-md px-4 py-3 font-poppins">ID</th>
                                    <th class="text-md px-6 py-3 font-poppins">Daftar Siswa</th>
                                    <th class="text-md px-6 py-3 font-poppins">Perusahaan</th>
                                    <th class="text-md px-6 py-3 font-poppins">Posisi</th>
                                    @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hubin' || Auth::user()->role == 'kurikulum')
                                    <th class="text-md px-6 py-3 font-poppins">Jurusan</th>
                                    @endif
                                    <th class="text-md px-6 py-3 font-poppins">
                                        Approve
                                        @if(Auth::user()->role == 'superadmin')
                                        Kakom
                                        @endif
                                    </th>
                                    @if(Auth::user()->role == 'kakom')
                                    <th class="text-md px-6 py-3 font-poppins">Action</th>
                                    @endif
                                    <th class="text-md px-6 py-3 font-poppins">Tanggal Buat</th>
                                </tr>
                            </thead>
                            <tbody class="container-formsiswa">
                                @foreach ($dataformulir as $item)

                                @if(Auth::user()->role == 'kakom' || Auth::user()->role == 'hubin' || Auth::user()->role == 'kurikulum' || Auth::user()->role == 'superadmin')
                                <tr class="border border-solid rounded-lg text-center">
                                    <td class="text-md px-4 py-3 font-poppins">{{$item->id_formulir}}</i></td>
                                    <td class="text-md font-semibold px-6 py-3 font-poppins">
                                        @if($item->siswa->isNotEmpty())
                                            @foreach($item->siswa as $siswa)
                                                {{$siswa->nama_siswa}}<br>
                                            @endforeach
                                        @else
                                            <span class="text-red-500">Error, data tidak ada di formulir ini lagi!</span>
                                        @endif
                                    </td>                                    
                                    <td class="text-md px-6 py-3 font-poppins">{{$item->lowongan->perusahaan->nama_perusahaan}}</td>
                                    <td class="text-md px-6 py-3 font-poppins">{{$item->lowongan->posisi}}</td>
                                    @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hubin' || Auth::user()->role == 'kurikulum')
                                    <td class="text-md px-6 py-3 font-poppins">{{$item->jurusan->nama_jurusan}}</td>
                                    @endif
                                    @if(Auth::user()->role == 'kakom')
                                    <td class="text-lg px-6 py-3">
                                        @if ($item->approve_kakom == 1)
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
                                    @endif

                                    @if(Auth::user()->role == 'hubin')
                                    <td class="text-lg px-6 py-3">
                                        @if ($item->approve_kakom == 1)
                                            <i class="fa-regular fa-square-check"></i>
                                        @else
                                            <i class="fa-regular fa-square"></i>
                                        @endif
                                    </td>
                                    @endif

                                    @if(Auth::user()->role == 'kurikulum')
                                    <td class="text-lg px-6 py-3">
                                        @if ($item->approve_kakom == 1)
                                            <i class="fa-regular fa-square-check"></i>
                                        @else
                                            <i class="fa-regular fa-square"></i>
                                        @endif
                                    </td>
                                    @endif

                                    @if(Auth::user()->role == 'superadmin')
                                    <td class="text-lg px-6 py-3">
                                        @if ($item->approve_kakom == 1)
                                            <i class="fa-regular fa-square-check"></i>
                                        @else
                                            <i class="fa-regular fa-square"></i>
                                        @endif
                                    </td>
                                    @endif
                                    <td class="text-md px-6 py-3 font-poppins">{{$item->created_at}}</td>
                                </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{ $dataformulir->links('pagination::tailwind') }}
                </div>
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

        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search");

            searchInput.addEventListener("input", function () {
                const searchTerm = searchInput.value.toLowerCase();

                $.ajax({
                    url: '/admin/cari-formsiswa',
                    type: 'GET',
                    data: { search: searchTerm },
                    success: function (data) {
                        document.querySelector('.container-formsiswa').innerHTML = data;
                    }
                });
            });
        });
    </script>
</body>

</html>
