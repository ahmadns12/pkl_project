@foreach ($dataperusahaan as $item)
<div class="p-1 w-1/2 block searchItems">
    <div class="w-full bg-gray-200 p-2 rounded-t-lg flex justify-between">
        <div class="font-bold text-md text-gray-500 bg-gray-300 rounded-lg p-1 px-3">{{$item->id_perusahaan}}</div>
        @if(Auth::user()->role=='hubin' || Auth::user()->role == 'kakom' || Auth::user()->role == 'superadmin')
        <div>
            @if(Auth::user()->role=='hubin')
            <a href="/admin/hubin/daftarperusahaan/edit/{{$item->id_perusahaan}}">
            @endif
            @if(Auth::user()->role=='kakom')
            <a href="/admin/kakom/daftarperusahaan/edit/{{$item->id_perusahaan}}">
            @endif
            @if(Auth::user()->role=='superadmin')
            <a href="/admin/superadmin/daftarperusahaan/edit/{{$item->id_perusahaan}}">
            @endif
                <button class="bg-white hover:bg-blue-500 p-1 pl-2 rounded-lg text-blue-500 hover:text-white transition ease-linear cursor-pointer">
                    <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>
                </button>
            </a>
            <button data-modal-target="modal-delete-{{$item->id_perusahaan}}" data-modal-toggle="modal-delete-{{$item->id_perusahaan}}" class="bg-white hover:bg-red-500 p-1 px-2 rounded-lg text-red-500 hover:text-white transition ease-linear cursor-pointer delete">
                <i class="fa-solid fa-trash font-bold text-lg"></i>
            </button>

            {{-- Modal Delete --}}
            <div id="modal-delete-{{$item->id_perusahaan}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 font-poppins">
                                        Hapus Data
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 font-poppins">
                                            Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            @if(Auth::user()->role=='hubin')
                            <a href="/admin/hubin/daftarperusahaan/delete/{{$item->id_perusahaan}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                Hapus
                            </a>
                            @endif
                            @if(Auth::user()->role=='kakom')
                            <a href="/admin/kakom/daftarperusahaan/delete/{{$item->id_perusahaan}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                Hapus
                            </a>
                            @endif
                            @if(Auth::user()->role=='superadmin')
                            <a href="/admin/superadmin/daftarperusahaan/delete/{{$item->id_perusahaan}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                Hapus
                            </a>
                            @endif
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm font-poppins" data-modal-hide="modal-delete-{{$item->id_perusahaan}}">
                                Batal                                                
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal Delete-end --}}
            
        </div>
        @endif
    </div>

    {{-- Card Perusahaan --}}
    @if(Auth::user()->role=='kakom')
    <a href="/admin/kakom/daftarperusahaan/detail/{{$item->id_perusahaan}}">
        <div class="rounded-b-lg border border-gray-300 border-solid shadow-md p-2 flex hover:bg-blue-300 transition ease-linear cursor-pointer">
    @endif
    @if(Auth::user()->role=='hubin')
    <a href="/admin/hubin/daftarperusahaan/detail/{{$item->id_perusahaan}}">
        <div class="rounded-b-lg border border-gray-300 border-solid shadow-md p-2 flex hover:bg-blue-300 transition ease-linear cursor-pointer">
    @endif
    @if(Auth::user()->role=='superadmin')
    <a href="/admin/superadmin/daftarperusahaan/detail/{{$item->id_perusahaan}}">
        <div class="rounded-b-lg border border-gray-300 border-solid shadow-md p-2 flex hover:bg-blue-300 transition ease-linear cursor-pointer">
    @endif
            <img src="{{asset('img/perusahaan/' . $item->gambar_perusahaan)}}" class="w-4/12 h-[180px] object-cover rounded-s-lg" alt="{{asset('img/perusahaan_image.jpeg')}}">
            <div class="w-full p-2 border border-gray-300 border-solid rounded-e-lg bg-white ml-2">
                <div class="font-poppins font-bold text-md namaPerusahaan">{{$item->nama_perusahaan}}</div>
                <div class="font-poppins text-sm line-clamp-2 overflow-hidden mt-1 deskripsiPerusahaan">{{$item->deskripsi}}</div>
                <div class="font-medium font-poppins text-sm line-clamp-1 overflow-hidden mt-1">Contact Person: {{$item->contact_person}}</div>
                <div class="font-medium font-poppins text-sm line-clamp-1 overflow-hidden">Alamat: {{$item->alamat_perusahaan}}</div>
                <div class="font-medium font-poppins text-sm line-clamp-1 overflow-hidden">Jurusan: {{$item->jurusan}}</div>
                <div class="font-bold font-poppins text-sm line-clamp-1 overflow-hidden"><i class="fa-solid fa-users mr-2 mt-2"></i>Kuota: 0/3</div>
            </div>
        </div>
    </a>
    {{-- Card Perusahaan-end --}}

</div>
@endforeach