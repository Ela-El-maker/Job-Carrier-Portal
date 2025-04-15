<section id='resume' class='section resume-section border-d'>

    <div class='section-block timeline-block'>

        <div class='container-fluid'>

            <div class='section-header'>

                <h2>My <strong class='color'>Education</strong></h2>

            </div>

            <ul class='timeline'>
                @forelse ($candidatePortfolio?->educations   as $education)
                    <li>

                        <div class='timeline-content'>

                            <h4>{{ $education?->level }}</h4>

                            <em>
                                <span>{{ $education?->degree }}</span>
                                <span>{{ $education?->year }}</span>
                            </em>

                            <p>{{ $education?->note }}</p>

                        </div>

                    </li>

                @empty
                    <p class="text-muted fst-italic">No education details have been added yet.</p>
                @endforelse




            </ul>

        </div>

    </div>

    <div class='section-block timeline-block'>

        <div class='container-fluid'>

            <div class='section-header'>

                <h2>My <strong class='color'>Experience</strong></h2>

            </div>

            <ul class='timeline'>
                @forelse ($candidatePortfolio?->experiences as $experience)
                    <li>
                        <div class='timeline-content'
                            style="@if ($experience?->currently_working) border: solid 5px #00DD61; @endif">

                            <h4>{{ $experience?->company }}</h4>

                            <em>
                                <span>{{ $experience?->department }} | {{ $experience?->designation }}</span><br>
                                <span>
                                    {{ formatDate($experience?->start) }} -
                                    {{ $experience?->end ? formatDate($experience?->end) : 'Present' }}
                                </span>
                            </em>

                            <p>{{ $experience?->responsibilities }}</p>

                            {{-- Current Status --}}
                            <div style="margin-top: 0.5rem;">
                                @if ($experience->currently_working)
                                    <span
                                        style="background-color: #00DD61; color: white; padding: 2px 8px; border-radius: 4px; font-weight: bold; font-size: 0.875rem;">
                                        ✅ Currently Working Here
                                    </span>
                                @else
                                    <span
                                        style="background-color: #ccc; color: #333; padding: 2px 8px; border-radius: 4px; font-weight: bold; font-size: 0.875rem;">
                                        ❌ No Longer Working Here
                                    </span>
                                @endif
                            </div>

                        </div>
                    </li>
                @empty
                    <p class="text-muted fst-italic">No work experience added yet.</p>
                @endforelse
            </ul>


        </div>
    </div>

    <div class='section-block testimonials-block'>

        <div class='container-fluid'>

            <div class='section-header'>

                <h2>My <strong class='color'> Clients</strong></h2>

            </div>


            <div class='testimonials-slider'>

                @forelse ($candidatePortfolio?->portfolioClients as $client)
                    @if ($client->client_visible)
                        <div class='testimonial'>

                            <div class='icon'>
                                <i class='ion-quote'></i>
                            </div>

                            <p>
                                {{ $client?->client_note }}
                            </p>

                            <div class='author'>
                                <h4>{{ $client?->client_name }}</h4>
                                <span>{{ $client?->client_title }} at {{ $client?->client_company }}</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-muted fst-italic">No Client Responses added yet.</p>
                @endforelse

            </div>

        </div>

    </div>

</section>
