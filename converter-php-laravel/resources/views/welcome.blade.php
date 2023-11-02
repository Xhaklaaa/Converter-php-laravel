@extends('layouts.app')

@section('content')

    <div class="p-4 flex justify-between items-center ">
        <div>
            <button onclick="window.location.href = '{{ route('register') }}'"
                    class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded mr-2">Register
            </button>
            <button onclick="window.location.href = '{{ route('register') }}'"
                    class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Login
            </button>
        </div>
        <h1 class="text-3xl font-bold text-center text-blue-600">
            <i class="fa-solid fa-money-bill-transfer"></i>
            Convert
        </h1>
    </div>
    <div class="p-8 mx-auto max-w-md bg-gray-100 rounded-lg bg-gradient-to-b shadow-xl mt-4 ">
        <div class="text-center">
            <h2 class="text-2xl font-semibold text-gray-800">Описание проекта</h2>
        </div>
        <p class="text-gray-600 mt-4">
            Добро пожаловать в проект "Convert". Этот инструмент предназначен для удобного конвертирования валюты по
            актуальным курсам обмена.
            <!-- Добавьте здесь более подробное описание проекта -->
        </p>
    </div>

@endsection





