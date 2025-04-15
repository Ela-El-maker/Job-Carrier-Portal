<section id='intro' class='section section-main active'>

    <div class='container-fluid'>

        <div class='v-align'>
            <div class='inner'>
                <div class='intro-text'>

                    <h1>{{ $candidatePortfolio?->candidate?->full_name }}</h1>

                    <p>
                        {{ $candidatePortfolio?->sub_description }}
                    </p>

                    <div class='intro-btns'>

                        <a href='#about' class='btn-custom section-toggle' data-section='about'>
                            Discover More
                        </a>

                        <a href='{{ $candidatePortfolio?->linkedin_url }}' class='btn-custom section-toggle' data-section='contact'>
                            Hire Me
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
