@extends('layouts.default')

@section('title', 'Module 2 Score')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame2.css') }}">
@endsection

@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="score-content">
        <h1>Module 2: Result</h1>

        @if(!$result || !isset($result['score']))
            <div class="alert alert-info">No result available. Try the minigame first.</div>
            <a href="{{ route('module2.minigame') }}" class="btn btn-primary">Start Game</a>
        @else
            <div style="margin-top:1rem;">
                <h2><span>You Scored: {{ $result['score'] }} / {{ $result['total'] }}</span></h2>

                @if($result['isNewBest'])
                    <p><strong>🎉 New Best Score!</strong><br>Your best for Module 2 is now <strong>{{ $result['bestScore'] }} / {{ $result['total'] }}.</strong></p>
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
                    <p class="no-badge">You didn't earn a badge this time.<br>Score at least <strong>7/10</strong> to earn <strong>Shariah Police</strong>!</p>
                @endif

                <!-- Results Section -->
                <div class="results-section">
                    <h2>Your Classifications</h2>

                    @foreach($result['results'] as $item)
                        <div class="result-card {{ $item['isCorrect'] ? 'correct' : 'wrong' }}">
                          <div class="result-header">
                            <span class="item-name">{{ $item['name'] }}</span>
                            <span class="result-icon">
                              @if($item['isCorrect'])
                                  ✓
                              @else
                                  ✗
                              @endif
                            </span>
                          </div>

                          <div class="answer-comparison">
                            <div class="your-answer">
                              <strong>You classified as:</strong>
                              <span class="category-badge {{ $item['userCategory'] }} {{ $item['isCorrect'] ? 'correct-badge' : 'wrong-badge' }}">
                                {{ strtoupper($item['userCategory'] ?? 'Not sorted') }}
                              </span>
                            </div>
                              
                            @if(!$item['isCorrect'])
                              <div class="correct-answer">
                                <strong>Correct classification:</strong>
                                <span class="category-badge {{ $item['correctCategory'] }} correct-badge">
                                  {{ strtoupper($item['correctCategory']) }}
                                </span>
                              </div>
                            @endif
                          </div>
                        </div>
                    @endforeach
                </div>

              <div class="score-button">
                <a href="{{ route('module2.minigame') }}" class="btn btn-primary">Play Again</a>
                <a href="{{ route('module2.note') }}" class="btn btn-secondary">Back to Notes</a>
            </div>
          </div>
        @endif
      </div><br><br><br><br>
@endsection

@section('page-js')
  <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection
