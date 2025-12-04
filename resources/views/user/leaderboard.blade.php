@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Leaderboard')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/leaderboard.css') }}">
@endsection

<!-- CONTENT SECTION -->
@section('content')
    <div class="layout">
        @include('layouts.partials.sidebar')
        
        <div class="main-content">
            <div class="page-header">
                <h1>🏆 FiqhFinance Leaderboard 🏆</h1>
                <p>Compete with fellow learners and climb to the top!</p>
            </div>

            <!-- Module Tabs -->
            <div class="tabs-container">
                <div class="tabs">
                    <a href="{{ route('leaderboard', ['module' => 'all']) }}" 
                       class="tab {{ $currentModule == 'all' ? 'active' : '' }}">
                        All
                    </a>
                    @for($i = 1; $i <= 6; $i++)
                        <a href="{{ route('leaderboard', ['module' => $i]) }}" 
                           class="tab {{ $currentModule == $i ? 'active' : '' }}">
                            Module {{ $i }}
                        </a>
                    @endfor
                </div>
            </div>

            <!-- Leaderboard Content -->
            <div class="leaderboard-card">
                @if($leaderboard->isEmpty())
                    <div class="no-data">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80px" viewBox="0 -960 960 960" width="80px" fill="#94a3b8">
                            <path d="M280-240q-17 0-28.5-11.5T240-280v-80h480v80q0 17-11.5 28.5T680-240H280Zm-40-200v-280q0-17 11.5-28.5T280-760h400q17 0 28.5 11.5T720-720v280H240Zm-80 320q-33 0-56.5-23.5T80-200v-560q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v560q0 33-23.5 56.5T800-120H160Zm0-80h640v-560H160v560Zm0 0v-560 560Z"/>
                        </svg>
                        <p>No scores yet for this {{ $currentModule == 'all' ? 'category' : 'module' }}!</p>
                        <p class="subtitle">Be the first to complete the quiz and claim the top spot!</p>
                    </div>
                @else
                    <div class="leaderboard-table">
                        <!-- Table Header -->
                        <div class="table-header">
                            <div class="col-rank">Rank</div>
                            <div class="col-user">User</div>
                            <div class="col-score">Score</div>
                            <div class="col-date">Achieved</div>
                        </div>

                        <!-- Table Rows -->
                        @foreach($leaderboard as $entry)
                            <div class="table-row {{ $entry['userID'] == $currentUser->userID ? 'current-user' : '' }}">
                                <!-- Rank -->
                                <div class="col-rank">
                                    <div class="rank-badge rank-{{ $entry['rank'] }}">
                                        @if($entry['rank'] == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                <path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/>
                                            </svg>
                                        @elseif($entry['rank'] == 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                <path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/>
                                            </svg>
                                        @elseif($entry['rank'] == 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                <path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/>
                                            </svg>
                                        @else
                                            <span class="rank-number">{{ $entry['rank'] }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- User Info -->
                                <div class="col-user">
                                    <img src="{{ $entry['profileImg'] 
                                        ? asset('storage/' . $entry['profileImg']) 
                                        : asset('images/profiles/user_default.png') }}" 
                                         alt="{{ $entry['userName'] }}"
                                         class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">{{ $entry['userName'] }}</span>
                                        @if($entry['userID'] == $currentUser->userID)
                                            <span class="you-badge">You</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Score -->
                                <div class="col-score">
                                    <div class="score-display">
                                        <span class="score-value">{{ $entry['score'] }}</span>
                                        <span class="score-max">/ {{ $entry['maxScore'] }}</span>
                                    </div>
                                    <div class="score-bar">
                                        <div class="score-progress" 
                                             style="width: {{ ($entry['score'] / $entry['maxScore']) * 100 }}%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="col-date">
                                    {{ \Carbon\Carbon::parse($entry['scored_at'])->diffForHumans() }}
                                    <span class="date-full">
                                        {{ \Carbon\Carbon::parse($entry['scored_at'])->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection