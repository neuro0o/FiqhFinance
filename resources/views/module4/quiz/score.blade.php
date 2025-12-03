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
        <h1>Module 4: Result</h1>

        @if(!$result || !isset($result['score']))
            <div class="alert alert-info">No result available. Try the quiz first.</div>
            <a href="{{ route('module4.quiz.start') }}" class="btn btn-primary">Start Quiz</a>
        @else
            <div style="margin-top:1rem;">
                <h2><span>You Scored: {{ $result['score'] }} / {{ $result['total'] }}</span></h2>

                @if($result['isNewBest'])
                    <p><strong>🎉 New Best Score!</strong><br>Your best for Module 4 is now <strong>{{ $result['bestScore'] }} / {{ $result['total']}}.</strong></p>
                @else
                    <br><h3><span>Your best: <strong>{{ $result['bestScore'] }} / {{ $result['total']}}</strong></span></h3>
                @endif

                @if(isset($result['badge']) && $result['badge'])
                    <div class="badge-card">
                        <h4>🎖 Badge Earned</h4>
                        
                        @if(!empty($result['badge']['badgeIcon']))
                            <div class="badge-icon">
                                <img src="{{ asset($result['badge']['badgeIcon']) }}" alt="badge icon">
                            </div>
                        @endif

                        @if(!empty($result['badge']['badgeDesc']))
                            <p class="badge-name"><strong>{{ $result['badge']['badgeName'] }}</strong></p>
                            <p class="badge-desc">{{ $result['badge']['badgeDesc'] }}</p>
                        @endif
                    </div>
                @else
                    <p class="no-badge">You didn't earn a badge this time.<br>Try to get at least <strong>7/10</strong> to earn <strong>Takaful Team Player</strong>!</p>
                @endif


                <div class="score-button" style="margin-top:1.25rem;">
                    <a href="{{ route('module4.quiz.start') }}" class="btn btn-primary">Play Again</a>
                    <a href="{{ route('module4.note') }}" class="btn btn-secondary">Back to Notes</a>
                </div>
            </div>
        @endif
    </div><br><br><br><br>
@endsection

<!-- FOOTER SECTION -->
@section('footer')
    
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <!-- FIXME: Fix Sidebar Collapse Behavior -->
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection