<!-- =============== Start of Professional Header Navigation =============== -->

<style>
    /* Global styles */
    .header-nav {
        font-family: 'Roboto', sans-serif;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Top bar styling */
    .top-bar {
        background-color: #87c8e6;
        padding: 8px 0;
        font-size: 14px;
        border-bottom: 1px solid #e9ecef;
    }

    /* Navigation bar */
    .fluid_header {
        background-color: #fff;
        padding: 15px 0;
    }

    .navbar-brand {
        padding: 0;
    }

    .navbar-brand img {
        max-height: 40px;
        width: auto;
    }

    /* Main menu */
    .main-nav {
        padding-top: 10px;
        white-space: nowrap;
    }

    .single-line-nav {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: visible;
        width: 100%;
    }

    .main-nav .nav>li {
        display: inline-block;
        float: none;
    }

    .main-nav .nav>li>a {
        color: #333;
        font-weight: 500;
        padding: 10px 12px;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .main-nav .nav>li>a:hover,
    .main-nav .nav>li>a:focus {
        color: #007bff;
        background-color: transparent;
    }

    .main-nav .dropdown-menu {
        border-radius: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 0;
    }

    .main-nav .dropdown-menu li a {
        padding: 10px 20px;
        color: #333;
        transition: all 0.3s ease;
    }

    .main-nav .dropdown-menu li a:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }

    /* Authentication buttons */
    .auth-btn {
        border-radius: 4px;
        padding: 8px 12px;
        margin-left: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .login-btn {
        color: white;
        background-color: #007bff;
        border: none;
    }

    .login-btn:hover {
        background-color: #0069d9;
    }

    .company-btn {
        color: white;
        background-color: #0d6efd;
        border: none;
        min-width: 100px;
    }

    .company-btn:hover {
        background-color: #0b5ed7;
    }

    .candidate-btn {
        color: white;
        background-color: #28a745;
        border: none;
        min-width: 100px;
    }

    .candidate-btn:hover {
        background-color: #218838;
    }

    /* Mobile menu toggle */
    .navbar-toggle {
        border: none;
        background: transparent;
        margin-top: 8px;
    }

    .navbar-toggle .icon-bar {
        background-color: #333;
        width: 25px;
        height: 3px;
        margin: 4px 0;
    }

    /* Additional responsive adjustments to keep items in one line */
    .auth-item {
        display: inline-block !important;
    }

    @media (min-width: 768px) and (max-width: 1199px) {
        .main-nav .nav>li>a {
            padding: 10px 8px;
            font-size: 13px;
        }

        .auth-btn {
            padding: 8px 10px;
            font-size: 13px;
        }

        .company-btn,
        .candidate-btn {
            min-width: 90px;
        }

        .navbar-brand img {
            max-height: 35px;
        }
    }

    /* Mobile responsive adjustments */
    @media (max-width: 767px) {
        .top-bar span {
            display: none;
        }

        .social-btns {
            text-align: center;
        }

        .auth-btn {
            margin: 5px 0;
            display: block;
            text-align: center;
        }

        .main-nav .nav {
            display: block;
        }

        .main-nav .nav>li {
            display: block;
        }
    }
</style>

<header class="header-nav">
    @php
        $navigationMenu = \Menu::getByName('Navigation Menu');
        $headerSocials = \App\Models\SocialIcon::where(['show' => 1])
            ->take(4)
            ->get();
        // $header = \App\Models\Footer::first();
    @endphp

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <span>Get in touch with us!</span>
                </div>
                <div class="col-md-6 col-xs-12">
                    <ul class="social-btns list-inline text-right">
                        @foreach ($headerSocials as $link)
                            <li>
                                <a href="{{ $link->url ?? '#' }}" class="social-btn-roll"
                                    aria-label="{{ $link->name ?? 'Social media' }}">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon {{ $link->icon ?? '' }}"></i>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-default fluid_header">
        <div class="container">
            <div class="row">
               <!-- Logo -->
<div class="col-md-3 col-sm-6 col-xs-8 d-flex align-items-center">
    <a class="navbar-brand" href="{{ url('/') }}" style="padding: 5px 0;">
        <img src="{{ config('settings.site_logo') }}"
             alt="Company Logo"
             style="height: 70px; width: auto; max-width: 200px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">
    </a>
</div>

                <!-- Navigation Menu -->
                <div class="col-md-9 col-sm-6 col-xs-4">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Main Nav Items -->
                    <div class="collapse navbar-collapse main-nav" id="main-nav">
                        <ul class="nav navbar-nav navbar-right single-line-nav">
                            @foreach ($navigationMenu as $menu)
                                @if (!empty($menu['child']))
                                    <li class="dropdown">
                                        <a href="{{ $menu['link'] ?? '#' }}" class="dropdown-toggle"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ $menu['label'] ?? '' }} <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($menu['child'] as $child)
                                                <li><a
                                                        href="{{ $child['link'] ?? '#' }}">{{ $child['label'] ?? '' }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $menu['link'] ?? '#' }}">{{ $menu['label'] ?? '' }}</a>
                                    </li>
                                @endif
                            @endforeach

                            <!-- Authentication Button -->
                            <li class="auth-item">
                                @guest
                                    <a href="{{ route('login') }}" class="auth-btn login-btn">
                                        <i class="fa fa-lock"></i> Login
                                    </a>
                                @else
                                    @if (auth()->user()->role === 'company')
                                        <a href="{{ route('company.dashboard') }}" class="auth-btn company-btn">
                                            <i class="fa fa-building"></i> Company
                                        </a>
                                    @elseif (auth()->user()->role === 'candidate')
                                        <a href="{{ route('candidate.dashboard') }}" class="auth-btn candidate-btn">
                                            <i class="fa fa-user"></i> Candidate
                                        </a>
                                    @endif
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- =============== End of Professional Header Navigation =============== -->
