<div class="space-y-4">
    <h1 class="text-2xl font-semibold text-slate-900">Users</h1>
    <p class="text-sm text-slate-600">Only administrators can manage users from this page.</p>

    @foreach ($users as $user)
        <div class="flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-lg font-semibold text-slate-900">{{ $user->name }}</p>
                <p class="text-sm text-slate-600">{{ $user->email }}</p>
                <p class="mt-2 text-sm text-slate-500">Quizzes joined: {{ $user->getQuiz->count() }}</p>
            </div>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete {{ addslashes($user->name) }}?');" class="mt-3 sm:mt-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
            </form>
        </div>
    @endforeach
</div>
