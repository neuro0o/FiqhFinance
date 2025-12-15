@extends('layouts.default')

@section('title', 'Module 3 Mini Game')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moduleMiniGame/moduleMiniGame3.css') }}">
@endsection

@section('content')
    @include('layouts.partials.sidebar')
    
    <div class="game-content">
        <div class="game-header">
            <h1>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg> -->
                Module 3: Drag & Drop Scenario Quiz!
            </h1>
            <p>Click it. Drag it. Drop it!</p>
        </div>

        <form id="dragDropForm" action="{{ route('module3.minigame.submit') }}" method="POST">
            @csrf
            <div class="game-container">
                <!-- Left Side: Draggable Options -->
                <div class="options-panel">
                    <h2>Islamic Banking Products</h2>
                    <div class="options-list" id="optionsList">
                        @foreach($options as $option)
                            <div class="draggable-option" draggable="true" data-answer="{{ $option }}">
                                {{ $option }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Side: Drop Zones (Scenarios) -->
                <div class="scenarios-panel">
                    <h2>Scenarios</h2>
                    <div class="scenarios-list">
                        @foreach($scenarios as $index => $scenario)
                            <div class="scenario-card" data-scenario-id="{{ $scenario['id'] }}">
                                <div class="scenario-number">{{ $index + 1 }}</div>
                                <p class="scenario-text">{{ $scenario['question'] }}</p>
                                
                                <div class="drop-zone" data-scenario-id="{{ $scenario['id'] }}">
                                    <span class="drop-placeholder">-- Drop Here --</span>
                                </div>
                                
                                <input type="hidden" name="answers[{{ $scenario['id'] }}]" class="answer-input" value="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="game-actions">
                <button type="submit" class="btn btn-submit" id="submitBtn" disabled>Submit Answer</button>
                <button type="button" class="btn btn-clear" id="clearBtn">Clear Answer</button>
                <a href="{{ route('module3.note') }}" class="btn btn-back">Back to Home</a>
            </div>
        </form>
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const draggables = document.querySelectorAll('.draggable-option');
            const dropZones = document.querySelectorAll('.drop-zone');
            const submitBtn = document.getElementById('submitBtn');
            const clearBtn = document.getElementById('clearBtn');
            const optionsList = document.getElementById('optionsList');

            // Drag start
            draggables.forEach(draggable => {
                draggable.addEventListener('dragstart', function(e) {
                    e.dataTransfer.effectAllowed = 'move';
                    e.dataTransfer.setData('text/plain', this.dataset.answer);
                    this.classList.add('dragging');
                });

                draggable.addEventListener('dragend', function() {
                    this.classList.remove('dragging');
                });
            });

            // Drop zones
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

                    const answer = e.dataTransfer.getData('text/plain');
                    const scenarioId = this.dataset.scenarioId;
                    
                    // Check if this answer is already used in another drop zone
                    const existingAnswer = document.querySelector(`.dropped-answer[data-answer="${answer}"]`);
                    if (existingAnswer && existingAnswer.closest('.drop-zone').dataset.scenarioId !== scenarioId) {
                        // Return the answer to options list
                        const returnedOption = document.querySelector(`.draggable-option[data-answer="${answer}"]`);
                        if (returnedOption) {
                            returnedOption.style.display = 'block';
                        }
                        // Remove from previous drop zone
                        existingAnswer.remove();
                        const prevInput = document.querySelector(`input[name="answers[${existingAnswer.closest('.drop-zone').dataset.scenarioId}]"]`);
                        if (prevInput) prevInput.value = '';
                    }

                    // Clear current drop zone if it has an answer
                    const existingDropped = this.querySelector('.dropped-answer');
                    if (existingDropped) {
                        const prevAnswer = existingDropped.dataset.answer;
                        // Return to options
                        const returnOption = document.querySelector(`.draggable-option[data-answer="${prevAnswer}"]`);
                        if (returnOption) {
                            returnOption.style.display = 'block';
                        }
                        existingDropped.remove();
                    }

                    // Hide placeholder
                    const placeholder = this.querySelector('.drop-placeholder');
                    if (placeholder) placeholder.style.display = 'none';

                    // Create dropped answer element
                    const droppedAnswer = document.createElement('div');
                    droppedAnswer.className = 'dropped-answer';
                    droppedAnswer.dataset.answer = answer;
                    droppedAnswer.innerHTML = `
                        ${answer}
                        <button type="button" class="remove-btn" onclick="removeAnswer(this, '${answer}', '${scenarioId}')">✕</button>
                    `;
                    this.appendChild(droppedAnswer);

                    // Update hidden input
                    const input = document.querySelector(`input[name="answers[${scenarioId}]"]`);
                    if (input) input.value = answer;

                    // Hide the draggable option from list
                    const draggedElement = document.querySelector(`.draggable-option[data-answer="${answer}"]`);
                    if (draggedElement) {
                        draggedElement.style.display = 'none';
                    }

                    checkAllFilled();
                });
            });

            // Remove answer function (global scope)
            window.removeAnswer = function(btn, answer, scenarioId) {
                const droppedAnswer = btn.parentElement;
                const dropZone = droppedAnswer.parentElement;
                const placeholder = dropZone.querySelector('.drop-placeholder');
                
                // Show placeholder
                if (placeholder) placeholder.style.display = 'block';
                
                // Remove dropped answer
                droppedAnswer.remove();
                
                // Clear input
                const input = document.querySelector(`input[name="answers[${scenarioId}]"]`);
                if (input) input.value = '';
                
                // Show option back in list
                const option = document.querySelector(`.draggable-option[data-answer="${answer}"]`);
                if (option) {
                    option.style.display = 'block';
                }
                
                checkAllFilled();
            };

            // Clear all answers
            clearBtn.addEventListener('click', function() {
                if (!confirm('Are you sure you want to clear all answers?')) return;

                // Remove all dropped answers
                document.querySelectorAll('.dropped-answer').forEach(dropped => {
                    const answer = dropped.dataset.answer;
                    const option = document.querySelector(`.draggable-option[data-answer="${answer}"]`);
                    if (option) option.style.display = 'block';
                    dropped.remove();
                });

                // Show all placeholders
                document.querySelectorAll('.drop-placeholder').forEach(placeholder => {
                    placeholder.style.display = 'block';
                });

                // Clear all inputs
                document.querySelectorAll('.answer-input').forEach(input => {
                    input.value = '';
                });

                checkAllFilled();
            });

            // Check if all scenarios are filled
            function checkAllFilled() {
                const inputs = document.querySelectorAll('.answer-input');
                const allFilled = Array.from(inputs).every(input => input.value !== '');
                submitBtn.disabled = !allFilled;
            }

            // Form submission validation
            document.getElementById('dragDropForm').addEventListener('submit', function(e) {
                const inputs = document.querySelectorAll('.answer-input');
                const allFilled = Array.from(inputs).every(input => input.value !== '');
                
                if (!allFilled) {
                    e.preventDefault();
                    alert('Please answer all scenarios before submitting!');
                }
            });
        });
    </script>
@endsection
