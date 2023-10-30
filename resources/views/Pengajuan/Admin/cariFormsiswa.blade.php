@foreach ($dataformulir as $item)

@if(Auth::user()->role == 'kakom' || Auth::user()->role == 'hubin' && $item->approve_kakom == '1' || Auth::user()->role == 'kurikulum' && $item->approve_hubin == '1')
<tr class="border border-solid rounded-lg text-center">
    <td class="text-md px-4 py-3 font-poppins">{{$item->id_formulir}}</i></td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->siswa->nis}}</td>
    <td class="text-md font-semibold px-6 py-3 font-poppins">{{$item->siswa->nama_siswa}}</td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->perusahaan->nama_perusahaan}}</td>
    
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
        @if ($item->approve_hubin == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    <td class="text-md px-6 py-3 font-poppins">
        <a href="/admin/hubin/formsiswa/detail/{{$item->id_formulir}}">
            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-sm">
                Approve
            </button>
        </a>
    </td>
    @endif

    @if(Auth::user()->role == 'kurikulum')
    <td class="text-lg px-6 py-3">
        @if ($item->approve_kurikulum == 1)
            <i class="fa-regular fa-square-check"></i>
        @else
            <i class="fa-regular fa-square"></i>
        @endif
    </td>
    <td class="text-md px-6 py-3 font-poppins">
        <a href="/admin/kurikulum/formsiswa/detail/{{$item->id_formulir}}">
            <button class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-3 border border-black rounded-xl font-poppins font-semibold text-sm">
                Approve
            </button>
        </a>
    </td>
    @endif

    @if(Auth::user()->role == 'superadmin')
    
    @endif
    <td class="text-md px-6 py-3 font-poppins">{{$item->created_at}}</td>
</tr>
@endif

@endforeach