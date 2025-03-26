<!-- ===== Start of Candidate Sidebar ===== -->
<div class="col-md-4 col-xs-12 dashboard-sidebar" style="padding: 20px; background-color: #f8f9fa; min-height: 100vh;">
    <!-- Sidebar Navigation -->
    <div class="sidebar-navigation card"
        style="border: none; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-bottom: none;">
            @if (auth()->user()->role === 'company')
                <h4 class="sidebar-title" style="color: white; margin: 0; font-weight: 600; font-size: 1.4rem;">Company
                    Dashboard</h4>
            @elseif (auth()->user()->role === 'candidate')
                <h4 class="sidebar-title" style="color: white; margin: 0; font-weight: 600; font-size: 1.4rem;">Candidate
                    Dashboard</h4>
            @endif
        </div>
        <ul class="nav flex-column" style="padding: 15px;">
            <li class="nav-item" style="margin-bottom: 5px;">
                <a class="nav-link btn btn-link active" href="{{ route('candidate.dashboard') }}"
                    style="text-align: left; color: #4a5568; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: all 0.3s; background-color: #edf2f7;">
                    <i class="fas fa-tachometer-alt" style="margin-right: 10px; color: #4a5568;"></i>Dashboard
                </a>
            </li>
            <li class="nav-item" style="margin-bottom: 5px;">
                <a class="nav-link btn btn-link" href="{{ route('candidate.profile.index') }}"
                    style="text-align: left; color: #4a5568; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: all 0.3s;">
                    <i class="fas fa-user" style="margin-right: 10px; color: #4a5568;"></i>My Profile
                </a>
            </li>
            <li class="nav-item" style="margin-bottom: 5px;">
                <a class="nav-link btn btn-link" href="{{ route('candidate.applied-jobs.index') }}"
                    style="text-align: left; color: #4a5568; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: all 0.3s;">
                    <i class="fas fa-briefcase" style="margin-right: 10px; color: #4a5568;"></i>My Jobs
                </a>
            </li>
            <li class="nav-item" style="margin-bottom: 5px;">
                <a class="nav-link btn btn-link" href="candidate-profile-save-jobs.html"
                    style="text-align: left; color: #4a5568; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: all 0.3s;">
                    <i class="fas fa-bookmark" style="margin-right: 10px; color: #4a5568;"></i>Saved Jobs
                </a>
            </li>
        </ul>

        <div style="padding: 15px; border-top: 1px solid #e2e8f0;">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <!-- Logout Button -->
                <a class="nav-link btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();"
                    href="{{ route('logout') }}"
                    style="display: block; text-align: center; padding: 12px; border-radius: 8px; font-weight: 500; transition: all 0.3s; background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%); color: white; border: none;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout Account
                </a>
            </form>
        </div>
    </div>
</div>
<!-- ===== End of Candidate Sidebar ===== -->
