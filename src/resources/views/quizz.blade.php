<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Quizz</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900">
        <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto bg-white shadow-sm rounded-lg p-6">
                <h1 class="text-3xl font-semibold mb-6">Quizz</h1>

                @foreach ($quizzs as $quizz)
                    <p class="mb-3 text-lg">{{ $quizz->title }}</p>
                @endforeach
            </div>
        </div>
    </body>
</html>