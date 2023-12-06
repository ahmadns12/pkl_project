@foreach ($datapanduan as $item)
<tr class="border border-solid rounded-lg text-center">
    <td class="text-md px-6 py-3 font-poppins">{{$item->id_panduan}}</td>
    <td class="text-md px-6 py-3 font-poppins w-2/12">
        <a href="{{ asset('doc/' . $item->file_panduan) }}" target="_blank">
            <button class="bg-blue-500 border hover:border-blue-500 hover:bg-transparent p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear cursor-pointer pr-2 font-bold text-sm">
                <i class="fa-solid fa-file-pdf font-bold text-lg mr-1"></i>
                Lihat
            </button> 
        </a><br>
        <a href="{{ asset('doc/' . $item->file_panduan) }}" download>
            <button class="bg-blue-500 border hover:border-blue-500 hover:bg-transparent p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear cursor-pointer pr-2 font-bold text-sm">
                <i class="fa-solid fa-circle-down font-bold text-lg mr-1"></i>
                Unduh
            </button>
        </a>
    </td>
    <td class="text-md font-semibold px-6 py-3 font-poppins">{{$item->nama_panduan}}</td>
    <td class="text-md font-poppins mx-6 my-3"><div class="line-clamp-3">{{$item->deskripsi}}</div></td>
    <td class="text-md px-6 py-3 font-poppins">
        @if(Auth::user()->role=='hubin')
        <a href="/admin/hubin/panduan/edit/{{$item->id_panduan}}">
        @endif
        @if(Auth::user()->role=='superadmin')
        <a href="/admin/superadmin/panduan/edit/{{$item->id_panduan}}">
        @endif
            <button class="bg-blue-500 border hover:border-blue-500 hover:bg-transparent p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear cursor-pointer pr-2 font-bold">
                <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>
                Edit
            </button>
        </a>
        <button data-modal-target="modal-delete-{{$item->id}}" data-modal-toggle="modal-delete-{{$item->id}}" class="hover:bg-transparent bg-red-500 p-1 px-2 rounded-lg hover:text-red-500 text-white transition ease-linear cursor-pointer delete pr-2 font-bold border hover:border-red-500">
            <i class="fa-solid fa-trash font-bold text-lg mr-1"></i>
            Hapus
        </button>
        {{-- Modal Delete --}}
        <div id="modal-delete-{{$item->id}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
                        <a href="/admin/hubin/panduan/delete/{{$item->id}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                            Hapus
                        </a>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm font-poppins" data-modal-hide="modal-delete-{{$item->id}}">
                            Batal                                            
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Delete-end --}}
    </td>
</tr>
@endforeach