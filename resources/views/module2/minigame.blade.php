@extends('layouts.default')

@section('title', 'Module 2 Mini Game')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame2.css') }}">
@endsection

@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="game-content">
        <div class="game-header">
            <h1>
                Module 3: Sort Halal & Haram Industries!
            </h1>
            <p>Drag industries into the correct category</p>
        </div>

        <form id="sortingForm" action="{{ route('module2.minigame.submit') }}" method="POST">
            @csrf
            <div class="game-container">
                <!-- Unsorted Items Pool -->
                <div class="items-pool">
                    <h2>Industries to Sort</h2>
                    <div class="items-list" id="itemsPool">
                        @foreach($items as $item)
                            <div class="draggable-item" draggable="true" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}">
                                {{ $item['name'] }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sorting Categories -->
                <div class="categories-container">
                    <!-- HALAL Category -->
                    <div class="category-box halal-box">
                        <div class="category-header halal">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Z"/>
                            </svg>
                            <h3>HALAL Industries</h3>
                        </div>
                        <div class="drop-zone" id="halalZone" data-category="halal">
                            <span class="drop-hint">Drop HALAL industries here</span>
                        </div>
                    </div>

                    <!-- HARAM Category -->
                    <div class="category-box haram-box">
                        <div class="category-header haram">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                            </svg>
                            <h3>HARAM Industries</h3>
                        </div>
                        <div class="drop-zone" id="haramZone" data-category="haram">
                            <span class="drop-hint">Drop HARAM industries here</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="game-actions">
                <button type="submit" class="btn btn-submit" id="submitBtn" disabled>Submit Answer</button>
                <button type="button" class="btn btn-clear" id="clearBtn">Clear All</button>
                <a href="{{ route('module2.note') }}" class="btn btn-back">Back to Home</a>
            </div>
        </form>
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const draggables = document.querySelectorAll('.draggable-item');
            const dropZones = document.querySelectorAll('.drop-zone');
            const submitBtn = document.getElementById('submitBtn');
            const clearBtn = document.getElementById('clearBtn');
            const itemsPool = document.getElementById('itemsPool');
            const sortingForm = document.getElementById('sortingForm');

            // Drag events for items
            draggables.forEach(draggable => {
                draggable.addEventListener('dragstart', function(e) {
                    e.dataTransfer.effectAllowed = 'move';
                    e.dataTransfer.setData('itemId', this.dataset.id);
                    e.dataTransfer.setData('itemName', this.dataset.name);
                    this.classList.add('dragging');
                });

                draggable.addEventListener('dragend', function() {
                    this.classList.remove('dragging');
                });
            });

            // Drop zone events
            dropZones.forEach(dropZone => {
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                    this.classList.add('drag-over');
                });

                dropZone.addEventListener('dragleave', function() {
                    this.classList.remove('drag-over');
                });

                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('drag-over');

                    const itemId = e.dataTransfer.getData('itemId');
                    const itemName = e.dataTransfer.getData('itemName');
                    const category = this.dataset.category;
                    
                    // Find and move the dragged item
                    const draggedItem = document.querySelector(`.draggable-item[data-id="${itemId}"]`);
                    if (draggedItem) {
                        // Remove from current location
                        draggedItem.remove();
                        
                        // Add to drop zone
                        const droppedItem = document.createElement('div');
                        droppedItem.className = 'dropped-item';
                        droppedItem.draggable = true;
                        droppedItem.dataset.id = itemId;
                        droppedItem.dataset.name = itemName;
                        droppedItem.innerHTML = `
                            ${itemName}
                            <button type="button" class="remove-btn" onclick="removeItem(${itemId})">✕</button>
                        `;
                        
                        // Hide hint if exists
                        const hint = this.querySelector('.drop-hint');
                        if (hint) hint.style.display = 'none';
                        
                        this.appendChild(droppedItem);
                        
                        // Make dropped item draggable again
                        makeDraggable(droppedItem);
                        
                        checkAllSorted();
                    }
                });
            });

            // Make dropped items draggable
            function makeDraggable(element) {
                element.addEventListener('dragstart', function(e) {
                    e.dataTransfer.effectAllowed = 'move';
                    e.dataTransfer.setData('itemId', this.dataset.id);
                    e.dataTransfer.setData('itemName', this.dataset.name);
                    this.classList.add('dragging');
                });

                element.addEventListener('dragend', function() {
                    this.classList.remove('dragging');
                });
            }

            // Remove item function
            window.removeItem = function(itemId) {
                const droppedItem = document.querySelector(`.dropped-item[data-id="${itemId}"]`);
                if (droppedItem) {
                    const itemName = droppedItem.dataset.name;
                    
                    // Remove from drop zone
                    const dropZone = droppedItem.parentElement;
                    droppedItem.remove();
                    
                    // Show hint if drop zone is empty
                    if (dropZone.children.length === 1) { // Only hint left
                        const hint = dropZone.querySelector('.drop-hint');
                        if (hint) hint.style.display = 'block';
                    }
                    
                    // Return to items pool
                    const newItem = document.createElement('div');
                    newItem.className = 'draggable-item';
                    newItem.draggable = true;
                    newItem.dataset.id = itemId;
                    newItem.dataset.name = itemName;
                    newItem.textContent = itemName;
                    
                    itemsPool.appendChild(newItem);
                    makeDraggable(newItem);
                    
                    checkAllSorted();
                }
            };

            // Clear all items
            clearBtn.addEventListener('click', function() {
                if (!confirm('Are you sure you want to clear all sorted items?')) return;

                // Get all dropped items
                const droppedItems = document.querySelectorAll('.dropped-item');
                droppedItems.forEach(item => {
                    const itemId = item.dataset.id;
                    const itemName = item.dataset.name;
                    
                    // Return to pool
                    const newItem = document.createElement('div');
                    newItem.className = 'draggable-item';
                    newItem.draggable = true;
                    newItem.dataset.id = itemId;
                    newItem.dataset.name = itemName;
                    newItem.textContent = itemName;
                    
                    itemsPool.appendChild(newItem);
                    makeDraggable(newItem);
                    
                    item.remove();
                });

                // Show all hints
                document.querySelectorAll('.drop-hint').forEach(hint => {
                    hint.style.display = 'block';
                });

                checkAllSorted();
            });

            // Check if all items are sorted
            function checkAllSorted() {
                const poolItems = itemsPool.querySelectorAll('.draggable-item');
                submitBtn.disabled = poolItems.length > 0;
            }

            // Form submission
            sortingForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Collect answers
                const halalItems = document.querySelectorAll('#halalZone .dropped-item');
                const haramItems = document.querySelectorAll('#haramZone .dropped-item');

                // Create hidden inputs for answers
                const existingInputs = this.querySelectorAll('input[name^="answers"]');
                existingInputs.forEach(input => input.remove());

                halalItems.forEach(item => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `answers[${item.dataset.id}]`;
                    input.value = 'halal';
                    this.appendChild(input);
                });

                haramItems.forEach(item => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `answers[${item.dataset.id}]`;
                    input.value = 'haram';
                    this.appendChild(input);
                });

                this.submit();
            });

            // Initial check
            checkAllSorted();
        });
    </script>
@endsection
