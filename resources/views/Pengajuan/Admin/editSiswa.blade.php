<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Siswa</title>
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
                <h2 class="text-lg font-poppins font-bold"><span>Edit Siswa</span></h2>
                <h2 class="text-md font-poppins"><span>Edit siswa-siswi sesuai dengan data yang sudah disiapkan.</span></h2>
            </div>
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-md">
                        <i class="fa-solid fa-caret-left"></i>
                        Kembali
                    </button>
                </a>
            </div>
            @if(Auth::user()->role=='hubin')
            <form action="/admin/hubin/daftarsiswa/update/{{$siswa->id_siswa}}" method="POST" enctype="multipart/form-data">
            @endif
            @if(Auth::user()->role=='kakom')
            <form action="/admin/kakom/daftarsiswa/update/{{$siswa->id_siswa}}" method="POST" enctype="multipart/form-data">
            @endif
            @if(Auth::user()->role=='superadmin')
            <form action="/admin/superadmin/daftarsiswa/update/{{$siswa->id_siswa}}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                {{method_field('PUT')}}
                <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
                <input type="hidden" name="id_siswadetail" value="{{$siswa->id_siswadetail}}">
                <div class="relative flex flex-col shadow-lg mb-6 rounded-lg p-4">
                    <div class="block bg-transparent w-full overflow-x-auto">
                        <span class="font-poppins font-semibold">Siswa</span>
                        <div class="flex w-full">
                            <div class="mt-3 w-1/2">
                                <div class="w-full flex flex-col rounded-lg border border-solid">
                                    <div class="w-full bg-gray-200 p-2 rounded-t-lg">
                                        <span class="w-full flex justify-center text-md font-poppins font-semibold text-black">Foto (Opsional)</span>
                                    </div>
                                    <div class="w-full rounded-b-lg h-64 p-2">
                                        <input type="file" name="image" onchange="loadFile(event)" value="{{asset('img/siswa/'. $siswa->gambar_siswa)}}">
                                        <div class="w-full flex justify-center items-center">
                                            <img class="mt-2 h-48" id="output" src="{{asset('img/siswa/'.$siswa->gambar_siswa)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Status</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="status">
                                            @if($siswa->status == '0')
                                            <option value="0">Pengajuan</option>
                                            <option value="1">Monitoring</option>
                                            @endif
                                            @if($siswa->status == '1')
                                            <option value="1">Monitoring</option>
                                            <option value="0">Pengajuan</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-1 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">NIS</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nis"  value="{{$siswa->nis}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nama</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nama_siswa" value="{{$siswa->nama_siswa}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Alamat</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="alamat" value="{{$siswa->alamat}}">
                                    </div> 
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jenis Kelamin</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="jenis_kelamin">
                                            @if($siswa->jenis_kelamin == 'l')
                                                <option value="l">Laki-Laki</option>
                                                <option value="p">Perempuan</option>
                                            @endif
                                            @if($siswa->jenis_kelamin == 'p')
                                                <option value="p">Perempuan</option>
                                                <option value="l">Laki-Laki</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>                                
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nomor Telepon</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nomor_telepon" value="{{$siswa->nomor_telepon}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Angkatan</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_angkatan">
                                            <option disabled>Tahun Pembelajaran</option>
                                            @foreach ($angkatan as $item)
                                                @if ($item->id_angkatan == $siswa->angkatan->id_angkatan)
                                                    <option value="{{$item->id_angkatan}}" selected>{{$item->angkatan}} / {{$item->tahun_pembelajaran}}</option>
                                                @else
                                                    <option value="{{$item->id_angkatan}}">{{$item->angkatan}} / {{$item->tahun_pembelajaran}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Pembimbing</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_guru">
                                            <option disabled>Pilih Pembimbing</option>
                                            @if (is_null($siswa->id_guru))
                                                <option value="" selected>Belum ada pembimbing</option>
                                            @else
                                                <option value="">Belum ada pembimbing</option>
                                            @endif
                                            @foreach ($guru as $item)
                                                @if ($item->id_guru == $siswa->id_guru)
                                                    <option value="{{$item->id_guru}}" selected>{{$item->nama_guru}}</option>
                                                @else
                                                    <option value="{{$item->id_guru}}">{{$item->nama_guru}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if(Auth::user()->role == 'superadmin')
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Jurusan</span>
                                    </div>
                                    <div class="w-8/12 p-1 rounded-l-lg">
                                        <select class="h-full w-full outline-none font-poppins" name="id_jurusan">
                                            <option disabled>Jurusan</option>
                                            @foreach ($jurusan as $item)
                                                @if ($item->id_jurusan == $siswa->jurusan->id_jurusan)
                                                    <option value="{{$item->id_jurusan}}" selected>{{$item->nama_jurusan}}</option>
                                                @else
                                                    <option value="{{$item->id_jurusan}}">{{$item->nama_jurusan}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="font-poppins font-semibold">Data Lebih Lanjut</span>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-3 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nama Bapak</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nama_bapak" placeholder="Nama Orang tua Siswa..." value="{{$siswa->siswadetail->nama_bapak}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Pekerjaan Bapak</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="pekerjaan_bapak" placeholder="Pekerjaan Orang tua Siswa..." value="{{$siswa->siswadetail->pekerjaan_bapak}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nomor Bapak</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nomor_telepon_bapak" placeholder="Nomor Telepon Orang tua Siswa..." value="{{$siswa->siswadetail->nomor_telepon_bapak}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Umur Bapak</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="umur_bapak" placeholder="Umur Orang tua Siswa..." value="{{$siswa->siswadetail->umur_bapak}}">
                                    </div>
                                </div>                                
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nama Ibu</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="nama_ibu" placeholder="Nama Orang tua Siswa..." value="{{$siswa->siswadetail->nama_ibu}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Pekerjaan Ibu</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Orang tua Siswa..." value="{{$siswa->siswadetail->pekerjaan_ibu}}">
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-1 w-1/2">
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Nomor Ibu</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="number" name="nomor_telepon_ibu" placeholder="Nomor Telepon Orang tua Siswa..." value="{{$siswa->siswadetail->nomor_telepon_ibu}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Umur Ibu</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="number" name="umur_ibu" placeholder="Umur Telepon Orang tua Siswa..." value="{{$siswa->siswadetail->umur_ibu}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Umur Siswa</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="umur" placeholder="Umur Siswa..." value="{{$siswa->siswadetail->umur}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Agama Siswa</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="agama" placeholder="Agama Siswa..." value="{{$siswa->siswadetail->agama}}">
                                    </div>
                                </div>                                
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Tempat Lahir</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="text" name="tempat_lahir" placeholder="Tempat lahir Siswa..." value="{{$siswa->siswadetail->tempat_lahir}}">
                                    </div>
                                </div>
                                <div class="w-full flex border-solid border rounded-lg mt-2">
                                    <div class="w-4/12 bg-gray-200 p-2 rounded-l-lg">
                                        <span class="text-md font-poppins font-semibold text-black">Tanggal Lahir</span>
                                    </div>
                                    <div class="w-8/12 p-2 rounded-l-lg">
                                        <input class="h-full w-full outline-none font-poppins" type="date" name="tanggal_lahir" placeholder="Tanggal lahir Siswa..." value="{{$siswa->siswadetail->tanggal_lahir}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 flex items-end justify-end">
                            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-2 px-3 border border-black rounded-xl font-poppins font-semibold text-md" type="submit">
                                Edit
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
