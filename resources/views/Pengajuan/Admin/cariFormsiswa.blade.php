@foreach ($dataformulir as $item)

@if(Auth::user()->role == 'kakom' || Auth::user()->role == 'hubin' || Auth::user()->role == 'kurikulum' || Auth::user()->role == 'superadmin')
<tr class="border border-solid rounded-lg text-center">
    <td class="text-md px-4 py-3 font-poppins">{{$item->id_formulir}}</i></td>
    <td class="text-md font-semibold px-6 py-3 font-poppins">
        @if($item->siswa->isNotEmpty())
            @foreach($item->siswa as $siswa)
                {{$siswa->nama_siswa}}<br>
            @endforeach
        @else
            <span class="text-red-500">Error, data tidak ada di formulir ini lagi!</span>
        @endif
    </td>                                    
    <td class="text-md px-6 py-3 font-poppins">{{$item->lowongan->perusahaan->nama_perusahaan}}</td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->lowongan->posisi}}</td>
    @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hubin' || Auth::user()->role == 'kurikulum')
    <td class="text-md px-6 py-3 font-poppins">{{$item->jurusan->nama_jurusan}}</td>
    @endif
    @if(Auth::user()->role == 'kakom')
    <td class="text-lg px-6 py-3">
        @if ($item->approve_kakom == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    <td class="text-md px-6 py-3 font-poppins">
        <a href="/admin/kakom/formsiswa/detail/{{$item->id_formulir}}">
            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-sm">
                Approve
            </button>
        </a>
    </td>
    @endif

    @if(Auth::user()->role == 'hubin')
    <td class="text-lg px-6 py-3">
        @if ($item->approve_kakom == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    @endif

    @if(Auth::user()->role == 'kurikulum')
    <td class="text-lg px-6 py-3">
        @if ($item->approve_kakom == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    @endif

    @if(Auth::user()->role == 'superadmin')
    <td class="text-lg px-6 py-3">
        @if ($item->approve_kakom == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    @endif
    <td class="text-md px-6 py-3 font-poppins">{{$item->created_at}}</td>
</tr>
@endif

@endforeach