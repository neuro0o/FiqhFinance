@extends('layouts.default')

@section('content')
<div class="quiz-container">

    <h2>Module 4: True/False Quiz</h2>

    <div class="question-card">
        <div class="question-number">{{ $index }}</div>

        <p class="question-text">{{ $question['text'] }}</p>

        <form action="{{ route('module4.quiz.answer', $index) }}" method="POST">
            @csrf
            <button type="submit" name="answer" value="false" class="btn-false">✖</button>
            <button type="submit" name="answer" value="true" class="btn-true">✔</button>
        </form>
    </div>

</div>
@endsection
