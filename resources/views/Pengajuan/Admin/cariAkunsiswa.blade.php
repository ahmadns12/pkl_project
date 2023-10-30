@foreach ($dataakunsiswa as $item)
<tr class="border border-solid rounded-lg text-center">
    <td class="text-md px-4 py-3 font-poppins"><i class="fa-solid fa-circle-user"></i></td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->id}}</td>
    <td class="text-md font-semibold px-6 py-3 font-poppins">{{ ucfirst($item->siswa->nama_siswa) }}</td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->username}}</td>
    <td class="text-md px-6 py-3 font-poppins">
        @if($item->is_choosen == '0')
        <span class="text-red-500 font-semibold">Pengajuan</span>
        @endif
        @if($item->is_choosen == '1')
        <span class="text-blue-500 font-semibold">Monitoring</span>
        @endif
    </td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->angkatan}}</td>
    <td class="text-md px-6 py-3 font-poppins">
        @if(Auth::user()->role=='hubin')
        <a href="/admin/hubin/daftarsiswa/edit/{{$item->id_siswa}}">
        @endif
        @if(Auth::user()->role=='kakom')
        <a href="/admin/kakom/daftarsiswa/edit/{{$item->id_siswa}}">
        @endif
            <button class="bg-blue-500 border hover:border-blue-500 hover:bg-white p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear cursor-pointer pr-2 font-bold">
                <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>
                Edit
            </button>
        </a>
        <button data-modal-target="modal-delete-{{$item->id_siswa}}" data-modal-toggle="modal-delete-{{$item->id_siswa}}" class="hover:bg-white bg-red-500 p-1 px-2 rounded-lg hover:text-red-500 text-white transition ease-linear cursor-pointer delete pr-2 font-bold border hover:border-red-500">
            <i class="fa-solid fa-trash font-bold text-lg mr-1"></i>
            Hapus
        </button>
    </td>
</tr>
@endforeach