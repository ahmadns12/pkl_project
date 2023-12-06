@foreach ($datapermintaan as $item)
<tr class="border border-solid rounded-lg text-center">
    <td class="text-md px-4 py-3 font-poppins">{{$item->id_permintaan}}</i></td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->siswa->nama_siswa}}</td>
    <td class="text-md font-semibold px-6 py-3 font-poppins">{{$item->lowongan->perusahaan->nama_perusahaan}}</td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->lowongan->posisi}}</td>
    <td class="text-md px-6 py-3 font-poppins">
        @if ($item->approve == '0')
        <div class="flex w-full justify-center">
            <form class="mr-2" action="/admin/kakom/permintaan/approve" method="post">
                @csrf
                <input type="hidden" value="{{$item->id_permintaan}}" name="id_permintaan">
                <button type="submit" class="bg-white hover:bg-blue-500 text-black hover:text-white transition ease-linear py-1 px-2 border border-black rounded-xl font-poppins font-semibold text-sm">
                    <i class="fa-solid fa-check"></i>
                </button>
            </form>
            <button data-modal-target="modal-delete-{{$item->id_permintaan}}" data-modal-toggle="modal-delete-{{$item->id_permintaan}}" class="bg-white hover:bg-red-500 text-black hover:text-white transition ease-linear py-1 px-2 border border-black rounded-xl font-poppins font-semibold text-sm">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        @else
        <i class="fa-solid fa-check text-blue-500"></i>
        @endif
        {{-- Modal Delete --}}
        <div id="modal-delete-{{$item->id_permintaan}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
                                    Tolak Permintaan
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 font-poppins">
                                        Apakah Anda yakin ingin menolak permintaan ini? Tindakan ini tidak dapat dibatalkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form action="/admin/kakom/permintaan/tolak" method="post">
                            @csrf
                            <input type="hidden" value="{{$item->id_permintaan}}" name="id_permintaan">
                            <input type="hidden" value="{{$item->siswa->id_siswa}}" name="id_siswa">
                            <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                Tolak
                            </button>
                        </form>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm font-poppins" data-modal-hide="modal-delete-{{$item->id_permintaan}}">
                            Batal                                                
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Delete-end --}}
    </td>
    <td class="text-md px-6 py-3 font-poppins">{{$item->created_at}}</td>
@endforeach