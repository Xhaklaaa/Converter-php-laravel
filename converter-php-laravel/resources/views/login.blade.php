@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 p-4 flex justify-between items-center mr-1">
        <button onclick=" window.location.href='{{ route('register') }}'"
                class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Register
        </button>
    </div>

    <div class="min-w-screen min-h-screen bg-gray-100 flex flex-col items-center justify-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="text-center font-bold text-1xl text-blue-600">
                <h2>
                    <a href="/" class="text-blue-500">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        Convert
                    </a>
                </h2>
            </div>
            <h2 class="mt-10 text-center text-2xl py-4 px-5 font-bold leading-9 tracking-tight text-gray-900">
                <i class="fa-solid fa-right-to-bracket"></i>
                Welcome
                back!
            </h2>
        </div>


        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{route('login')}}" novalidate method="POST">
                @csrf

                <div>
                    <label for="email" class="flex flex-col font-bold w-4/6  text-black">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" value="{{old('email')}}" autofocus placeholder="john@example.com"
                               type="email" autocomplete="email"
                               required
                               class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('email')
                <p class="text-red-500 text-sm text-center pt-0 font-bold pb-0 w-4/5">{{$message}}</p>
                @enderror
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="flex flex-col font-bold w-4/6  text-black">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" placeholder="minimum 8 symbols"
                               type="password"
                               autocomplete="current-password" required
                               class="block w-full px-1.5 rounded-md border-1 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('password')
                <p class="text-red-500 text-sm text-left pt-1 font-bold pb-0">{{$message}}</p>
                @enderror
                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Log In
                    </button>
                </div>
@endsection
