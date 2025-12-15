@extends('layouts.default')

@section('title', 'Module 3 Score')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame3.css') }}">
@endsection

@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="score-content">
        <h1>Module 3: Result</h1>

        @if(!$result || !isset($result['score']))
            <div class="alert alert-info">No result available. Try the minigame first.</div>
            <a href="{{ route('module3.minigame') }}" class="btn btn-primary">Start Game</a>
        @else
            <div style="margin-top:1rem;">
                <h2><span>You Scored: {{ $result['score'] }} / {{ $result['total'] }}</span></h2>

                @if($result['isNewBest'])
                    <p><strong>🎉 New Best Score!</strong><br>Your best for Module 3 is now <strong>{{ $result['bestScore'] }} / {{ $result['total'] }}.</strong></p>
                @else
                    <br><h3><span>Your best: <strong>{{ $result['bestScore'] }} / {{ $result['total'] }}</strong></span></h3>
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
                    <p class="no-badge">You didn't earn a badge this time.<br>Try to get at least <strong>4/5</strong> to earn <strong>Banking Ustaz</strong>!</p>
                @endif

                <!-- Results Section -->
                <div class="results-section">
                    <h2>Your Answers</h2>
                    
                    @foreach($result['results'] as $item)
                        <div class="result-card {{ $item['isCorrect'] ? 'correct' : 'wrong' }}">
                            <div class="result-header">
                                <span class="question-number">Q{{ $item['id'] }}</span>
                                <span class="result-icon">
                                    @if($item['isCorrect'])
                                        ✓
                                    @else
                                        ✗
                                    @endif
                                </span>
                            </div>
                            <p class="question-text">{{ $item['question'] }}</p>
                            <div class="answer-comparison">
                                <div class="your-answer">
                                    <strong>Your Answer:</strong> 
                                    <span class="{{ $item['isCorrect'] ? 'correct-text' : 'wrong-text' }}">
                                        {{ $item['userAnswer'] ?? 'No answer' }}
                                    </span>
                                </div>
                                @if(!$item['isCorrect'])
                                    <div class="correct-answer">
                                        <strong>Correct Answer:</strong> 
                                        <span class="correct-text">{{ $item['correctAnswer'] }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="score-button">
                    <a href="{{ route('module3.minigame') }}" class="btn btn-primary">Play Again</a>
                    <a href="{{ route('module3.note') }}" class="btn btn-secondary">Back to Notes</a>
                </div>
            </div>
        @endif
    </div><br><br><br><br>
@endsection

@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection
