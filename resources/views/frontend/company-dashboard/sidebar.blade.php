<!-- ===== Start of Candidate Sidebar ===== -->
<div class="col-md-4 col-xs-12 dashboard-sidebar">
    <!-- Sidebar Navigation -->
    <div class="sidebar-navigation card">
        <div class="card-header">
            @if (auth()->user()->role === 'company')
                <h4 class="sidebar-title">Company Dashboard</h4>
            @elseif (auth()->user()->role === 'candidate')
                <h4 class="sidebar-title">Candidate Dashboard</h4>
            @endif
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link btn btn-link active" href="{{ route('company.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="candidate-profile.html">My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="candidate-profile-jobs.html">My Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="candidate-profile-save-jobs.html">Saved Jobs</a>
            </li>
        </ul>

        <div class="mt-20">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <!-- Logout Button -->
                <a class="nav-link btn btn-danger mt-3" onclick="event.preventDefault(); this.closest('form').submit();"
                    href="{{ route('logout') }}">Logout Account</a>
            </form>
        </div>


    </div>
</div>
<!-- ===== End of Candidate Sidebar ===== -->
