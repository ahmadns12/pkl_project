<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Formulir</title>
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
                <h2 class="text-lg font-poppins font-bold"><span>Tambah Form Siswa</span></h2>
                <h2 class="text-md font-poppins"><span>Tambah form siswa sesuai dengan siswa yang sudah ada.</span></h2>
            </div>
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                        <i class="fa-solid fa-caret-left"></i>
                        Kembali
                    </button>
                </a>
            </div>
            @if(Auth::user()->role=='kakom')
            <form action="/admin/kakom/formsiswa/store" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                <input type="hidden" name="id">
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        <span class="font-poppins font-semibold">Form Siswa</span>
                        <div class="flex w-full">
                            <div class="mt-3 w-4/12">
                                <div class="w-full flex flex-col rounded-lg border border-solid">
                                    <div class="w-full bg-gray-200 p-2 rounded-t-lg">
                                        <span class="w-full flex justify-center text-md font-poppins font-semibold text-black">Pilih Siswa</span>
                                    </div>
                                    <div class="w-full rounded-b-lg h-fit p-2 font-poppins">
                                        @foreach ($siswa as $item)
                                            
                                        <div class="flex">
                                            <div class="flex items-center h-5">
                                                <input id="helper-checkbox-{{$item->id_siswa}}" aria-describedby="helper-checkbox-text-{{$item->id_siswa}}" type="checkbox" name="siswa[]" value="{{$item->id_siswa}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-checkbox-{{$item->id_siswa}}" class="font-medium text-gray-900 dark:text-gray-300">{{$item->nama_siswa}}</label>
                                                <p id="helper-checkbox-text-{{$item->id_siswa}}" class="text-xs font-normal text-gray-500 dark:text-gray-300">NIS : {{$item->nis}}</p>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-1 w-8/12">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Pilih Lowongan</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_lowongan">
                                            @foreach ($lowongan as $item)
                                            <option value="{{$item->id_lowongan}}">{{$item->perusahaan->nama_perusahaan}}</option>
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
