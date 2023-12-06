<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Siswa</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>
<body>
    <div class="h-full bg-white flex">
        @include('Pengajuan.Components.Sidebar.siswaSidebarProfil')
        <div class="p-4 w-full">
            <div class="w-full p-2">
                <span class="font-poppins font-bold text-xl">Profil</span>
                <br>
                <span class="font-poppins text-lg">Informasi dan biodata anda.</span>
                @if (session('update'))
                    <h2 class="text-lg font-poppins text-green-600 font-bold">
                        <span>
                            {{session('update')}}
                        </span>
                    </h2>
                @endif

                {{-- MODAL --}}

                {{-- MODAL-PROFILE --}}
                <div class="modalProfile h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
                    <div class="pr-4 pl-4 w-11/12 bg-white rounded-xl shadow-lg border border-gray-300">
                        <div class="flex flex-col mb-2 pt-4">
                            <div class="flex w-full justify-between items-center">
                                <span class="font-poppins font-bold text-xl">Profile Siswa</span>
                                <button class="border border-red-400 hover:bg-red-400 p-1 pl-2 rounded-lg text-red-400 hover:text-white transition easxhe-linear cursor-pointer close-modalProfile">
                                    <i class="fa-solid fa-xmark font-bold text-lg mr-1"></i>
                                </button>
                            </div>
                            <div class="h-[0.15rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                            <form action="/siswa/profil/update/{{Auth::user()->siswa->id_siswa}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                                <div class="flex w-full">
                                    <div class="w-2/6 p-1 flex flex-col justify-center items-center">
                                        <span class="font-poppins font-semibold text-gray-900 text-lg">Foto Profil</span>
                                        <div class="overflow-hidden rounded-lg h-80 w-[90%] mb-2 mt-1">
                                            <img id="output" src="{{asset('img/siswa/'. Auth::user()->siswa->gambar_siswa)}}" alt="" class="object-cover h-80 w-full">
                                        </div>
                                        <input class="font-poppins" type="file" name="image" onchange="loadFile(event)" value="{{asset('img/siswa/'. Auth::user()->siswa->gambar_siswa)}}">
                                    </div>
                                    <div class="w-2/6 p-1 pr-2">
                                        <div>
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Lengkap</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nama_siswa}}" name="nama_siswa">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">NIS</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nis}}" name="nis">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nomor_telepon}}" name="nomor_telepon">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Jenis Kelamin</label>
                                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" name="jenis_kelamin">
                                                <option disabled>Jenis Kelamin</option>
                                                @if(Auth::user()->siswa->jenis_kelamin == 'l')
                                                <option value="l">Laki - Laki</option>
                                                <option value="p">Perempuan</option>
                                                @endif
                                                @if(Auth::user()->siswa->jenis_kelamin == 'p')
                                                <option value="p">Perempuan</option>
                                                <option value="l">Laki - Laki</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-2/6 p-1 pl-2">
                                        <div>
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Alamat</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->alamat}}" name="alamat">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Jurusan</label>
                                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_jurusan" id="">
                                                <option disabled>Jurusan</option>
                                                <option value="{{Auth::user()->siswa->id_jurusan}}">{{Auth::user()->siswa->jurusan->nama_jurusan}}</option>
                                            </select>
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Angkatan</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->angkatan->angkatan}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="h-[0.20rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                                <div class="flex justify-end items-center w-100 p-3">
                                        <button type="submit" class="ml-2 border border-blue-400 hover:bg-blue-400 p-2 rounded-lg text-blue-400 hover:text-white transition ease-linear cursor-pointer font-poppins font-semibold">
                                            UPDATE
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- MODAL-PROFILE-END --}}

                {{-- MODAL-PROFILEDETAIL --}}
                <div class="modalProfiledetail h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
                    <div class="pr-4 pl-4 w-11/12 bg-white rounded-xl shadow-lg border border-gray-300">
                        <div class="flex flex-col mb-2 pt-4">
                            <div class="flex w-full justify-between items-center">
                                <span class="font-poppins font-bold text-xl">Informasi Lanjutan</span>
                                <button class="border border-red-400 hover:bg-red-400 p-1 pl-2 rounded-lg text-red-400 hover:text-white transition easxhe-linear cursor-pointer close-modalProfileDetail">
                                    <i class="fa-solid fa-xmark font-bold text-lg mr-1"></i>
                                </button>
                            </div>
                            <div class="h-[0.15rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                            <form action="/siswa/profil/detail/update/{{Auth::user()->siswa->siswadetail->id_siswadetail}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                                <div class="flex w-full">
                                    <div class="w-2/6 p-1 pr-2">
                                        <div>
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Bapak</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nama_bapak}}" name="nama_bapak">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp Bapak</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nomor_telepon_bapak}}" name="nomor_telepon_bapak">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Pekerjaan Bapak</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->pekerjaan_bapak}}" name="pekerjaan_bapak">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Bapak</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur_bapak}}" name="umur_bapak">
                                        </div>
                                    </div>
                                    <div class="w-2/6 p-1 pl-2 pr-2">
                                        <div>
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Ibu</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nama_ibu}}" name="nama_ibu">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp Ibu</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nomor_telepon_ibu}}" name="nomor_telepon_ibu">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Pekerjaan Ibu</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->pekerjaan_ibu}}" name="pekerjaan_ibu">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Ibu</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur_ibu}}" name="umur_ibu">
                                        </div>
                                    </div>
                                    <div class="w-2/6 p-1 pl-2">
                                        <div>
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Anda</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur}}" name="umur">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Agama Anda</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->agama}}" name="agama">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Tempat Lahir Anda</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->tempat_lahir}}" name="tempat_lahir">
                                        </div>
                                        <div class="mt-3.5">
                                            <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Tanggal Lahir Anda</label>
                                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->tanggal_lahir}}" name="tanggal_lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="h-[0.20rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                                <div class="flex justify-end items-center w-100 p-3">
                                    <button type="submit" class="ml-2 border border-blue-400 hover:bg-blue-400 p-2 rounded-lg text-blue-400 hover:text-white transition ease-linear cursor-pointer font-poppins font-semibold">
                                        UPDATE
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- MODAL-PROFILEDETAIL-END --}}
                
                {{-- MODAL-END --}}

                <div class="pr-4 pl-4 mt-4 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                    <div class="flex flex-col mb-2 pt-4">
                        <div class="flex w-full justify-between">
                            <span class="font-poppins font-bold text-xl">Profile Siswa</span>
                            <button class="border border-blue-400 hover:bg-blue-400 p-1 pl-2 rounded-lg text-blue-400 hover:text-white transition easxhe-linear cursor-pointer show-modalProfile">
                                <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>
                            </button>
                        </div>
                        <div class="h-[0.15rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                        <div class="flex w-full">
                            <div class="w-2/6 p-1 flex flex-col justify-center items-center">
                                <span class="font-poppins font-semibold text-gray-900 text-lg">Foto Profil</span>
                                <div class="overflow-hidden rounded-lg h-80 w-[90%] mb-2 mt-1">
                                    <img src="{{asset('img/siswa/'. Auth::user()->siswa->gambar_siswa)}}" alt="" class="object-cover h-80 w-full">
                                </div>
                            </div>
                            <div class="w-2/6 p-1 pr-2">
                                <div>
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Lengkap</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nama_siswa}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">NIS</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nis}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->nomor_telepon}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Jenis Kelamin</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg w-full p-2.5 font-poppins">
                                        @if(Auth::user()->siswa->jenis_kelamin == 'l')
                                        Laki-Laki
                                        @endif 
                                        @if(Auth::user()->siswa->jenis_kelamin == 'p')
                                        Perempuan
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="w-2/6 p-1 pl-2">
                                <div>
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Alamat</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->alamat}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Jurusan</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->jurusan->nama_jurusan}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Angkatan</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->angkatan->angkatan}} / {{Auth::user()->siswa->angkatan->tahun_pembelajaran}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BATAS-PROFILE --}}

                <div class="pr-4 pl-4 mt-6 flex flex-col w-full bg-white rounded-xl shadow-lg border border-gray-300">
                    <div class="flex flex-col mb-2 pt-4">
                        <div class="flex w-full justify-between">
                            <span class="font-poppins font-bold text-xl">Informasi Lebih Lanjut</span>
                            <button class="border border-blue-400 hover:bg-blue-400 p-1 pl-2 rounded-lg text-blue-400 hover:text-white transition easxhe-linear cursor-pointer show-modalProfileDetail">
                                <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>
                            </button>
                        </div>
                        <div class="h-[0.15rem] bg-gray-200 rounded-xl mb-3 mt-2"></div>
                        <div class="flex w-full">
                            <div class="w-2/6 p-1 pr-2">
                                <div>
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Bapak</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nama_bapak}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp Bapak</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nomor_telepon_bapak}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Pekerjaan Bapak</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->pekerjaan_bapak}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Bapak</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur_bapak}}">
                                </div>
                            </div>
                            <div class="w-2/6 p-1 pl-2 pr-2">
                                <div>
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Nama Ibu</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nama_ibu}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">No. Whatsapp Ibu</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->nomor_telepon_ibu}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Pekerjaan Ibu</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->pekerjaan_ibu}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Ibu</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur_ibu}}">
                                </div>
                            </div>
                            <div class="w-2/6 p-1 pl-2">
                                <div>
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Umur Anda</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->umur}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Agama Anda</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->agama}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Tempat Lahir Anda</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->tempat_lahir}}">
                                </div>
                                <div class="mt-3.5">
                                    <label class="block mb-1 font-semibold font-poppins text-lg text-gray-900 dark:text-white">Tanggal Lahir Anda</label>
                                    <input disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-poppins dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->siswa->siswadetail->tanggal_lahir}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('Components.Footer.footer')
            </div>
        </div>
    </div>

    <script>
        const modalProfile = document.querySelector('.modalProfile');
        const showModalProfile = document.querySelector('.show-modalProfile');
        const closeModalProfile = document.querySelectorAll('.close-modalProfile');
        showModalProfile.addEventListener('click', function (){ 
            modalProfile.classList.remove('hidden') 
        });
        closeModalProfile.forEach(close => { 
            close.addEventListener('click', function (){ 
                modalProfile.classList.add('hidden') 
            });
        });

        const modalProfileDetail = document.querySelector('.modalProfiledetail');
        const showModalProfileDetail = document.querySelector('.show-modalProfileDetail');
        const closeModalProfileDetail = document.querySelectorAll('.close-modalProfileDetail');
        showModalProfileDetail.addEventListener('click', function (){ 
            modalProfileDetail.classList.remove('hidden') 
        });
        closeModalProfileDetail.forEach(close => { 
            close.addEventListener('click', function (){ 
                modalProfileDetail.classList.add('hidden') 
            });
        });

        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
        </script>
</body>
</html>