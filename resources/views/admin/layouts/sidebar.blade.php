<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b>
                            <p>Hello, Bro!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>


                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>


                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <a href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                               this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>

            <li class="menu-header">Starter</li>

            <li class="{{ setSidebarActive(['admin.orders.*']) }}"><a class="nav-link"
                    href="{{ route('admin.orders.index') }}"><i class="far fa-square"></i> <span>Orders</span></a></li>
            <li class="{{ setSidebarActive(['admin.job-categories.*']) }}"><a class="nav-link"
                    href="{{ route('admin.job-categories.index') }}"><i class="far fa-square"></i> <span>Job
                        Category</span></a></li>
            <li class="{{ setSidebarActive(['admin.jobs.*']) }}"><a class="nav-link"
                    href="{{ route('admin.jobs.index') }}"><i class="far fa-square"></i> <span>Job
                        Post </span></a></li>

            <li class="dropdown {{ setSidebarActive(['admin.industry-types.*', 'admin.organization-types.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.hero.*']) }}"><a class="nav-link"
                            href="{{ route('admin.hero.index') }}">Hero</a></li>
                    <li class="{{ setSidebarActive(['admin.blog-section-setting.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-section-setting.index') }}">Blog</a></li>

                    <li class="{{ setSidebarActive(['admin.custom-section.*']) }}"><a class="nav-link"
                            href="{{ route('admin.custom-section.index') }}">Custom Section</a></li>

                            <li class="{{ setSidebarActive(['admin.reviews.*']) }}"><a class="nav-link"
                                href="{{ route('admin.reviews.index') }}">Client Reviews</a></li>
                </ul>
            </li>


            <li class="{{ setSidebarActive(['admin.blogs.*']) }}"><a class="nav-link"
                    href="{{ route('admin.blogs.index') }}"><i class="far fa-square"></i> <span>Blogs</span></a></li>

            <li class="dropdown {{ setSidebarActive(['admin.industry-types.*', 'admin.organization-types.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Attributes</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.industry-types.*']) }}"><a class="nav-link"
                            href="{{ route('admin.industry-types.index') }}">Industry Type</a></li>
                    <li class="{{ setSidebarActive(['admin.organization-types.*']) }}"><a class="nav-link"
                            href="{{ route('admin.organization-types.index') }}">Organization Type</a></li>
                    <li class="{{ setSidebarActive(['admin.languages.*']) }}"><a class="nav-link"
                            href="{{ route('admin.languages.index') }}">Languages</a></li>
                    <li class="{{ setSidebarActive(['admin.professions.*']) }}"><a class="nav-link"
                            href="{{ route('admin.professions.index') }}">Professions</a></li>
                    <li class="{{ setSidebarActive(['admin.skills.*']) }}"><a class="nav-link"
                            href="{{ route('admin.skills.index') }}">Skills</a></li>
                    {{-- <li class="{{ setSidebarActive(['admin.job-categories.*']) }}"><a class="nav-link"
                            href="{{ route('admin.job-categories.index') }}"> <span>Job
                                Categories</span></a></li> --}}

                    <li class="{{ setSidebarActive(['admin.job-type.*']) }}"><a class="nav-link"
                            href="{{ route('admin.job-type.index') }}"> <span>Job
                                Type</span></a></li>

                    <li class="{{ setSidebarActive(['admin.job-role.*']) }}"><a class="nav-link"
                            href="{{ route('admin.job-role.index') }}"> <span>Job
                                Roles</span></a></li>

                    <li class="{{ setSidebarActive(['admin.job-experience.*']) }}"><a class="nav-link"
                            href="{{ route('admin.job-experience.index') }}"> <span>Job
                                Experiences</span></a></li>

                    <li class="{{ setSidebarActive(['admin.salary-type.*']) }}"><a class="nav-link"
                            href="{{ route('admin.salary-type.index') }}"> <span>Salary
                                Type</span></a></li>

                    <li class="{{ setSidebarActive(['admin.tag.*']) }}"><a class="nav-link"
                            href="{{ route('admin.tag.index') }}"> <span>Tags</span></a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.educations.*']) }}"><a class="nav-link"
                            href="{{ route('admin.educations.index') }}">
                            <span>Educations</span></a></li>


                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.countries.*', 'admin.states.*', 'admin.cities.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Locations</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.countries.*']) }}"><a class="nav-link"
                            href="{{ route('admin.countries.index') }}">Countries</a></li>
                    <li class="{{ setSidebarActive(['admin.states.*']) }}"><a class="nav-link"
                            href="{{ route('admin.states.index') }}">States</a></li>
                    <li class="{{ setSidebarActive(['admin.cities.*']) }}"><a class="nav-link"
                            href="{{ route('admin.cities.index') }}">Cities</a></li>

                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.plans.*']) }}"><a class="nav-link"
                    href="{{ route('admin.plans.index') }}"><i class="far fa-square"></i> <span>Price Plan</span></a>
            </li>

            <li class="{{ setSidebarActive(['admin.payment-settings.index']) }}"><a class="nav-link"
                    href="{{ route('admin.payment-settings.index') }}"><i class="far fa-square"></i> <span>Payment
                        Settings</span></a></li>
            <li class="{{ setSidebarActive(['admin.site-settings.index']) }}"><a class="nav-link"
                    href="{{ route('admin.site-settings.index') }}"><i class="far fa-square"></i> <span>Site
                        Settings</span></a></li>

            {{-- <li class="{{ setSidebarActive(['admin.orders.*']) }}"><a class="nav-link"
                    href="{{ route('admin.orders.index') }}"><i class="far fa-square"></i> <span>Orders</span></a>
            </li> --}}

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        </ul>


    </aside>
</div>
