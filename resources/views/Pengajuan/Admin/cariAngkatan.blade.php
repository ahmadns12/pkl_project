@foreach ($dataangkatan as $item)
<div class="p-1 w-1/2 block searchItems">
    <div class="w-full bg-gray-200 p-2 rounded-t-lg flex justify-between">
        <div class="font-bold text-md text-gray-500 bg-gray-300 rounded-lg p-1 px-3">{{$item->id_angkatan}}</div>
    </div>

    {{-- Card --}}
    <div class="rounded-b-lg border border-gray-300 border-solid shadow-md p-2 flex transition ease-linear">
        <div class="w-full p-2 border border-gray-300 border-solid rounded-lg bg-white">
            <div class="flex justify-center items-center font-bold font-poppins">
                <span>Angkatan: {{$item->angkatan}}</span>
            </div>
            <div class="flex justify-center items-center font-semibold font-poppins mt-4">
                <span>Tahun Pembelajaran</span>
            </div>
            <div class="flex justify-center items-center font-semibold font-poppins">
                <span>{{$item->tahun_pembelajaran}}</span>
            </div>
            <div class="w-full flex justify-center items-center mt-2">
                <a href="/admin/superadmin/angkatan/edit/{{$item->id_angkatan}}">
                    <button class="bg-blue-500 hover:bg-white border border-blue-500 p-1 pl-2 rounded-lg text-white hover:text-blue-500 transition ease-linear font-bold font-poppins pr-2">
                        <i class="fa-solid fa-pen-to-square font-bold text-lg mr-1"></i>Edit
                    </button>
                </a>
                <button data-modal-target="modal-delete-{{$item->id_angkatan}}" data-modal-toggle="modal-delete-{{$item->id_angkatan}}" class="bg-red-500 hover:bg-white border border-red-500 p-1 px-2 rounded-lg text-white hover:text-red-500 transition ease-linear delete font-bold font-poppins pr-2 ml-2">
                    <i class="fa-solid fa-trash font-bold text-lg mr-2"></i>Hapus
                </button>
                {{-- Modal Delete --}}
                <div id="modal-delete-{{$item->id_angkatan}}" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
                                <a href="/admin/superadmin/angkatan/delete/{{$item->id_angkatan}}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-poppins">
                                    Hapus
                                </a>
                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm font-poppins" data-modal-hide="modal-delete-{{$item->id_angkatan}}">
                                    Batal                                                
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Delete-end --}}
            </div>
        </div>
    </div>
    {{-- Card-end --}}

</div>
@endforeach