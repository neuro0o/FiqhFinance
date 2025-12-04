@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Leaderboard')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/leaderboard.css') }}">
@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

<!-- CONTENT SECTION -->
@section('content')
    <div class="layout">
        @include('layouts.partials.sidebar')
        <div class="content">
            <div class="page-title">
                <h1>FiqhFinance Leaderboard!</h1>
                <p></p>
                <!-- <hr> -->
            </div>
        </div>
    </div><br><br><br>
@endsection


<!-- FOOTER SECTION -->
@section('footer')
    
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <!-- FIXME: Fix Sidebar Collapse Behavior -->
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection