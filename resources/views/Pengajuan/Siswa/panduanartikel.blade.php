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
                <div class="p-4 mt-4 flex flex-col w-1/2 bg-white rounded-xl shadow-lg border border-gray-300">
                    <div class="text-lg font-poppins font-bold">
                        <span>Panduan Aplikasi PKL</span>
                    </div>
                    <div class="flex mt-2">
                        <div class="w-full flex">
                            <div class="p-2 w-full">
                                <div>
                                    <span class="font-poppins font-semibold text-lg">Panduan</span>
                                </div>
                                <div class="mt-2 font-poppins">
                                    <div>
                                        <span class="font-semibold">Total Panduan:</span>
                                        <br>
                                        <span>{{$totalPanduan}} Panduan</span>
                                    </div>
                                    <div class="mt-1">
                                        <span class="font-semibold">Paduan Terbaru:</span>
                                        <br>
                                        <span>{{$panduanTerbaru->nama_panduan}}</span>
                                    </div>
                                    <div class="mt-1 w-full flex justify-between">
                                        <div>
                                            <span class="font-semibold">Terakhir Update:</span>
                                            <br>
                                            <span>{{$panduanTerbaru->updated_at}}</span>
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <a href="/siswa/panduanartikel/panduan">
                                                <button type="submit" class="border border-gray-400 hover:bg-blue-400 p-2 rounded-xl text-gray-400 hover:text-white transition ease-linear cursor-pointer font-poppins font-semibold">
                                                    <i class="fa-solid fa-scroll"></i>
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Components.Footer.footer')
        </div>
    </div>
</body>
</html>