<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Jurusan</title>
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
                <h2 class="text-lg font-poppins font-bold"><span>Daftar Jurusan</span></h2>
                <h2 class="text-md font-poppins"><span>Jurusan-jurusan yang sudah terdaftar.</span></h2>
                @if (session('store'))
                    <h2 class="text-md font-poppins text-green-600 font-bold">
                        <span>
                            {{session('store')}}
                        </span>
                    </h2>
                @endif
                @if (session('update'))
                    <h2 class="text-md font-poppins text-blue-600 font-bold">
                        <span>
                            {{session('update')}}
                        </span>
                    </h2>
                @endif
                @if (session('delete'))
                    <h2 class="text-md font-poppins text-red-600 font-bold">
                        <span>
                            {{session('delete')}}
                        </span>
                    </h2>
                @endif
            </div>
            <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                {{-- Search --}}
                <div class="p-2 mb-2">
                    <label for="search" class="font-poppins font-semibold text-gray-500">Cari Jurusan:</label>
                    <input type="text" id="search" class="w-full p-2 border border-gray-300 border-solid rounded-lg outline-none font-poppins" placeholder="Jurusan...">
                </div>
                {{-- Search-end --}}
                <div class="flex flex-wrap mb-2 container-jurusan">
                    @foreach ($datajurusan as $item)
                    <div class="p-1 w-4/12 block searchItems">
                        <div class="w-full bg-gray-200 p-2 rounded-t-lg flex justify-between">
                            <div class="font-bold text-md text-gray-500 bg-gray-300 rounded-lg p-1 px-3">      
                                {{$item->id_jurusan}}
                            </div>
                        </div>

                        {{-- Card --}}
                        <div class="rounded-b-lg border border-gray-300 border-solid shadow-md p-2 flex transition ease-linear flex-col">
                            <div class="w-full p-4 border border-gray-300 border-solid rounded-lg bg-white">
                                <img src="{{asset('img/jurusan/' . $item->gambar_jurusan)}}" class="w-full h-[220px] object-cover rounded-lg">
                            </div>
                            <div class="w-full p-2 border border-gray-300 border-solid rounded-lg bg-white mt-2">
                                <div class="flex justify-center items-center font-bold font-poppins mt-2">
                                    <span>Nama Jurusan</span>
                                </div>
                                <div class="flex justify-center items-center font-poppins">
                                    <span>{{$item->nama_jurusan}}</span>
                                </div>
                                <div class="w-full flex justify-center items-center mt-2">
                                    <a href="/admin/superadmin/jurusan/edit/{{$item->id_jurusan}}">
                                        <button class="bg-blue-500 hover:bg-white border border-blue-500 p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear font-bold font-poppins pr-2">
                                            <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>Edit
                                        </button>
                                    </a>
                                    <button data-modal-target="modal-delete-{{$item->id_jurusan}}" data-modal-toggle="modal-delete-{{$item->id_jurusan}}" class="bg-red-500 hover:bg-white border border-red-500 p-1 px-2 rounded-lg text-white hover:text-red-500 transition ease-linear delete font-bold font-poppins pr-2 ml-2">
                                        <i class="fa-solid fa-trash font-bold text-lg mr-2"></i>Hapus
                                    </button>
                                    {{-- Modal Delete --}}
                                    <div id="modal-delete-{{$item->id_jurusan}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900 font-poppins">
                                                                Hapus Data
                                                            </h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500 font-poppins">
                                                                    Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <a href="/admin/superadmin/jurusan/delete/{{$item->id_jurusan}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                                        Hapus
                                                    </a>
                                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm font-poppins" data-modal-hide="modal-delete-{{$item->id_jurusan}}">
                                                        Batal                                                
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Delete-end --}}
                                </div>
                            </div>
                        </div>
                        {{-- Card-end --}}

                    </div>
                    @endforeach
                </div>
                {{ $datajurusan->links('pagination::tailwind') }}
            </div>
            
            <div class="flex">
                <div class="w-3/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4">
                    <span class="font-poppins font-semibold text-gray-500">Total Angkatan</span>
                    <span class="font-poppins font-bold text-[#8AA7FF] text-2xl p-2 text-center">{{$totaljurusan}}</span>
                </div>

                <div class="w-2/12 relative flex flex-col shadow-lg rounded-lg p-4 mr-4 hover:bg-[#8AA7FF] transition ease-linear font-poppins font-semibold text-gray-500 hover:text-white text-center cursor-pointer"  onclick="window.location='{{ route('tambahJurusan') }}'">
                    Tambah
                    <i class="fa-solid fa-plus w-full h-full flex justify-center items-center text-2xl"></i>
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

        document.addEventListener("DOMContentLoaded", function () {
        const modalToggles = document.querySelectorAll("[data-modal-toggle]");
        const modalHides = document.querySelectorAll("[data-modal-hide]");

        modalToggles.forEach((toggle) => {
            toggle.addEventListener("click", function () {
                const modalId = this.getAttribute("data-modal-toggle");
                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.remove("hidden");
                }
            });
        });

        modalHides.forEach((hide) => {
            hide.addEventListener("click", function () {
                const modalId = this.getAttribute("data-modal-hide");
                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.remove(); // Hapus modal dari DOM
                }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search");

            searchInput.addEventListener("input", function () {
                const searchTerm = searchInput.value.toLowerCase();

                $.ajax({
                    url: '/admin/cari-jurusan',
                    type: 'GET',
                    data: { search: searchTerm },
                    success: function (data) {
                        document.querySelector('.container-jurusan').innerHTML = data;
                    }
                });
            });
        });
    </script>
</body>

</html>
