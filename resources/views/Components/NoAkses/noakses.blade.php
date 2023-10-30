<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Access</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="h-screen w-full bg-[#7091F5] flex flex-col justify-center items-center">
        <div>
            <img class="w-[350px]" src="{{asset('img/noakses.png')}}" alt="">
        </div>
        <div class="font-poppins font-semibold text-3xl tracking-[0.5em] text-white text-center mt-4">
            <span>MOHON MAAF ANDA <br> TIDAK MEMILIKI AKSES  : (</span>
        </div>
        <div class="font-poppins font-semibold text-xl text-white text-center mt-4">
            <span>Silahkan untuk kembali ke halaman sebelumnya</span>
        </div>
        <div class="mt-4">
            <a href="{{ url()->previous() }}">
                <button class="bg-[#7091F5] hover:bg-white text-white hover:text-[#7091F5] transition ease-linear py-2 px-4 border border-white rounded-xl font-poppins font-semibold text-md">
                    <i class="fa-solid fa-caret-left"></i>
                    Kembali
                </button>
            </a>
        </div>
    </div>
</body>
</html>