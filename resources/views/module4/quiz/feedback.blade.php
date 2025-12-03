@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 4 Quiz Feedback')

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
    <div class="quiz-feedback-container">

        <div class="feedback-card {{ $isCorrect ? 'correct' : 'wrong' }}">
            <p>{{ $message }}</p>
        </div>

        @if ($nextIndex > $total)
            <div class="feedback-button">
                <a href="{{ route('module4.quiz.finish') }}" class="btn btn-primary next-btn">Finish</a>
            </div>
        @else
        <div class="feedback-button">
            <a href="{{ route('module4.quiz.show', $nextIndex) }}" class="btn btn-primary next-btn">Next</a>
        </div>
        @endif

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