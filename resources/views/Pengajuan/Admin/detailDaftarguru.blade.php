<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview Guru</title>
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
                <h2 class="text-lg font-poppins font-bold"><span>Preview Guru</span></h2>
                <h2 class="text-md font-poppins"><span>Preview guru sesuai dengan data yang sudah dimasukkan sebelumnya.</span></h2>
            </div>
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                        <i class="fa-solid fa-caret-left"></i>
                        Kembali
                    </button>
                </a>
            </div>
            @foreach ($guru as $guru)
            <form>
                @csrf
                <input type="hidden" name="id_guru" value="{{$guru->id_guru}}">
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        <span class="font-poppins font-semibold">Guru</span>
                        <div class="flex w-full">
                            <div class="mt-3 w-1/2">
                                <div class="w-full flex flex-col rounded-lg border border-solid">
                                    <div class="w-full bg-gray-200 p-2 rounded-t-lg">
                                        <span class="w-full flex justify-center text-md font-poppins font-semibold text-black">Foto (Opsional)</span>
                                    </div>
                                    <div class="w-full rounded-b-lg h-64 p-2">
                                        <div class="w-full flex justify-center items-center">
                                            <img class="mt-2 h-48" id="output" src="{{asset('img/guru/'.$guru->gambar_guru)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Username</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nis" value="{{ $guru->user ? $guru->user->username : 'Belum memiliki akun' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-1 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">NIK</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nis"  value="{{$guru->nik}}" disabled>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">NIP</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nip" value="{{$guru->nip}}" disabled>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nama</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="Nama" value="{{$guru->nama_guru}}" disabled>
                                    </div> 
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jenis Kelamin</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="jenis_kelamin">
                                            @if($guru->jenis_kelamin == 'l')
                                                <option value="l">Laki-Laki</option>
                                            @endif
                                            @if($guru->jenis_kelamin == 'p')
                                                <option value="p">Perempuan</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>                                
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jurusan</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        @if ($guru->jurusan)
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="jurusan" value="{{$guru->jurusan->nama_jurusan}}" disabled>
                                        @else
                                        <input class="h-full w-full outline-none font-poppins font-bold" type="text" name="jurusan" value="Tidak memiliki jurusan / NA" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jabatan</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="jabatan" value="{{$guru->jabatan}}" disabled>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Siswa</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg font-bold font-poppins">
                                        @if ($guru->siswa->isNotEmpty())
                                        @foreach($guru->siswa as $siswa)
                                            <span>{{ ucfirst($siswa->nama_siswa) }};</span>
                                        @endforeach
                                        @else
                                            <span class="text-red-400">-</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
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
