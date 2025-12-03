@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 4 Quiz')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame4.css') }}">
@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

@section('content')
    @include('layouts.partials.sidebar')
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

<!-- FOOTER SECTION -->
@section('footer')
    
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <!-- FIXME: Fix Sidebar Collapse Behavior -->
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection
