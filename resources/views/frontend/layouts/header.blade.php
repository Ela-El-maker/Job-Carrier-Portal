<!-- =============== Start of Header 3 Navigation =============== -->
<header class="header3">
    @php
        $navigationMenu = \Menu::getByName('Navigation Menu');
        // dd($navigationMenu);

        $headerSocials = \App\Models\SocialIcon::where(['show'=>1])->take(4)->get();
        $header = \App\Models\Footer::first();
    @endphp
    <!-- ===== Start of Top Bar ===== -->
    <div class="top-bar">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-xs-12">
                    <span>Get in touch with us!</span>
                </div>

                <div class="col-md-6 col-xs-12">
                    <!-- Start of Social Media Buttons -->
                    <ul class="social-btns list-inline text-right">
                        <!-- Social Media -->


                       @foreach ($headerSocials as $link)
                           <li>
                            <a href="{{ $link?->url }}" class="social-btn-roll facebook transparent">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon {{ $link?->icon }}"></i>
                                    <i class="social-btn-roll-icon {{ $link?->icon }}"></i>
                                </div>
                            </a>
                        </li>
                       @endforeach
                    </ul>
                    <!-- End of Social Media Buttons -->
                </div>

            </div>
        </div>
    </div>
    <!-- ===== End of Top Bar ===== -->


    <nav class="navbar navbar-default navbar-static-top fluid_header centered">
        <div class="container">

            <!-- Logo -->
            <div class="col-md-2 col-sm-6 col-xs-8 nopadding">
                <a class="navbar-brand nomargin" href="{{ url('/') }}"><img src="{{ $header?->logo }}"
                        alt="logo"></a>
                <!-- INSERT YOUR LOGO HERE -->
            </div>

            <!-- ======== Start of Main Menu ======== -->
            <div class="col-md-10 col-sm-6 col-xs-4 nopadding">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle toggle-menu menu-right push-body" data-toggle="collapse"
                        data-target="#main-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Start of Main Nav -->
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="main-nav">
                    <ul class="nav navbar-nav pull-right">

                        <!-- Mobile Menu Title -->
                        <li class="mobile-title">
                            <h4>main menu</h4>
                        </li>
                        @foreach ($navigationMenu as $menu)
                            @if ($menu['child'])
                                <!-- Simple Menu Item -->
                                <li class="dropdown simple-menu">
                                    <a href="{{ $menu['link'] }}" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button">{{ $menu['label'] }}<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($menu['child'] as $child)
                                            <li><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="dropdown simple-menu">
                                    <a href="{{ $menu['link'] }}" role="button" data-toggle=""
                                        class="">{{ $menu['label'] }}</a>

                                </li>
                            @endif
                        @endforeach


                        <!-- Login Menu Item -->
                        <li class="menu-item login-btn">
                            @guest
                                <a id="modal_trigger" href="{{ route('login') }}" role="button"><i
                                        class="fa fa-lock"></i>login</a>
                            @endguest
                            @auth
                                @if (auth()->user()->role === 'company')
                                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 250px;height: 50px;"
                                        href="{{ route('company.dashboard') }}">Company Dashboard</a>
                                @elseif (auth()->user()->role === 'candidate')
                                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 250px;height: 50px;"
                                        href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a>
                                @endif

                            @endauth
                        </li>


                    </ul>
                </div>
                <!-- End of Main Nav -->
            </div>
            <!-- ======== End of Main Menu ======== -->

        </div>
    </nav>
</header>

<!-- =============== End of Header 3 Navigation =============== -->
