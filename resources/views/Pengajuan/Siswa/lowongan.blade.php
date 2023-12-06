<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Lowongan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>
<body>
    <div class="h-full bg-white flex">
        @include('Pengajuan.Components.Sidebar.siswaSidebarLowongan')
        <div class="p-4 w-full">
            <div class="h-full w-full p-2">
                <span class="font-poppins font-bold text-xl">Daftar Lowongan Siswa</span>
                <br>
                <span class="font-poppins text-lg">Silahkan Pilih Perusahaan yang akan di lamar.</span>
                @if (session('ajukan'))
                    <h2 class="text-lg font-poppins text-green-600 font-bold">
                        <span>
                            {{session('ajukan')}}
                        </span>
                    </h2>
                @endif
                <div class="pr-4 pl-2 mt-4 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                    <div class="flex flex-wrap mb-2 pt-2">
                        @foreach ($lowongan as $item)
                        <div class="p-2 pt-0 pb-0 w-6/12">
                            <div class="overflow-hidden border border-gray-300 rounded-lg flex flex-col w-full m-2">
                                <span class="p-2 font-poppins font-bold text-lg">Lowongan #{{$item->id_lowongan}}</span>
                                <div class="h-[0.1rem] 1 bg-gray-200"></div>
                                <div class="p-2">
                                    <div class="overflow-hidden rounded-xl border border-gray-200">
                                        <img class="w-full h-60 object-cover" src="{{asset('img/perusahaan/'. $item->perusahaan->gambar_perusahaan)}}" alt="">
                                    </div>
                                    <div class="rounded-xl border border-gray-200 mt-2 p-2">
                                        <div class="flex">
                                            <div class="w-1/2">
                                                <span class="font-poppins font-medium line-clamp-1">Perusahaan : {{$item->perusahaan->nama_perusahaan}}</span>
                                                <span class="font-poppins font-medium line-clamp-1">Jurusan : {{$item->jurusan->nama_jurusan}}</span>
                                            </div>
                                            <div class="w-1/2">
                                                <span class="font-poppins font-medium line-clamp-1">Posisi : {{$item->posisi}}</span>
                                                <span class="font-poppins font-medium line-clamp-1">Kuota : {{$item->jumlah_siswa}}</span>
                                            </div>
                                        </div>
                                        <div class="flex w-full mt-2">
                                            <span class="font-poppins font-medium line-clamp-2">Deskripsi : <span class="font-poppins font-normal">{{$item->perusahaan->deskripsi}}</span></span>
                                        </div>
                                        <div class="flex w-full mt-2">
                                            <div class="w-1/2 text-center">
                                                <span class="font-poppins font-bold line-clamp-1">Tanggal Mulai : {{$item->tanggal_mulai}}</span>
                                            </div>
                                            <div class="w-1/2 text-center">
                                                <span class="font-poppins font-bold line-clamp-1">Tanggal Selesai : {{$item->tanggal_selesai}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::user()->siswa->sudah_memilih == "0")
                                    <a href="/siswa/lowongan/detail/{{$item->id_lowongan}}">
                                        <button class="w-full rounded-xl border border-gray-200 mt-2 p-2 font-poppins bg-white hover:bg-blue-400 transition-all ease-in-out text-black hover:text-white font-bold hover:shadow-lg">
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
                @include('Components/Footer/footer')
            </div>
        </div>
    </div>
</body>
</html>