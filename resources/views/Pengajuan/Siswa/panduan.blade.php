<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panduan & Artikel PKL</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>
<body>
    <div class="h-full bg-white flex">
        @include('Pengajuan.Components.Sidebar.siswaSidebarPanduan')
        <div class="p-4 w-full">
            <div class="w-full p-2">
                <span class="font-poppins font-bold text-xl">Panduan Siswa</span>
                <br>
                <span class="font-poppins text-lg">Daftar Panduan-panduan yang ada di aplikasi ini.</span>
                <div class="flex mt-2">
                    <a href="{{ url()->previous() }}">
                        <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                            <i class="fa-solid fa-caret-left"></i>
                            Kembali
                        </button>
                    </a>
                </div>
                <div class="flex flex-wrap pt-2">
                    @foreach ($datapanduan as $item)
                    <div class="p-2 w-1/2">
                        <div class="p-2 flex bg-white rounded-xl shadow-lg border border-gray-300">
                            <div class="w-4/12 flex justify-center items-center">
                                <img class="h-48 object-cover p-4" src="{{asset('img/logo_smk.png')}}" alt="">
                            </div>
                            <div class="w-8/12 p-2">
                                <div class="font-poppins font-bold text-lg">
                                    <span>{{$item->nama_panduan}}</span>
                                </div>
                                <div class="w-full bg-gray-300 h-[0.15rem] rounded-xl">
                                </div>
                                <div class="font-poppins text-sm mt-3 line-clamp-4">
                                    {{$item->deskripsi}}
                                </div>
                                <div class="w-full mt-4 flex justify-end items-end">
                                    <a href="{{ asset('doc/' . $item->file_panduan) }}" target="_blank">
                                        <button class="mr-2 p-2 border border-black rounded-xl text-sm font-poppins hover:bg-blue-400 hover:text-white hover:border-white transition-all ease-linear">
                                            <i class="fa-solid fa-file-pdf font-bold text-lg mr-1"></i>
                                            Preview
                                        </button>
                                    </a>
                                    <a href="{{ asset('doc/' . $item->file_panduan) }}" download>
                                        <button class="p-2 border border-black rounded-xl text-sm font-poppins hover:bg-blue-400 hover:text-white hover:border-white transition-all ease-linear">
                                            <i class="fa-solid fa-circle-down"></i>
                                            Download
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @include('Components.Footer.footer')
        </div>
    </div>
</body>
</html>