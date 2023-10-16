<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa Pemilihan</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-full h-full bg-[#F4F4F4]">
        @include('Components.Login.loginHeader')
        {{-- Body --}}
        <div class="w-full lg:flex p-3 items-center justify-center mt-0 lg:mt-8">
            {{-- Card --}}
            <div class="p-6 lg:p-0">
                <div class="shadow-lg min-w-0 overflow-hidden p-7 bg-white rounded-xl cursor-pointer" id="card-pengajuan"
                    onclick="window.location='{{ route('pengajuanSiswa') }}'">
                    <div class="flex justify-center items-center">
                        <img class="w-[300px]" src="{{ asset('img/pengajuan.png') }}" alt="">
                    </div>
                    <div class="mt-4 font-poppins font-bold text-3xl flex justify-center items-center">Pengajuan PKL</div>
                </div>
            </div>
            {{-- Card-end --}}
            @if (Auth::user()->is_choosen == '1')
                <div class="bg-black w-[10px] h-[400px] mx-12 rounded-md hidden lg:inline"></div>
                {{-- Card --}}
                <div class="p-6 lg:p-0">
                    <div class="lg:mt-0 shadow-lg overflow-hidden p-7 bg-white rounded-xl cursor-pointer" id="card-monitoring"
                    onclick="window.location='{{ route('monitoringSiswa') }}'">
                    <div class="flex justify-center items-center">
                        <img class="w-[300px]" src="{{ asset('img/monitor.png') }}" alt="">
                    </div>
                    <div class="mt-4 font-poppins font-bold text-3xl flex justify-center items-center">Monitoring PKL
                    </div>
                </div>
                </div>
                {{-- Card-end --}}
            @endif
        </div>
        <div class="flex justify-center items-center">
            <form action="/logout">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white text-xl lg:text-lg mt-4 mb-12 lg:mb-0 font-poppins font-bold py-3 px-6 lg:py-2 lg:px-6 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Log out
                </button>
            </form>
        </div>
        @include('Components.Login.loginFooter')
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
