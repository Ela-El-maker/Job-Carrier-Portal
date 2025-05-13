<div class="col-md-3 col-12 dashboard-sidebar bg-light p-0">
    <div class="sidebar-navigation card m-3 border-0 shadow-sm rounded-4 overflow-hidden">
        <!-- Logo Section -->
        <div
            style="display: flex; justify-content: center; align-items: center; padding-top: 1.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid #e5e7eb;">
            <div style="height: 4rem; width: 4rem; border-radius: 9999px; overflow: hidden; border: 2px solid #d1d5db; display: flex; align-items: center; justify-content: center; background-color: #f3f4f6; transition: all 0.2s ease;"
                onmouseover="this.style.transform='scale(1.05)'; this.style.borderColor='#3b82f6';"
                onmouseout="this.style.transform='scale(1)'; this.style.borderColor='#d1d5db';">
                @if (auth()->user()->candidateProfile?->image)
                    <img src="{{ auth()->user()->candidateProfile->image }}" alt="Profile"
                        style="height: 100%; width: 100%; object-fit: cover;">
                @else
                    <div style="color: #9ca3af; font-size: 1.25rem; font-weight: 700;">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                @endif
            </div>
        </div>

        <!-- User Info -->
        <div
            style="padding-left: 1rem; padding-right: 1rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: center; border-bottom: 1px solid #e5e7eb;">
            <h3
                style="font-weight: 600; color: #1f2937; font-size: 1.125rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                {{ auth()->user()->name }}</h3>
            <p
                style="font-size: 0.875rem; color: #6b7280; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                {{ auth()->user()->email }}</p>
        </div>

        {{-- Navigation --}}
        @php
            $navItems = [
                ['route' => 'candidate.dashboard', 'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'],
                ['route' => 'candidate.profile.index', 'icon' => 'fas fa-user', 'label' => 'My Profile'],
                ['route' => 'candidate.applied-jobs.index', 'icon' => 'fas fa-briefcase', 'label' => 'My Jobs'],
                ['route' => 'candidate.bookmarked-jobs.index', 'icon' => 'fas fa-bookmark', 'label' => 'Saved Jobs'],
                ['route' => 'candidate.portfolio.index', 'icon' => 'fas fa-folder-open', 'label' => 'Portfolio'],
                ['route' => 'client-reviews.index', 'icon' => 'fas fa-star', 'label' => 'Review'],
            ];
        @endphp

        <ul class="nav flex-column">
            @foreach ($navItems as $item)
                <li class="nav-item mb-2">
                    <a href="{{ route($item['route']) }}"
                        class="nav-link d-flex align-items-center {{ setSidebarActive([$item['route']]) }}"
                        style="padding: 12px 16px; border-radius: 10px; text-decoration: none; font-weight: 500; color: #4a5568; background-color: {{ request()->routeIs($item['route']) ? 'rgba(67, 97, 238, 0.1)' : 'transparent' }};">
                        <i class="{{ $item['icon'] }} me-3 text-primary" style="width: 20px; text-align: center;"></i>
                        <span class="flex-grow-1">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="p-3 border-top bg-light">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="btn btn-warning w-100 fw-bold d-flex justify-content-center align-items-center gap-2">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
        </div>
    </div>
</div>
