<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Quizz</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100 text-slate-900">
        <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <section class="overflow-hidden rounded-[2rem] bg-gradient-to-r from-sky-600 via-cyan-500 to-indigo-600 px-6 py-10 shadow-2xl sm:px-8 sm:py-12">
                    <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-100">Quiz hub</p>
                            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">Choose your next challenge</h1>
                            <p class="mt-5 text-base leading-8 text-cyan-100/90 sm:text-lg">Browse available quizzes and sharpen your skills with a clean, modern experience built for fast discovery.</p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] bg-white/10 p-5 ring-1 ring-white/20 backdrop-blur-sm">
                                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-cyan-100">Total quizzes</p>
                                <p class="mt-4 text-3xl font-semibold text-white">{{ $quizzs->count() }}</p>
                            </div>
                            <div class="rounded-[1.5rem] bg-white/10 p-5 ring-1 ring-white/20 backdrop-blur-sm">
                                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-cyan-100">Ready to start</p>
                                <p class="mt-4 text-3xl font-semibold text-white">Quick and fun</p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="mt-10 grid gap-6 sm:grid-cols-2">
                    @forelse ($quizzs as $quizz)
                        <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/90 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Quiz</p>
                                    <h2 class="mt-3 text-xl font-semibold text-slate-900">{{ $quizz->title }}</h2>
                                </div>
                                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700">#{{ $loop->iteration }}</span>
                            </div>
                            <p class="mt-5 text-sm leading-7 text-slate-600">Test your knowledge with this quiz and see how many questions you can answer correctly. Good luck!</p>
                            <div class="mt-6 flex items-center justify-between gap-3">
                                <span class="rounded-full bg-sky-50 px-3 py-1 text-sm font-semibold text-sky-700 ring-1 ring-sky-100">Ready</span>
                                <a href="#" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Start quiz</a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full rounded-[1.75rem] border border-dashed border-slate-300 bg-white/80 p-10 text-center shadow-sm">
                            <p class="text-lg font-semibold text-slate-900">No quizzes available yet.</p>
                            <p class="mt-3 text-slate-600">Please check back later or add quizzes from the admin panel.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </body>
</html>