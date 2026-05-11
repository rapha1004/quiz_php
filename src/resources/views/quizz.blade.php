<div>
    <h1>Quizz</h1>

    @foreach ($quizzs as $quizz)
        <p>{{ $quizz->title }}</p>

        @foreach ($quizz->getUsers as $user)
            <p>{{ $user->name }}</p>
        @endforeach
    @endforeach
</div>