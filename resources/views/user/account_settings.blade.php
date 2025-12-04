@extends('layouts.default')

<!-- TITLE -->
@section('title', 'Account Settings')

<!-- PAGE SPECIFIC CSS -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/utils/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/account_settings.css') }}">
@endsection

<!-- CONTENT SECTION -->
@section('content')
  <div class="layout">
    @if (Auth::user()->userRole === 'Admin')
      @include('layouts.partials.admin_sidebar')
    @else
        @include('layouts.partials.sidebar')
    @endif

    <div class="main-content">
      <div class="dashboard-header">
        <h1>Account Settings</h1>
      </div>

      <!-- Profile Information Card -->
      <div class="account-card">
        <h2>Profile Information</h2>
        <hr>

        <div class="profile-info">
          <img src="{{ $user->profileImg
              ? asset('storage/' . $user->profileImg)
              : asset($user->userRole === 'Admin'
                  ? 'images/profiles/admin_default.png'
                  : 'images/profiles/user_default.png') }}"
          class="profile-img" alt="Profile">

          <div class="info-text">
            <p><strong>Username:</strong> {{ $user->userName }}</p>
            <p><strong>User Email:</strong> {{ $user->userEmail }}</p>
          </div>
        </div>

        <div class="actions">
          <button id="editBtn" class="btn btn-edit">Edit</button>
          
          @if(Auth::user()->userRole !== 'Admin')
              <button id="deleteBtn" class="btn btn-delete">Delete</button>
          @endif
        </div>
      </div>

      <!-- Achievements Card -->
      <div class="account-card achievements-card">
        <h2>🎖 Achievements 🎖</h2>
        <hr>

        <div class="badges-grid">
          @foreach($badges as $badge)
            <div class="badge-slot {{ $badge['isEarned'] ? 'earned' : 'locked' }}">
              <div class="badge-image-container">
                <img src="{{ asset($badge['badgeIcon']) }}" 
                     alt="{{ $badge['badgeName'] }}"
                     class="badge-image {{ !$badge['isEarned'] ? 'grayscale' : '' }}">
                
                @if(!$badge['isEarned'])
                  <div class="lock-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px">
                      <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/>
                    </svg>
                  </div>
                @endif
              </div>
              
              <div class="badge-info">
                <h4>{{ $badge['badgeName'] }}</h4>
                @if($badge['isEarned'])
                  <p class="badge-desc">{{ $badge['badgeDesc'] }}</p>
                  <p class="earned-date">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
                      <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Z"/>
                    </svg>
                    Earned {{ \Carbon\Carbon::parse($badge['earnedDate'])->format('M d, Y') }}
                  </p>
                @else
                  <p class="locked-text">Not yet unlocked</p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Best Scores Card -->
      <div class="account-card scores-card">
        <h2>🗒 Module Best Scores 🗒</h2>
        <hr>

        <div class="scores-grid">
          @for($i = 1; $i <= 6; $i++)
            <div class="score-item {{ $bestScores[$i]['hasAttempted'] ? 'attempted' : 'not-attempted' }}">
              <div class="module-icon">
                <img src="{{ asset('images/icons/Module ' . $i . ' - ' . 
                  ['Introduction to Islamic Finance', 'Shariah Principles in Islamic Finance', 
                   'Islamic Banking Products', 'Takaful', 'Islamic Investment', 
                   'Islamic Financial Planning'][$i-1] . '.svg') }}" 
                     alt="Module {{ $i }}">
              </div>
              
              <div class="score-details">
                <h4>Module {{ $i }}</h4>
                @if($bestScores[$i]['hasAttempted'])
                  <p class="score-value">
                    <span class="score-number">{{ $bestScores[$i]['bestScore'] }}</span>
                    <span class="score-total">/ 10</span>
                  </p>
                  <p class="score-date">
                    {{ \Carbon\Carbon::parse($bestScores[$i]['scored_at'])->format('M d, Y') }}
                  </p>
                @else
                  <p class="no-attempt">Not attempted yet</p>
                  <a href="{{ route('module' . $i . '.note') }}" class="start-btn">Start Module</a>
                @endif
              </div>
            </div>
          @endfor
        </div>
      </div>

      <!-- container where AJAX modal will load -->
      <div id="modalContainer"></div>
    </div>
  </div>
@endsection

<!-- PAGE SPECIFIC JS -->
@section('page-js')
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Account Settings Popup Modal -->
    <script>
      document.getElementById('editBtn').addEventListener('click', async () => {
        const modalContainer = document.getElementById('modalContainer');

        if (document.getElementById('editModal')) return;

        try {
          const response = await fetch('{{ route('account.settings.modal') }}');
          if (!response.ok) throw new Error('Failed to load modal');

          const html = await response.text();
          modalContainer.innerHTML = html;

          const modal = document.getElementById('editModal');
          modal.addEventListener('click', (e) => {
            if (
              e.target.id === 'closeModal' ||
              e.target.id === 'closeModalBtn' ||
              e.target === modal
            ) {
              modal.remove();
            }
          });
        } catch (error) {
          console.error(error);
          alert('Error loading modal');
        }
      });

      document.getElementById('deleteBtn')?.addEventListener('click', function () {
        const isAdmin = "{{ Auth::user()->userRole }}" === "Admin";

        if (isAdmin) {
          alert("Admin accounts cannot be deleted.");
          return;
        }

        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = '{{ route('account.delete') }}';
          form.innerHTML = `
            @csrf
            @method('DELETE')
          `;
          document.body.appendChild(form);
          form.submit();
        }
      });

      document.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'profileImg') {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
              const img = document.querySelector('.profileImg');
              img.src = ev.target.result;
            };
            reader.readAsDataURL(file);
          }
        }
      });
    </script>
@endsection