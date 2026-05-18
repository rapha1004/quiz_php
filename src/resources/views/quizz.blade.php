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
                <section class="relative overflow-hidden rounded-[2rem] border border-amber-200/80 bg-gradient-to-r from-amber-50 via-orange-50 to-rose-50 px-6 py-10 shadow-xl sm:px-8 sm:py-12">
                    <div class="absolute right-0 top-0 h-48 w-48 -translate-y-1/2 translate-x-1/3 rounded-full bg-amber-200/40 blur-3xl"></div>
                    <div class="absolute left-0 bottom-0 h-40 w-40 -translate-x-1/4 translate-y-1/4 rounded-full bg-rose-200/30 blur-3xl"></div>
                    <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-amber-700">Quiz lounge</p>
                            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-amber-950 sm:text-5xl">Find the quiz that fits your mood</h1>
                            <p class="mt-5 text-base leading-8 text-slate-700 sm:text-lg">A calm, sophisticated quiz experience that helps you explore topics without noisy color or distracting UI.</p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] bg-amber-50 p-5 ring-1 ring-amber-200/70">
                                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Quiz count</p>
                                <p class="mt-4 text-3xl font-semibold text-amber-950">{{ $quizzs->count() }}</p>
                            </div>
                            <div class="rounded-[1.5rem] bg-white p-5 ring-1 ring-slate-200">
                                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-600">Designed for focus</p>
                                <p class="mt-4 text-3xl font-semibold text-slate-950">Balanced and calm</p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="mt-10 grid gap-6 sm:grid-cols-2">
                    @forelse ($quizzs as $quizz)
                        <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Quiz</p>
                                    <h2 class="mt-3 text-xl font-semibold text-slate-900">{{ $quizz->title }}</h2>
                                </div>
                                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700">#{{ $loop->iteration }}</span>
                            </div>
                            <p class="mt-5 text-sm leading-7 text-slate-600">Dive into a thoughtfully designed quiz card with a refined layout and calmer tones.</p>
                            <div class="mt-6 flex items-center justify-between gap-3">
                                <span class="rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-800 ring-1 ring-amber-200">Balanced</span>
                                <a href="#" class="inline-flex items-center justify-center rounded-full bg-amber-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">Begin</a>
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