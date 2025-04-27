<section id='about' class='section about-section border-d'>

    <div class='section-block about-block'>
        <div class='container-fluid'>

            <div class='section-header'>
                <h2>
                    {{ $candidatePortfolio?->hero_title }}
                </h2>
            </div>

            <div class='row'>

                <div class='col-md-4'>

                    <ul class='info-list'>

                        <li>
                            <strong>Name:</strong>
                            <span>{{ $candidatePortfolio?->candidate?->full_name }}</span>
                        </li>

                        <li>
                            <strong>Job:</strong>
                            <span>{{ $candidatePortfolio?->candidate?->title }}</span>
                        </li>

                        <li>
                            <strong>Age:</strong>
                            <span>{{ calculateAge($candidatePortfolio?->candidate?->birth_date) }} </span>
                        </li>

                        <li>
                            <strong>Residence:</strong>
                            <span>{{ formatLocation($candidatePortfolio?->candidate?->candidateCountry?->name, $candidatePortfolio?->candidate?->candidateState?->name) }}</span>
                        </li>

                        <li>
                            <strong>Hometown:</strong>
                            <span>{{ formatLocation($candidatePortfolio?->candidate?->candidateCity?->name, $candidatePortfolio?->candidate?->address) }}</span>
                        </li>



                    </ul>

                </div>

                <div class='col-md-8'>

                    <div class='about-text'>
                        <p>{!! $candidatePortfolio?->portfolio_about !!}</p>

                    </div>

                    <div class='about-btns'>
                        @if ($candidatePortfolio?->resume)
                            <a href='{{ asset($candidatePortfolio?->resume) }}' class='btn-custom btn-color' download>
                                Download Resume
                            </a>
                        @endif



                        <a href='{{ $candidatePortfolio?->whatsapp_url }}' class='btn-custom btn-color'>
                            Hire Me
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class='section-block services-block'>

        <div class='container-fluid'>

            <div class='section-header'>

                <h2>My <strong class='color'>Work</strong></h2>

            </div>

            <div class='row'>
                @forelse ($candidatePortfolio->portfolioServices as $service)
                @if ($service?->service_visible)
                    <div class='col-md-4'>
                        <div class='service'>

                            {{-- Icon wrapped in a link --}}
                            <div class='icon'>
                                <a href="{{ $service?->service_url  }}" target="_blank" style="text-decoration: none;">

                                    <i class="{{ $service?->service_icon }}" style="font-size: 50px;"></i>
                                </a>
                            </div>

                            <div class='content'>

                                {{-- Name wrapped in a link --}}
                                <h4>
                                    <a href="{{ $service?->service_url  }}" target="_blank" style="text-decoration: none; color: inherit;">
                                        {{ $service?->service_name }}
                                    </a>
                                </h4>

                                <p>{{ $service?->service_description }}</p>

                            </div>

                        </div>
                    </div>
                @endif
            @empty
                <p class="text-muted fst-italic">No Services have been added yet.</p>
            @endforelse




            </div>


        </div>

    </div>


    {{-- <div class='section-block pricing-block'>

        <div class='section-header'>
            <h2>My <strong class='color'>Pricing</strong>
            </h2>
        </div>


        <div class='row'>

            <div class='col-md-4'>

                <div class='p-table'>

                    <div class='header'>

                        <h4>Basic</h4>

                        <div class='price'>
                            <span class='currency'>$
                            </span>
                            <span class='amount'>19</span>
                            <span class='period'>/HR</span>
                        </div>


                    </div>

                    <ul class='items'>
                        <li>
                            App Desig ni ng
                        </li>
                        <li>
                            App Development
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>

                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>

                </div>

            </div>

            <div class='col-md-4'>

                <div class='p-table'>

                    <div class='header'>

                        <h4>Pro</h4>

                        <div class='price'>
                            <span class='currency'>$</span>
                            <span class='amount'>29</span>
                            <span class='period'>/HR</span>
                        </div>


                    </div>

                    <ul class='items'>
                        <li>
                            App Designing
                        </li>
                        <li>
                            App D evelopment
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>

                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>

                </div>

            </div>

            <div class='col-md-4'>

                <div class='p-table'>

                    <div class='header'>

                        <h4> Gold</h4>

                        <div class='price'>
                            <span class='currency'>$</span>
                            <span class='amount'>39</span>
                            <span class='period'>/HR</span>
                        </div>


                    </div>

                    <ul class='items'>
                        <li>
                            App Designing
                        </li>
                        <li>
                            App Development
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>

                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>

                </div>

            </div>


        </div>
    </div> --}}
</section>
