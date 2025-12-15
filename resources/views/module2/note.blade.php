@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 2 Note')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleNote/moduleNote2.css') }}">
@endsection

<!-- HEADER SECTION -->
@section('header')
    
@endsection

<!-- CONTENT SECTION -->
@section('content')
    @include('layouts.partials.sidebar')
    <div class="note-content">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m521-500 59-43 58 43-23-68 59-43h-72l-22-69-22 69h-73l59 43-23 68Zm-41 220q83 0 141.5-58T680-480q0-8-.5-16t-2.5-16q-11 47-49 77.5T539-404q-60 0-101-41t-41-101q0-46 26-82.5t68-51.5h-11q-84 0-142 58.5T280-480q0 84 58 142t142 58Zm0 252L346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Zm0-112 100-100h140v-140l100-100-100-100v-140H580L480-820 380-720H240v140L140-480l100 100v140h140l100 100Zm0-340Z"/></svg>    
            Module 2: Shariah Principles in Islamic Finance
        </h1>

        <div class="shariah-note">
            <!-- RIBA -->
            <section class="note-section">
                <h2>Riba</h2>
                <ul>
                    <ul><strong>Riba means:</strong>
                        <li>Any additional amount charged on loans</li>
                        <li>Profit without effort or risk</li>
                        <li>Example: Borrow RM 1, 000 → Repay RM 1, 200</li>
                    </ul><br>
                    <ul><strong>Not allowed in Islam because:</strong>
                        <li>Involves exploitation</li>
                        <li>Burden on borrowers</li>
                        <li>Unfair wealth gain without effort or risk</li>
                    </ul>
                </ul>
            </section>
            
            <hr>

            <!-- GHARAR -->
            <section class="note-section">
                <h2>Gharar (Uncertainty)</h2>
                <ul>
                    <li>Gharar refers to a transaction with a lack of clarity regarding the subject matter, price, or outcome, where one party could gain at the expense of another.</li>
                </ul>
            </section>

            <!-- GHARAR CHARACTERISTIC & EXAMPLE -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Characteristic <br> of Gharar</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Unknown outcomes</li>
                                    <li>• Disability</li>
                                    <li>• Hidden information</li>
                                    <li>• Ambiguous contracts</li>
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
                                <p>Example <br> of Gharar</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Selling goods that are not yet present or in hand (e.g., Selling fish in the sea)</li>
                                    <li>• Lack of clarity on the price or the price being unknown</li>
                                    <li>• Buying a mystery box</li>
                                    <li>• Insurance with unclear terms</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <!-- MAYSIR -->
            <section class="note-section">
                <h2>Maysir (Gambling)</h2>
                <ul>
                    <li>Maysir refers to gambling and games of chance, which are strictly forbidden (Haram) because they involve gaining wealth through speculation rather than productive work.</li>
                    <li>Maysir can lead to enmity, divert people from remembering God, and involve easy acquisition of wealth by luck rather than effort.</li>
                </ul>
            </section>

            <!-- MAYSIR CHARACTERISTIC & EXAMPLE -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Characteristic <br> of Maysir</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Earning money through luck or chance</li>
                                    <li>• No real work or value creation</li>
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
                                <p>Example <br> of Maysir</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Lottery</li>
                                    <li>• Sports betting</li>
                                    <li>• Casino games</li>
                                    <li>• Trading based on speculation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <!-- HALAL INDUSTRY -->
            <section class="note-section">
                <h2>Halal Industry</h2>
                <ul>
                    <li>Halal industry refers to products and services that are certified as Halal (permissible) based on compliance with Islamic Law (Shariah).</li>
                    <li>The industry is built on a foundation of trust, ethical conduct, and accountability, with strict adherence to Islamic Law in all stages of production.</li>
                </ul>
            </section>

            <!-- HALAL INDUSTRY CHARACTERISTIC & EXAMPLE -->
            <section class="flip-section">
                <div class="flip-grid">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Characteristic of <br> Halal Industry</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Adherence to Islamic Law</li>
                                    <li>• Ethical and moral foundation</li>
                                    <li>• Strict purity and cleanness</li>
                                    <li>• Free from najis(impurities) and not contaminated by non-halal items during processing, storage, and transport</li>
                                    <li>• Focus on quality, safety, and good health practices</li>
                                    <li>• Sustainable</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m521-500 59-43 58 43-23-68 59-43h-72l-22-69-22 69h-73l59 43-23 68Zm-41 220q83 0 141.5-58T680-480q0-8-.5-16t-2.5-16q-11 47-49 77.5T539-404q-60 0-101-41t-41-101q0-46 26-82.5t68-51.5h-11q-84 0-142 58.5T280-480q0 84 58 142t142 58Zm0 252L346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Zm0-112 100-100h140v-140l100-100-100-100v-140H580L480-820 380-720H240v140L140-480l100 100v140h140l100 100Zm0-340Z"/></svg>
                                </div>
                                <p>Example of <br> Halal Industries</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Halal food</li>
                                    <li>• Healthcare</li>
                                    <li>• Technology</li>
                                    <li>• Manufacturing</li>
                                    <li>• Education</li>
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
                                <p>Example of <br> Non-Halal Industries</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Alcohol</li>
                                    <li>• Gambling</li>
                                    <li>• Tobacco</li>
                                    <li>• Pornography</li>
                                    <li>• Interest-based banks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="minigameButton">
            <a href="/minigame-sort-industry">
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