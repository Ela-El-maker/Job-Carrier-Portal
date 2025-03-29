<!-- ===== Start of Candidate Sidebar ===== -->
<div class="col-md-4 col-xs-12 dashboard-sidebar"
    style="padding: 0; background-color: #f8f9fa; min-height: 100vh; box-shadow: 2px 0 10px rgba(0,0,0,0.03);">
    <!-- Sidebar Navigation -->
    <div class="sidebar-navigation card"
        style="border: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); border-radius: 12px; overflow: hidden; margin: 20px;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%); padding: 22px 25px; border-bottom: none; position: relative;">
            @if (auth()->user()->role === 'company')
                <h4 class="sidebar-title"
                    style="color: white; margin: 0; font-weight: 700; font-size: 1.4rem; letter-spacing: 0.5px;">Company
                    Dashboard</h4>
            @elseif (auth()->user()->role === 'candidate')
                <h4 class="sidebar-title"
                    style="color: white; margin: 0; font-weight: 700; font-size: 1.4rem; letter-spacing: 0.5px;">
                    Candidate Dashboard</h4>
            @endif
            <div
                style="position: absolute; bottom: 0; left: 0; width: 50px; height: 4px; background-color: rgba(255,255,255,0.3); border-radius: 10px; margin: 0 25px 12px;">
            </div>
        </div>

        <div style="padding: 8px 15px 15px;">
            <div
                style="background-color: rgba(67, 97, 238, 0.05); border-radius: 10px; padding: 15px; margin-bottom: 10px;">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <div
                        style="width: 50px; height: 50px; border-radius: 50%; background-color: #e2e8f0; display: flex; justify-content: center; align-items: center; margin-right: 15px; overflow: hidden;">
                        <i class="fas fa-user" style="font-size: 20px; color: #4361ee;"></i>
                    </div>
                    <div>
                        <h5 style="margin: 0 0 5px; font-size: 16px; font-weight: 600; color: #2d3748;">
                            {{ auth()->user()->name }}</h5>
                        <p style="margin: 0; font-size: 14px; color: #718096;">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <ul class="nav flex-column" style="padding: 10px 0; list-style: none; margin: 0;">
                <li class="nav-item" style="margin-bottom: 8px;">
                    <a class="nav-link btn btn-link active" href="{{ route('candidate.dashboard') }}"
                        style="display: flex; align-items: center; text-align: left; color: #3a0ca3; padding: 12px 16px; border-radius: 10px; font-weight: 600; transition: all 0.2s; background-color: rgba(67, 97, 238, 0.1); text-decoration: none; border: none;">
                        <i class="fas fa-tachometer-alt"
                            style="margin-right: 12px; font-size: 16px; width: 20px; text-align: center; color: #4361ee;"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 8px;">
                    <a class="nav-link btn btn-link" href="{{ route('candidate.profile.index') }}"
                        style="display: flex; align-items: center; text-align: left; color: #4a5568; padding: 12px 16px; border-radius: 10px; font-weight: 500; transition: all 0.2s; text-decoration: none; border: none;">
                        <i class="fas fa-user"
                            style="margin-right: 12px; font-size: 16px; width: 20px; text-align: center; color: #718096;"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 8px;">
                    <a class="nav-link btn btn-link" href="{{ route('candidate.applied-jobs.index') }}"
                        style="display: flex; align-items: center; text-align: left; color: #4a5568; padding: 12px 16px; border-radius: 10px; font-weight: 500; transition: all 0.2s; text-decoration: none; border: none;">
                        <i class="fas fa-briefcase"
                            style="margin-right: 12px; font-size: 16px; width: 20px; text-align: center; color: #718096;"></i>
                        <span>My Jobs</span>
                        <span
                            style="margin-left: auto; background-color: rgba(67, 97, 238, 0.1); color: #4361ee; font-size: 12px; padding: 2px 8px; border-radius: 20px; font-weight: 600;">24</span>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: 8px;">
                    <a class="nav-link btn btn-link" href="{{ route('candidate.bookmarked-jobs.index') }}"
                        style="display: flex; align-items: center; text-align: left; color: #4a5568; padding: 12px 16px; border-radius: 10px; font-weight: 500; transition: all 0.2s; text-decoration: none; border: none;">
                        <i class="fas fa-bookmark"
                            style="margin-right: 12px; font-size: 16px; width: 20px; text-align: center; color: #718096;"></i>
                        <span>Saved Jobs</span>
                        <span
                            style="margin-left: auto; background-color: rgba(67, 97, 238, 0.1); color: #4361ee; font-size: 12px; padding: 2px 8px; border-radius: 20px; font-weight: 600;">12</span>
                    </a>
                </li>
            </ul>
        </div>

        <div style="padding: 20px; border-top: 1px solid #e2e8f0; background-color: #f8fafc;">
            <div style="margin-bottom: 15px;">
                <div style="font-size: 13px; color: #718096; margin-bottom: 5px;">Premium until April 28, 2025</div>
                <div style="height: 6px; background-color: #e2e8f0; border-radius: 10px; overflow: hidden;">
                    <div
                        style="height: 100%; width: 65%; background: linear-gradient(to right, #4361ee, #3a0ca3); border-radius: 10px;">
                    </div>
                </div>
            </div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <!-- Logout Button -->
                <a class="nav-link btn" onclick="event.preventDefault(); this.closest('form').submit();"
                    href="{{ route('logout') }}"
                    style="display: block; text-align: center; padding: 12px; border-radius: 10px; font-weight: 600; transition: all 0.3s; background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%); color: white; border: none; text-decoration: none; box-shadow: 0 4px 8px rgba(58, 12, 163, 0.2);">
                    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout Account
                </a>
            </form>
        </div>
    </div>
</div>
<!-- ===== End of Candidate Sidebar ===== -->
