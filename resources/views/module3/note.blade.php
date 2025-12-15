@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Module 3 Note')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleNote/moduleNote3.css') }}">
@endsection

<!-- CONTENT SECTION -->
@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="note-content">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg>
            Module 3: Islamic Banking Products
        </h1>

        <div class="product-note">
            <h2 class="product-category">SAVING PRODUCTS</h2><br>
            <!-- WADIAH -->
            <section class="note-section">
                <h2>Wadiah (Safekeeping)</h2>
                <ul>
                    <li>Wadiah means deposit for safekeeping.</li>
                    <li>Customer places money/item with the bank, and the bank guarantees to return the full amount when requested.</li>
                </ul>
            </section>

            <!-- WADIAH KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features <br> of Wadiah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Bank acts as trustee/custodian</li>
                                    <li>• No guaranteed profit to customer</li>
                                    <li>• Bank may give hibah (gift) voluntarily without expecting anything in return</li>
                                    <li>• Full protection of deposited funds</li>
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
                                <p>How Wadiah <br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Customer deposits RM 1, 000 into bank</li>
                                    <li>2. Bank keeps and may use the money</li>
                                    <li>3. Customer withdraws anytime</li>
                                    <li>4. Bank may give gift (e.g., RM 5) as hibah</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES WADIAH -->
            <section class="advantage-section">
                <h2>Advantages of Wadiah</h2>
                <ul style="list-style: none">
                    <li>1. Safe and secure</li>
                    <li>2. Easy withdrawal</li>
                    <li>3. No risk to customer</li>
                </ul>
            </section>

            <!-- DISADVANTAGES WADIAH -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Wadiah</h2>
                <ul style="list-style: none">
                    <li>1. No guaranteed profit</li>
                    <li>2. Hibah usually only in small amount</li>
                </ul>
            </section>

            <hr>

            <!-- MUDARABAH -->
            <section class="note-section">
                <h2>Mudarabah (Profit-sharing)</h2>
                <ul>
                    <li>Mudarabah is a partnership contract where one party provides capital (Rabbul mal) and the other provides expertise (Mudarib) such as labor, management, and effort.</li>
                </ul>
            </section>

            <!-- MUDARIB KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features <br> of Mudarabah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Profits are shared between the Rabbul mal and Mudarib according to pre-agreed profit-sharing ratio.</li>
                                    <li>• If the venture incurs a loss, the Rabbul mal bears the entire financial loss.</li>
                                    <li>• The Mudarib only loses their time and effort, unless due to their own misconduct or negligence.</li>
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
                                <p>How Mudarabah <br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Customer (Rabbul mal) deposits RM 5, 000 funds into an Islamic Bank (Mudarib)</li>
                                    <li>2. The bank then invests in Shariah-compliant businesses</li>
                                    <li>3. Investment earns profit</li>
                                    <li>4. Profit will then be shared between Rabbul mal and Mudarib with pre-agreed ratio (e.g., Customer 70 : Bank 30)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES MUDARABAH -->
            <section class="advantage-section">
                <h2>Advantages of Mudarabah</h2>
                <ul style="list-style: none">
                    <li>1. Potential higher returns</li>
                    <li>2. Encourages real economic activity</li>
                    <li>3. Transparent profit sharing</li>
                </ul>
            </section>

            <!-- DISADVANTAGES MUDARABAH -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Mudarabah</h2>
                <ul style="list-style: none">
                    <li>1. No guaranteed return</li>
                    <li>2. Customer may lose capital</li>
                </ul>
            </section>

            <hr>

            <h2 class="product-category">FINANCING PRODUCTS</h2><br>
            <!-- MURABAHAH -->
            <section class="note-section">
                <h2>Murabahah (Cost-plus-sale)</h2>
                <ul>
                    <li>Bank purchases an asset and resells it to a customer at a fixed, pre-determined profit margin instead of charging interest.</li>
                </ul>
            </section>

            <!-- MURABAHAH KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features <br> of Murabahah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Profit is from trade, not interest</li>
                                    <li>• Known cost and profit</li>
                                    <li>• Fixed selling price</li>
                                    <li>• Ownership transfers to customer by the end</li>
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
                                <p>How Murabahah <br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Customer wants a RM 10, 000 car </li>
                                    <li>2. Customer requests financing from the bank</li>
                                    <li>3. Bank buys the car for RM 10, 000</li>
                                    <li>4. Bank sells it to customer for RM 12, 000</li>
                                    <li>5. Customer pays RM 12, 000 in installments</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES MURABAHAH -->
            <section class="advantage-section">
                <h2>Advantages of Murabahah</h2>
                <ul style="list-style: none">
                    <li>1. Transparent pricing</li>
                    <li>2. Fixed monthly payments</li>
                    <li>3. No interest involvement</li>
                </ul>
            </section>

            <!-- DISADVANTAGES MURABAHAH -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Murabahah</h2>
                <ul style="list-style: none">
                    <li>1. Higher selling price</li>
                    <li>2. Customer is still locked into repayment</li>
                </ul>
            </section>

            <hr>

            <!-- IJARAH -->
            <section class="note-section">
                <h2>Ijarah (Leasing)</h2>
                <ul>
                    <li>Shariah-compliant leasing contract when an Islamic Bank purchases and owns an asset, then leaves it to a customer for a specific period in exchange for rental payments.</li>
                    <ul><strong>Types of Ijarah:</strong>
                        <li>Ijarah (Leasing only)</li>
                        <li>Ijarah Muntahiyah bi Tamlik (Lease then ownership transfer at the end)</li>
                    </ul>
                </ul>
            </section>


            <!-- IJARAH KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features <br> of Ijarah</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Bank owns asset</li>
                                    <li>• Customer rents it</li>
                                    <li>• Customer pays rental, not loan repayment</li>
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
                                <p>How Ijarah <br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Bank buys a car (e.g., RM 60, 000)</li>
                                    <li>2. Customer leases the car</li>
                                    <li>3. Customer pays monthly rental (e.g., RM 900)</li>
                                    <li>4. Ownership may transfer at the end depending on Ijarah type</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES IJARAH -->
            <section class="advantage-section">
                <h2>Advantages of Ijarah</h2>
                <ul style="list-style: none">
                    <li>1. Lower monthly cost</li>
                    <li>2. Maintenance sometimes shared</li>
                    <li>3. Option to own later</li>
                </ul>
            </section>

            <!-- DISADVANTAGES IJARAH -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Ijarah</h2>
                <ul style="list-style: none">
                    <li>1. Customer doesn't own asset during lease</li>
                    <li>2. Must follow contract terms strictly</li>
                </ul>
            </section>

            <hr>




            <!-- TAWARRUQ -->
            <section class="note-section">
                <h2>Tawarruq</h2>
                <ul>
                    <li>Shariah-compliant financial tool in Islamic Banking used to obtain cash liquidity by purchasing a commodity on credit and then selling it for cash to a third party.</li>
                </ul>
            </section>


            <!-- TAWARRUQ KEY FEATURES & HOW -->
            <section class="flip-section">
                <div class="flip-grid-products">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="m720-430 80 80v190q0 33-23.5 56.5T720-80H160q-33 0-56.5-23.5T80-160v-560q0-33 23.5-56.5T160-800h220q-8 18-12 38.5t-6 41.5H160v560h560v-270Zm52-174 128 128-56 56-128-128q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-700q0-75 52.5-127.5T620-880q75 0 127.5 52.5T800-700q0 27-8 51t-20 45Zm-152 4q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM160-430v270-560 280-12 22Z"/></svg>
                                </div>
                                <p>Key Features <br> of Tawarruq</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>• Used when customer needs money, but interest loans are prohibited</li>
                                    <li>• Profit is from sale contract, not interest</li>
                                    <li>• Suitable for personal financing, credit cards</li>
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
                                <p>How Tawarruq <br> Works?</p>
                            </div>
                            <div class="flip-card-back">
                                <ul>
                                    <li>1. Customer needs RM 5, 000</li>
                                    <li>2. Bank buys commodity (e.g., Gold, oil palm plantation) for RM 5, 000</li>
                                    <li>3. Bank sells it to customer for RM 6, 000 (Deferred payment)</li>
                                    <li>4. Customer sells commodity to broker for RM 5, 000 cash</li>
                                    <li>5. Customer receives cash immediately and repays RM 6, 000 over time</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ADVANTAGES TAWARRUQ -->
            <section class="advantage-section">
                <h2>Advantages of Tawarruq</h2>
                <ul style="list-style: none">
                    <li>1. Provide cash legally under Shariah</li>
                    <li>2. Flexible usage</li>
                    <li>3. Widely accepted by scholars</li>
                </ul>
            </section>

            <!-- DISADVANTAGES IJARAH -->
            <section class="disadvantage-section">
                <h2>Disadvantages of Tawarruq</h2>
                <ul style="list-style: none">
                    <li>1. Complex structure</li>
                    <li>2. Critics say it resembles conventional loans if misused</li>
                    <li>1. Higher repayment amount</li>
                </ul>
            </section>

            <hr>
        </div>

        <div class="minigameButton">
            <a href="{{ route('module3.minigame') }}">
                <button class="btn btn-primary btn-minigame">Test Your Knowledge</button>
            </a>
        </div>
    </div>
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection