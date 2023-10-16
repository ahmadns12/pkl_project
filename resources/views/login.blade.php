<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login PKL</title>
    @vite('resources/css/app.css')
</head>

<body>
    
    <div class="w-full h-full lg:h-screen bg-[#F4F4F4]">
        @include('Components.Login.loginHeader')
        {{-- Body --}}
        <div class="lg:flex p-3 items-center justify-center mt-8">
            <img class="p-5 lg:p-0 lg:h-[330px]" src="{{ asset('img/admin.png') }}" alt="">
            <div class="lg:w-3/12 lg:ml-12 p-5 lg:p-0">
                <div class="font-poppins font-bold items-center justify-center flex text-3xl w-full mb-6">Log In
                </div>
                {{-- Error --}}
                @if ($errors->any())
                    <div class="relative mb-2">
                        @foreach ($errors->all() as $item)
                            <div class="font-body font-bold text-red-500">{{ $item }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <!-- Username input -->
                    <div class="relative mb-4 border-black border-4 rounded-md">
                        <input type="text"
                              class="peer block min-h-[auto] w-full rounded-0 px-3 py-[0.20rem] leading-[2.15] bg-white"
                            placeholder="Username" name="username" />
                    </div>

                    <!-- Password input -->
                    <div class="relative mb-6 border-black border-4 rounded-md">
                        <input type="password"
                            class="peer block min-h-[auto] w-full rounded-0 px-3 py-[0.20rem] leading-[2.15] bg-white"
                            placeholder="Password" name="password" />
                    </div>

                    <!-- Submit button -->
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="inline-block w-6/12 rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal bg-black text-white font-poppins font-bold">
                            LOG IN
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @include('Components.Login.loginFooter')
    </div>
</body>

</html>
