<div>
    Users
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
     @foreach ($users as $user)
        <p>{{ $user->name }}</p>
        @foreach ($user->getQuiz as $quiz)
            <p>{{ $quiz->title }}</p>
        @endforeach
    @endforeach
</div>
