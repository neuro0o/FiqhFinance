@extends('layouts.default')

<!-- TITLE -->
@section('title', 'FiqhFinance Landing Page')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/auth/landing.css') }}">
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')

@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

<!-- CONTENT SECTION -->
@section('content')    
    <section class="hero">
        <div class="hero-content">
            <img src="{{ asset('images/FiqhFinance_Logo.svg') }}" alt="FiqhFinance Logo"> 
            <h1>Learn Islamic Finance, the fun way!</h1> 
            <p style="font-style: italic;">From basic Islamic Principles, all the way to smart Halal investment</p>
            <div class="button-groups">
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </section>

    <!-- FiqhFinance Features Section -->
    <section class="feature">
        <h2>Why FiqhFinance?</h2>
        <div class="feature-groups">
            @php
            $features = [
                ['icon'=>'Gamified Learning.svg','title'=>'GAMIFIED LEARNING','desc'=>'Learn through digital notes, mini-games, quizzes, and challenges!'],
                ['icon'=>'Earn Badges.svg','title'=>'EARN BADGES','desc'=>'Complete learning modules and unlock fun achievement badges!'],
                ['icon'=>'Shariah Based.svg','title'=>'SHARIAH BASED','desc'=>'All content follows Islamic Financial Principles!'],
            ];
            @endphp

            @foreach($features as $feature)
            <div class="feature-card">
                <img src="{{ asset('images/icons/'.$feature['icon']) }}" alt="{{ $feature['title'] }}">
                <div class="feature-text">
                    <h5><strong>{{ $feature['title'] }}</strong></h5>
                    <p>{{ $feature['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Call-To-Action Section -->
    <section class="cta">
        <div class="cta-content">
            <h2>Start Your Halal Finance Journey Today!</h2>
            <p>Join and level up your Islamic Finance Literacy!.</p>
            <div class="button-groups">
                <a href="{{ route('register') }}" class="btn btn-secondary">Register Now</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </section>

@endsection

<!-- FOOTER SECTION -->
@section('footer')
    
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    
@endsection