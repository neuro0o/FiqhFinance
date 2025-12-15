@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 6 Note')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleNote/moduleNote6.css') }}">
@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

<!-- CONTENT SECTION -->
@section('content')
    @include('layouts.partials.sidebar')
    <div class="note-content">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
            Module 6: Islamic Financial Planning
        </h1>

        <div class="planning-note">
            <!-- WHAT IS ISLAMIC FINANCIAL PLANNING -->
            <section class="note-section">
                <h2>Islamic Financial Planning</h2>
                <ul>
                    <li>Islam encourages Muslim to frow wealth, invest responsibly, and avoid any kind of exploitation and harm</li>
                </ul>
                <ul><strong>Investment allowed in Islam must be:</strong>
                    <li>Asset-backed</li>
                    <li>Ethical (Halal business activity)</li>
                    <li>Tranparent (Avoid excessive speculation)</li>
                    <li>Shariah-compliant</li>
                    <li>Avoid interest-based income</li>
                    <li>Follow fair contracts</li>
                </ul>
            </section>

            <hr>

            <h2 class="planning-category">TYPES OF ISLAMIC INVESTMENT</h2><br>
            <!-- ZAKAT -->
            <section class="note-section">
                <h2>Zakat (Obligatory Charity)</h2>
                <ul>
                    <li>Mandatory charity given by eligible Muslims to help those in needs.</li>
                    <li>It is one of the Five Pillars of Islam.</li>
                </ul>
            </section>

            <!-- ZAKAT PURPOSE & WHO -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Purpose <br> of Zakat</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Purify Wealth</li>
                                    <li>• Reduce poverty</li>
                                    <li>• Promotes social justice</li>
                                    <li>• Circulate money in society</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M80-140v-320h320v320H80Zm80-80h160v-160H160v160Zm60-340 220-360 220 360H220Zm142-80h156l-78-126-78 126ZM863-42 757-148q-21 14-45.5 21t-51.5 7q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50.5T813-204L919-98l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM320-380Zm120-260Z"/></svg>
                                </div>
                                <p>Who Must <br>Pay Zakat</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>A Muslim must pay Zakat if:
                                    <li>1. Owns wealth above nisab</li>
                                    <li>2. Holds it for 1 year (haul)</li>
                                    <li>3. Wealth is Halal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>         

            <!-- TYPES OF ZAKAT -->
            <section class="flip-section">
                <h2><mark>Types of Zakat</mark></h2><br>

                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m521-500 59-43 58 43-23-68 59-43h-72l-22-69-22 69h-73l59 43-23 68Zm-41 220q83 0 141.5-58T680-480q0-8-.5-16t-2.5-16q-11 47-49 77.5T539-404q-60 0-101-41t-41-101q0-46 26-82.5t68-51.5h-11q-84 0-142 58.5T280-480q0 84 58 142t142 58Zm0 252L346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Zm0-112 100-100h140v-140l100-100-100-100v-140H580L480-820 380-720H240v140L140-480l100 100v140h140l100 100Zm0-340Z"/></svg>
                                </div>
                                <p>Zakat Fitrah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Paid during Ramadan for every Muslim</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z"/></svg>
                                </div>
                                <p>Zakat on Wealth</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Savings</li>
                                    <li>• Investment</li>
                                    <li>• Business income</li>
                                    <li>• Gold & Silver</li>
                                    <li>• Agriculture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ZAKAT CALCULATION -->
            <section class="note-section">
                <h2>Zakat Calculation</h2>
                <ul><strong>Example 1:</strong>
                    <li>1. Savings = RM 10,000</li>
                    <li>2. Nisab = RM 15, 000 (Example)</li>
                    <li>3. Since Savings < Nisab, no need to pay Zakat</li>
                </ul>
                <ul><strong>Example 2:</strong>
                    <li>1. Savings = RM 20, 000/li>
                    <li>2. Nisab = RM 15, 000</li>
                    <li>3. Savings > Nisab, need to pay Zakat</li>
                    <li>4. Zakat Rate = 2.5%</li>
                    <li>5. RM 20, 000 * 2.5% = RM 500 Zakat needs to be paid</li>
                </ul>
            </section>

            <!-- ASNAF -->
            <section class="note-section">
                <h2>Who Receives Zakat? (8 Asnaf)</h2>
                <ul>
                    <li>1. Fakir (Extremely poor)</li>
                    <li>2. Miskin (Poor)</li>
                    <li>3. Amil (Zakat workers)</li>
                    <li>4. Muallaf (New Muslims)</li>
                    <li>5. Riqab (Freeing slaves)</li>
                    <li>6. Gharimin (People in debt)</li>
                    <li>7. Fisabilillah (Individuals engaged in efforts to uphold and defend the religion of Islam)</li>
                    <li>8. Ibnu Sabil (Stranded travellers in need)</li>
                </ul>
            </section>

            <hr>

            <!-- HIBAH -->
            <section class="note-section">
                <h2>Hibah (non-compensated gift)</h2>
                <ul>
                    <li>Voluntary giving of wealth or assets to someone during the giver's lifetime.</li>
                </ul>
            </section>

            <!-- HIBAH CHARACTERISTICS & IMPORTANCE -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Characteristic <br> of Hibah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>Unlike inheritance, Hibah:
                                    <li>• Takes effect immediately</li>
                                    <li>• Avoids dispute after death</li>
                                    <li>• Gives full ownership to recepient</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M80-140v-320h320v320H80Zm80-80h160v-160H160v160Zm60-340 220-360 220 360H220Zm142-80h156l-78-126-78 126ZM863-42 757-148q-21 14-45.5 21t-51.5 7q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50.5T813-204L919-98l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM320-380Zm120-260Z"/></svg>
                                </div>
                                <p>Importance of<br>Hibah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. To ensure family members are protected</li>
                                    <li>2. To ensure smooth transfer of assets</li>
                                    <li>3. To ensure no family conflict</li>
                                    <li>4. To ensure faster distribution compared to Faraid</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>   

            <!-- HIBAH VS FARAID VS WASIAT -->
            <section class="flip-section">
                <h2><mark>Hibah vs Faraid vs Wasiat</mark></h2><br>

                <div class="flip-grid">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M640-440 474-602q-31-30-52.5-66.5T400-748q0-55 38.5-93.5T532-880q32 0 60 13.5t48 36.5q20-23 48-36.5t60-13.5q55 0 93.5 38.5T880-748q0 43-21 79.5T807-602L640-440Zm0-112 109-107q19-19 35-40.5t16-48.5q0-22-15-37t-37-15q-14 0-26.5 5.5T700-778l-60 72-60-72q-9-11-21.5-16.5T532-800q-22 0-37 15t-15 37q0 27 16 48.5t35 40.5l109 107ZM280-220l278 76 238-74q-5-9-14.5-15.5T760-240H558q-27 0-43-2t-33-8l-93-31 22-78 81 27q17 5 40 8t68 4q0-11-6.5-21T578-354l-234-86h-64v220ZM40-80v-440h304q7 0 14 1.5t13 3.5l235 87q33 12 53.5 42t20.5 66h80q50 0 85 33t35 87v40L560-60l-280-78v58H40Zm80-80h80v-280h-80v280Zm520-546Z"/></svg>
                                </div>
                                <p>Hibah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Effective: During lifetime</li>
                                    <li>• Not mandatory</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M240-320q-33 0-56.5-23.5T160-400q0-33 23.5-56.5T240-480q33 0 56.5 23.5T320-400q0 33-23.5 56.5T240-320Zm480 0q-33 0-56.5-23.5T640-400q0-33 23.5-56.5T720-480q33 0 56.5 23.5T800-400q0 33-23.5 56.5T720-320Zm-240-40q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM284-120q14-69 68.5-114.5T480-280q73 0 127.5 45.5T676-120H284Zm-204 0q0-66 47-113t113-47q17 0 32 3t29 9q-30 29-50 66.5T224-120H80Zm656 0q-7-44-27-81.5T659-268q14-6 29-9t32-3q66 0 113 47t47 113H736ZM88-480l-48-64 440-336 160 122v-82h120v174l160 122-48 64-392-299L88-480Z"/></svg>
                                </div>
                                <p>Faraid</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Effective: After death</li>
                                    <li>• Mandatory</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M240-80q-50 0-85-35t-35-85v-120h120v-560h600v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-600H320v480h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h360v80H360Zm0 120v-80h360v80H360ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm0 0h-40 400-360Z"/></svg>
                                </div>
                                <p>Wasiat</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Effective: After death</li>
                                    <li>• Not mandatory</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <!-- BUDGETING -->
            <section class="note-section">
                <h2>Budgeting in Islam</h2>
                <ul>
                    <li>Islam encourages budgeting that is properly planned, in moderation, and avoiding waste (israf).</li>
                </ul><br>
                <ul><strong>Budgeting Rule in Islamic Perspective:</strong>
                    <li>Necessities (Dharruriyat) → Priority</li>
                    <li>Needs (Hajiyyat) → Helpful</li>
                    <li>Luxuries (Tahsiniyyat) → Avoid excess</li>
                </ul><br>
                <ul><strong>Simple Islamic Budget Formula:</strong>
                    <li>50% → needs (food, bills, transport)</li>
                    <li>30% → savings & investment</li>
                    <li>10% → charity (zakat/sadaqah)</li>
                    <li>10% → wants (entertainment)</li>
                </ul><br>
                <ul><strong>Example Monthly Budget:</strong>
                    <li>Monthly income = RM 2, 000</li>
                    <li>Needs = RM 1, 000</li>
                    <li>Savings/Investment = RM 600</li>
                    <li>Charity = RM 200</li>
                    <li>Wants = RM 200</li>
                </ul>
            </section>

            <hr>

            <!-- DEBT -->
            <section class="note-section">
                <h2>Debt Management in Islam</h2>
                <ul>Islam allows debt, BUT strongly warns against:
                    <li>Unnecessary borrowing</li>
                    <li>Riba (interest)</li>
                    <li>Delaying payment</li>
                </ul><br>
                <ul><strong>Islamic Rules on Debt:</strong>
                    <li>Debt must be for necessity</li>
                    <li>Debt must be clearly agreed</li>
                    <li>Debt must be recorded</li>
                    <li>Debt must be paid on time</li>
                </ul><br>
                <ul><strong>Prohibited Debt Practices:</strong>
                    <li>Credit cards with interest</li>
                    <li>Personal loans with riba</li>
                    <li>B uy now pay later with hidden fees</li>
                </ul><br>
                <ul><strong>Encouraged Alternatives:</strong>
                    <li>Islamic financing (Murabahah)</li>
                    <li>Ijarah leasing</li>
                    <li>Interest-free borrowing from family/friends</li>
                    <li>Tawarruq financing (Shariah-structured)</li>
                </ul>
            </section>

        </div>

        <div class="minigameButton">
            <a href="{{ route('module6.quiz.start') }}">
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