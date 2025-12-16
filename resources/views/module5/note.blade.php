@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 5 Note')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleNote/moduleNote5.css') }}">
@endsection

<!-- CONTENT SECTION -->
@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="note-content">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M320-414v-306h120v306l-60-56-60 56Zm200 60v-526h120v406L520-354ZM120-216v-344h120v224L120-216Zm0 98 258-258 142 122 224-224h-64v-80h200v200h-80v-64L524-146 382-268 232-118H120Z"/></svg>
            Module 5: Islamic Investment
        </h1>

        <div class="investment-note">
            <!-- WHAT IS ISLAMIC INVESTMENT -->
            <section class="note-section">
                <h2>Islamic Investment</h2>
                <ul><strong>Islam encourages Muslim to:</strong>
                    <li>Manage wealth responsibly</li>
                    <li>Avoid waste and debt</li>
                    <li>Protect family</li>
                    <li>Help the community</li>
                    <li>Plan for the future</li>
                </ul>
            </section>

            <hr>
            
            <h2 class="investment-category">TYPES OF ISLAMIC FINANCIAL PLANNING</h2><br>
            <!-- SHARIAH-COMPLIANT STOCKS -->
            <section class="note-section">
                <h2>Shariah-Compliant Stocks</h2>
                <ul>
                  <li>Stocks of compamies whose business practices and financial activities align with Islamic principles.</li>
                </ul>
            </section>

            <!-- SHARIAH-COMPLIANT STOCKS KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features of <br> Shariah-Compliant <br> Stock </p>
                            </div>
                            <div class="flip-card-back">
                                <ul><strong>Companies Must:</strong>
                                    <li>• Operate Halal business activities</li>
                                    <li>• Have low debt</li>
                                    <li>• Avoid unethical activities</li>
                                    <li>• Meet Shariah financial screening requirements</li>
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
                                <p>How Shariah-Compliant <br> Stock Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Customer buy shares of a Halal company</li>
                                    <li>2. Price RM 2.00/Share</li>
                                    <li>3. Buying 1K Shares → RM 2K</li>
                                    <li>4. If price of share increases to RM 2.50, customer gain RM 500</li>
                                    <li>5. If price of share decreases to RM 1.80, customer loss RM 200</li>
                                    <li>Formula: Stock Current Selling Price - Total Purchase Price</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES SHARIAH-COMPLIANT STOCKS -->
            <section class="advantage-section">
                <h2>Advantages of Shariah-Compliant Stocks</h2>
                <ul style="list-style: none">
                    <li>1. Potential high returns</li>
                    <li>2. Ownership of real businesses</li>
                    <li>3. Shariah-regulated screening in Malaysia</li>
                    <li>4. Transparent</li>
                </ul>
            </section>

            <!-- DISADVANTAGES SHARIAH-COMPLIANT STOCKS -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Shariah-Compliant Stocks</h2>
                <ul style="list-style: none">
                    <li>1. Price volatility</li>
                    <li>2. Business performance risk</li>
                </ul>
            </section>

            <hr>

            <!-- SUKUK -->
            <section class="note-section">
                <h2>Sukuk</h2>
                <ul>
                  <li>Shariah-compliant financial certificates that are asset-based</li>
                  <li>Similar to bonds that uses interest-based</li>
                </ul>
                <ul><strong>Types of Sukuk:</strong>
                  <li>Sukuk Ijarah (Leasing asset)</li>
                  <li>Sukuk Murabahah (Cost-plus sale)</li>
                  <li>Sukuk Musharakah (Partnership)</li>
                  <li>Sukuk Wakalah (Agency-based)</li>
                </ul>
            </section>

            <!-- SUKUK KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features of <br> Sukuk</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Backed by real assets</li>
                                    <li>• Investors earns profit from asset performance instead of depending on growing interest</li>
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
                                <p>How Sukuk<br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Government wants to build a highway</li>
                                    <li>2. Sukuk issued to investors</li>
                                    <li>3. Investors provide money</li>
                                    <li>4. Money then used to build highway</li>
                                    <li>5. Investors receive profit from toll revenue</li>
                                    <li>6. At maturity, capital returned</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES SUKUK -->
            <section class="advantage-section">
                <h2>Advantages of Sukuk</h2>
                <ul style="list-style: none">
                    <li>1. Stable returns</li>
                    <li>2. Lower risk than stocks</li>
                    <li>3. Asset-backed</li>
                    <li>4. Shariah-compliant</li>
                </ul>
            </section>

            <!-- DISADVANTAGES SUKUK -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Sukuk</h2>
                <ul style="list-style: none">
                    <li>1. Lower return potential</li>
                    <li>2. Less liquidity (asset harder to sell quickly)</li>
                </ul>
            </section>

            <hr>

            <!-- ISLAMIC UNIT TRUST -->
            <section class="note-section">
                <h2>Islamic Unit Trust/Islamic Funds</h2>
                <ul>
                  <li>A pool of money collected from many investors, managed by professionals, invested in Shariah-compliant assets</li>
                </ul>
            </section>

            <!-- ISLAMIC UNIT TRUST KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features of <br> Islamic Unit Trust</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Invest only in Shariah-compliant stocks, sukuk, and assets</li>
                                    <li>• Each fund is overseen by a dedicated Shariah board and undergoes annual Shariah audits</li>
                                    <li>• Any incidental income derived from non-Shariah-compliant sources will be donated to charity for purification</li>
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
                                <p>How <br> Islamic Unit Trust<br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Investor contribute money</li>
                                    <li>2. Fund manager invests in Shariah assets</li>
                                    <li>3. Profit then shared among investors</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES ISLAMIC UNIT TRUST -->
            <section class="advantage-section">
                <h2>Advantages of Islamic Unit Trust</h2>
                <ul style="list-style: none">
                    <li>1. Easy for beginners</li>
                    <li>2. Professional management</li>
                    <li>3. Diversified investment (lower risk)</li>
                    <li>4. Ethical and Halal</li>
                    <li>5. Encourages real economic growth</li>
                    <li>6. Avoids harmful industries</li>
                    <li>7. Allows wealth accumulation</li>
                    <li>8. Promotes fairness and transparency</li>
                </ul>
            </section>

            <!-- DISADVANTAGES ISLAMIC UNIT TRUST -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Islamic Unit Trust</h2>
                <ul style="list-style: none">
                    <li>1. Market risk</li>
                    <li>2. Business performance risk</li>
                    <li>3. Economic downturn</li>
                    <li>4. Lower return compared to high-risk investment</li>
                </ul>
            </section>
        </div>

        <div class="minigameButton">
            <a href="{{ route('module5.minigame') }}">
                <button class="btn btn-primary btn-minigame">Test Your Knowledge</button>
            </a>
        </div>
    </div>
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection