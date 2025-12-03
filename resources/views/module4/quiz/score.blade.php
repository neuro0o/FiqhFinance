@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 4 Score')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame4.css') }}">
@endsection

@section('content')
    @include('layouts.partials.sidebar')
    <div class="score-content" style="padding:2rem;">
        <h1>Module 4: Your Result</h1>

        @if(!$result || !isset($result['score']))
            <div class="alert alert-info">No result available. Try the quiz first.</div>
            <a href="{{ route('module4.quiz.start') }}" class="btn btn-primary">Start Quiz</a>
        @else
            <div style="margin-top:1rem;">
                <h2>Score: {{ $result['score'] }} / {{ $result['total'] }}</h2>

                @if($result['isNewBest'])
                    <p><strong>🎉 New Best Score!</strong> Your best for Module 4 is now {{ $result['bestScore'] }}.</p>
                @else
                    <p>Your best: {{ $result['bestScore'] }}</p>
                @endif

                @if(isset($result['badge']) && $result['badge'])
                    <div style="margin-top:1rem; padding:1rem; border-radius:8px; background:#f3f8ff;">
                        <h3>Badge Earned: {{ $result['badge']['badgeName'] }}</h3>
                        @if(!empty($result['badge']['badgeDesc']))
                            <p>{{ $result['badge']['badgeDesc'] }}</p>
                        @endif
                        @if(!empty($result['badge']['badgeIcon']))
                            <img src="{{ asset('images/badges/' . $result['badge']['badgeIcon']) }}" alt="badge" style="max-width:120px;">
                        @endif
                    </div>
                @else
                    <p style="margin-top:1rem;">You didn't earn a badge this time. Try to get at least 7/10 to earn <strong>Takaful Team Player</strong>!</p>
                @endif

                <div style="margin-top:1.25rem;">
                    <a href="{{ route('module4.quiz.start') }}" class="btn btn-primary">Play Again</a>
                    <a href="{{ route('module4.note') }}" class="btn btn-secondary">Back to Notes</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection