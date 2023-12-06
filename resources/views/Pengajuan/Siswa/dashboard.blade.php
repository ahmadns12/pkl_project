<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Siswa</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>
<body>
    <div class="h-full bg-white flex">
        @include('Pengajuan.Components.Sidebar.siswaSidebar')
        <div class="p-4 w-full">
            <div class="h-full w-full p-2">
                <span class="font-poppins font-bold text-xl">Dashboard Siswa</span>
                <div class="mt-4 flex w-full">
                    <a class="w-6/12" href="/siswa/lowongan">
                        <div class="p-2 border border-gray-300 rounded-lg shadow-lg mr-4 flex bg-white hover:bg-blue-400 hover:text-white transition-all ease-linear">
                            <div class="w-4/12 p-2">
                                <img class="h-44 object-contain" src="{{asset('img/infopkl.png')}}" alt="">
                            </div>
                            <div class="w-8/12 text-center flex flex-col justify-center items-center px-3">
                                <span class="text-xl font-bold font-poppins">Informasi Lowongan PKL</span>
                                <span class="font-poppins mt-2">Beberapa informasi lowongan PKL terbaru sesuai jurusan.</span>
                            </div>
                        </div>
                    </a>
                    <a class="w-6/12" href="/siswa/panduanartikel">
                        <div class="p-2 border border-gray-300 rounded-lg shadow-lg mr-4 flex bg-white hover:bg-blue-400 hover:text-white transition-all ease-linear">
                            <div class="w-4/12 p-2">
                                <img class="h-44 object-contain" src="{{asset('img/infopkl2.png')}}" alt="">
                            </div>
                            <div class="w-8/12 text-center flex flex-col justify-center items-center px-3">
                                <span class="text-xl font-bold font-poppins">Panduan PKL</span>
                                <span class="font-poppins mt-2">Panduan-panduan tentang PKL.</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-4 mt-4 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                    <span class="font-bold font-poppins text-lg mb-2">Status</span>
                    <div class="flex">
                        <div class="p-2 border border-gray-300 rounded-lg flex flex-col w-6/12">
                            <span class="font-poppins font-bold">Status Perusahaan</span>
                            <div class="flex">
                                <span class="font-poppins font-bold text-lg text-red-500">Masih dalam Pengajuan</span>
                            </div>
                        </div>
                        <div class="p-2 border border-gray-300 rounded-lg flex flex-col w-6/12 ml-2">
                            <span class="font-poppins font-bold">Status Pembimbing</span>
                            <div class="flex">
                                @if (Auth::user()->siswa->guru)
                                <span class="font-poppins font-bold text-lg text-blue-500">{{Auth::user()->siswa->guru->nama_guru}}</span>
                                @else
                                <span class="font-poppins font-bold text-lg text-red-500">Masih dalam Pengajuan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 mt-4 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                    <span class="font-bold font-poppins text-lg mb-2">Lowongan Terbaru</span>
                    <div class="p-2 border border-gray-300 rounded-lg flex w-full">
                        <div class="flex overflow-x-auto scroll-smooth">
                            @foreach($lowongan as $item)
                            <div class="w-6/12 flex-none mr-2">
                                <div class="w-full border border-gray-300 rounded-lg p-2 flex">
                                    <div class="w-4/12 rounded-s-lg border border-gray-200 overflow-hidden">
                                        <img class="object-cover h-48" src="{{asset('img/perusahaan/'. $item->perusahaan->gambar_perusahaan)}}" alt="">
                                    </div>
                                    <div class="ml-2 w-8/12 p-2 rounded-e-lg border border-gray-200">
                                        <span class="font-semibold font-poppins text-lg">{{$item->perusahaan->nama_perusahaan}}</span>
                                        <br>
                                        <span class="text-sm line-clamp-2 overflow-hidden font-poppins mt-1">{{$item->perusahaan->deskripsi}}</span>
                                        <span class="text-sm line-clamp-1 overflow-hidden font-poppins mt-1">Posisi : {{$item->posisi}}</span>
                                        <span class="text-sm line-clamp-1 overflow-hidden font-poppins">Jurusan : {{$item->jurusan->nama_jurusan}}</span>
                                        <span class="text-sm line-clamp-1 overflow-hidden font-poppins">Kuota : {{$item->jumlah_siswa}}</span>
                                        @if(Auth::user()->siswa->sudah_memilih == "0")
                                        <a href="/siswa/lowongan/detail/{{$item->id_lowongan}}">
                                            <button class="w-full text-md rounded-xl border border-gray-200 mt-1 p-1 font-poppins bg-white hover:bg-blue-400 transition-all ease-in-out text-black hover:text-white font-bold hover:shadow-lg">
                                                DETAIL
                                            </button>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('Components/Footer/footer')
            </div>
        </div>
    </div>
</body>
</html>