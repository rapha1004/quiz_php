<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $quizz->title }} - {{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100 text-slate-900">
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="mb-10">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-3xl font-bold text-slate-900">{{ $quizz->title }}</h1>
                    <a href="{{ route('quizzs.index') }}" class="text-slate-600 hover:text-slate-900 font-medium">←
                        Back</a>
                </div>

                <p class="text-lg font-semibold text-amber-700 mb-4">Question
                    {{ $questionNumber }}/{{ $totalQuestions }}</p>

                <div class="w-full bg-slate-300 rounded-full h-2">
                    <div class="bg-gradient-to-r from-amber-500 to-orange-500 h-2 rounded-full transition-all duration-300"
                        style="width: {{ $progressPercentage }}%"></div>
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-slate-200/80 bg-white p-8 shadow-lg">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-slate-900 leading-tight">
                        {{ $currentQuestion->title }}
                    </h2>
                </div>

                <form class="space-y-6" x-data="{ submitting: false }" @submit.prevent="submitting = true">
                    @csrf

                    <fieldset :disabled="submitting">
                        <legend class="sr-only">Select an answer</legend>

                        <div class="space-y-4">
                            @forelse($responses as $response)
                                <label
                                    class="flex items-center p-4 border-2 border-slate-200 rounded-xl cursor-pointer transition hover:border-amber-400 hover:bg-amber-50 focus-within:border-amber-500 focus-within:bg-amber-50"
                                    :class="{ 'opacity-50 pointer-events-none': submitting }">
                                    <input type="radio" name="response_id" value="{{ $response->id }}"
                                        class="w-5 h-5 text-amber-600 border-slate-300 focus:ring-amber-500" required>

                                    <span class="ml-4 text-lg text-slate-900 font-medium">
                                        {{ $response->text }}
                                    </span>
                                </label>
                            @empty
                                <div class="p-6 bg-slate-50 rounded-xl text-center">
                                    <p class="text-slate-600">No responses available for this question.</p>
                                </div>
                            @endforelse
                        </div>
                    </fieldset>

                    <div class="pt-6 flex gap-4">
                        <button type="submit" :disabled="submitting"
                            class="flex-1 inline-flex items-center justify-center rounded-full bg-amber-700 px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-amber-800 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!submitting">Submit Answer</span>
                            <span x-show="submitting">Sending...</span>
                        </button>

                        @if($questionNumber > 1)
                            <a href="{{ route('quizzs.participate', ['quizzId' => $quizz->id, 'questionNumber' => $questionNumber - 1]) }}"
                                class="inline-flex items-center justify-center rounded-full bg-slate-200 px-6 py-3 text-base font-semibold text-slate-900 shadow-sm transition hover:bg-slate-300">
                                ← Previous
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>