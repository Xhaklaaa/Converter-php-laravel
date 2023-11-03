@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 p-4 flex justify-between items-center mr-1">
        <button onclick=" window.location.href='{{ route('login') }}'"
                class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Login
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
            <h2 class="mt-10 text-center text-2xl py-4 px-5 font-bold leading-9 tracking-tight text-gray-900">Sign up to
                your account</h2>
        </div>


    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">


        <form class="space-y-6" action="{{route('register')}}" method="POST">
            @csrf
            <div>
                <ul>
                    @foreach($errors->all() as $message)
                        <div class="text-red-500 text-center pt-6 font-bold pb-2 w-4/5 mx-auto">
                            <li>{{$message}}</li>
                        </div>
                    @endforeach
                </ul>
                <label for="name" class="flex flex-col font-bold w-4/6  text-black">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" autofocus value="{{old('name')}}" placeholder="John Doe"
                           type="text" autocomplete="name"
                           required
                           class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="email" class="flex flex-col font-bold w-4/6  text-black">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" value="{{old('email')}}" placeholder="john@example.com"
                           type="email" autocomplete="email"
                           required
                           class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                </div>
            </div>

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
            <div>
                <div class="flex items-center justify-between">
                    <label for="confirm_password" class="flex flex-col font-bold w-4/6  text-black">Confirm
                        Password</label>
                </div>
                <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" placeholder="minimum 8 symbols"
                           type="password"
                           class="block w-full px-1.5 rounded-md border-1 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                </div>

            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Sign up
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Has account?
            <button type="submit" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Sign in</button>
        </p>
    </div>
    </div>
@endsection
