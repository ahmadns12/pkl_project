<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Lowongan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>
<body>
    <div class="h-full bg-white flex">
        @include('Pengajuan.Components.Sidebar.siswaSidebarLowongan')
        <div class="p-4 w-full">
            <div class="h-full w-full p-2">
                <form action="/siswa/lowongan/ajukan" method="POST">
                    @csrf
                    <span class="font-poppins font-bold text-xl">Detail Lowongan Siswa</span>
                    <br>
                    <span class="font-poppins text-lg">Detail mengenai perusahaan & lowongannya.</span>
                    <div class="flex mt-2">
                        <a href="{{ url()->previous() }}">
                            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                                <i class="fa-solid fa-caret-left"></i>
                                Kembali
                            </button>
                        </a>
                    </div>
                    <div class="pr-4 pl-2 mt-4 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                        <div class="flex mb-2 pt-2 w-full">
                            <div class="p-2 pt-0 pb-0 w-full">
                                <div class="overflow-hidden border border-gray-300 rounded-lg flex flex-col w-full m-2">
                                    <span class="p-2 font-poppins font-bold text-lg">Detail Perusahaan</span>
                                    <div class="h-[0.1rem] 1 bg-gray-200"></div>
                                    <div class="p-2">
                                        <div class="flex">
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-4/12">
                                                <img class="w-full h-[15.6rem] object-cover" src="{{asset('img/perusahaan/'. $lowongan->perusahaan->gambar_perusahaan)}}" alt="">
                                            </div>
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-4/12 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">Nama Perusahaan</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->perusahaan->nama_perusahaan}}" disabled>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="font-bold font-poppins">Contact Person</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->perusahaan->contact_person}}" disabled>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="font-bold font-poppins">Alamat Perusahaan</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->perusahaan->alamat_perusahaan}}" disabled>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-4/12 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">Deskripsi Perusahaan</span>
                                                    <textarea class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" disabled name="" id="" cols="30" rows="7">{{$lowongan->perusahaan->deskripsi}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden border border-gray-300 rounded-lg flex flex-col w-full m-2">
                                    <span class="p-2 font-poppins font-bold text-lg">Detail Lowongan</span>
                                    <div class="h-[0.1rem] 1 bg-gray-200"></div>
                                    <div class="p-2">
                                        <div class="flex">
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-1/2 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">Jumlah Siswa</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->jumlah_siswa}}" disabled>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="font-bold font-poppins">Jurusan</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->jurusan}}" disabled>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="font-bold font-poppins">Posisi</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->posisi}}" disabled>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-1/2 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">Tanggal Mulai</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->tanggal_mulai}}" disabled>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="font-bold font-poppins">Tanggal Selesai</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="text" name="" id="" value="{{$lowongan->tanggal_selesai}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden border border-gray-300 rounded-lg flex flex-col w-full m-2 hidden">
                                    <span class="p-2 font-poppins font-bold text-lg">ID</span>
                                    <div class="h-[0.1rem] 1 bg-gray-200"></div>
                                    <div class="p-2">
                                        <div class="flex">
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-1/2 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">ID Anda</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="hidden" name="id_siswa" id="id_siswa" value="{{Auth::user()->id_siswa}}">
                                                </div>
                                            </div>
                                            <div class="overflow-hidden rounded-xl border border-gray-200 w-1/2 ml-2 p-4 flex flex-col">
                                                <div>
                                                    <span class="font-bold font-poppins">ID Lowongan</span>
                                                    <input class="w-full p-2 border border-gray-300 rounded-lg font-poppins font-medium" type="hidden" name="id_lowongan" id="" value="{{$lowongan->id_lowongan}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex dataformulirs-end justify-end mb-3">
                            <button class="bg-white hover:bg-blue-400 text-black hover:text-white transition ease-linear py-2 px-3 border border-gray-300 rounded-xl font-poppins font-semibold text-md" type="submit">
                                Ajukan
                            </button>
                        </div>
                    </div>
                </form>
                @include('Components/Footer/footer')
            </div>
        </div>
    </div>
</body>
</html>