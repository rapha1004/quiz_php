<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit User</h2>
            <p class="text-sm text-slate-600">Update profile and admin privileges for this user.</p>
        </div>
    </x-slot>

    <div class="py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <section class="relative overflow-hidden rounded-[2rem] border border-amber-200/80 bg-gradient-to-r from-amber-50 via-orange-50 to-rose-50 px-6 py-10 shadow-xl sm:px-8 sm:py-12">
                <div class="absolute right-0 top-0 h-40 w-40 -translate-y-1/2 translate-x-1/3 rounded-full bg-amber-200/40 blur-3xl"></div>
                <div class="absolute left-0 bottom-0 h-32 w-32 -translate-x-1/4 translate-y-1/4 rounded-full bg-rose-200/30 blur-3xl"></div>
                <div class="relative">
                    <p class="text-sm font-semibold uppercase tracking-[0.35em] text-amber-700">Admin user edit</p>
                    <h1 class="mt-4 text-4xl font-semibold tracking-tight text-amber-950 sm:text-5xl">Modify user details</h1>
                    <p class="mt-5 text-base leading-8 text-slate-700 sm:text-lg">Update the user's profile and administrator status from a secure admin interface.</p>
                </div>
            </section>

            <div class="mt-10 rounded-[1.75rem] border border-slate-200 bg-white p-8 shadow-sm sm:p-10">
                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-900">
                        <p class="font-semibold">Please fix the following errors:</p>
                        <ul class="mt-2 list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-200" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-200" required>
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4">
                        <input id="is_admin" name="is_admin" type="checkbox" value="1" class="h-4 w-4 rounded border-slate-300 text-amber-600 focus:ring-amber-500" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                        <label for="is_admin" class="text-sm font-semibold text-slate-700">Administrator privileges</label>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-amber-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
