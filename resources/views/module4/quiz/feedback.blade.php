@extends('layouts.default')

@section('content')
<div class="quiz-feedback-container">

    <div class="feedback-card {{ $isCorrect ? 'correct' : 'wrong' }}">
        <p>{{ $message }}</p>
    </div>

    @if ($nextIndex > $total)
        <a href="{{ route('module4.quiz.finish') }}" class="next-btn">Finish</a>
    @else
        <a href="{{ route('module4.quiz.show', $nextIndex) }}" class="next-btn">Next</a>
    @endif

</div>
@endsection