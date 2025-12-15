@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 1 Note')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleNote/moduleNote1.css') }}">
@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

<!-- CONTENT SECTION -->
@section('content')
    @include('layouts.partials.sidebar')
    <div class="note-content">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-320q102-92 131-129.5t29-74.5q0-36-26-62t-62-26q-21 0-40.5 8.5T480-580q-12-15-31-23.5t-41-8.5q-36 0-62 26t-26 62q0 19 5 35t22 37.5q17 21.5 48.5 52.5t84.5 79Zm0 240q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>
            Module 1: Introduction to Islamic Finance
        </h1>

        <div class="intro-note">
            <!-- WHAT IS ISLAMIC FINANCE -->
            <section class="note-section">
                <h2>What is Islamic Finance?</h2>
                <ul>
                    <li>Islamic Finance operates based on Shariah (Islamic Law), which guides how Muslims should earn, spend, and manage money.</li>
                </ul>
            </section>

            <!-- KEY FEATURE OF ISLAMIC FINANCE -->
            <section class="flip-section">
                <h2><mark>Key Feature of Islamic Finance</mark></h2><br>

                <div class="flip-grid">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-120q-33 0-56.5-23.5T120-200v-640h80v640h640v80H200Zm40-120v-360h160v360H240Zm200 0v-560h160v560H440Zm200 0v-200h160v200H640Z"/></svg>
                                </div>
                                <p>Focus</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Islamic Finance focuses on real economic activities</p>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z"/></svg>
                                </div>
                                <p>Profit</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Profit must not come from lending money!</p>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-80q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-80q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Z"/></svg>
                                </div>
                                <p>Goal</p>
                            </div>
                            <div class="flip-card-back">
                                <p>Ensure financial activities are ethical, fair, transparent, and beneficial to society</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ISLAMIC FINANCE VS CONVENTIONAL FINANCE -->
            <section class="flip-section">
                <h2><mark>Islamic Finance Vs. Conventional Finance</mark></h2><br>

                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m521-500 59-43 58 43-23-68 59-43h-72l-22-69-22 69h-73l59 43-23 68Zm-41 220q83 0 141.5-58T680-480q0-8-.5-16t-2.5-16q-11 47-49 77.5T539-404q-60 0-101-41t-41-101q0-46 26-82.5t68-51.5h-11q-84 0-142 58.5T280-480q0 84 58 142t142 58Zm0 252L346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Zm0-112 100-100h140v-140l100-100-100-100v-140H580L480-820 380-720H240v140L140-480l100 100v140h140l100 100Zm0-340Z"/></svg>
                                </div>
                                <p>Islamic Finance</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Interest: Not allowed</li>
                                    <li>• Risk: Shared</li>
                                    <li>• Investment: Ethical & Halal</li>
                                    <li>• Profit: Trade-based</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg>
                                </div>
                                <p>Conventional Finance</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Innterest: Allowed</li>
                                    <li>• Risk: Usually transferred</li>
                                    <li>• Investment: Any industry</li>
                                    <li>• Profit: Interest-based</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        
        <div class="minigameButton">
            <a href="{{ route('module1.quiz.start') }}">
                <button class="btn btn-primary btn-minigame">Test Your Knowledge</button>
            </a>
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