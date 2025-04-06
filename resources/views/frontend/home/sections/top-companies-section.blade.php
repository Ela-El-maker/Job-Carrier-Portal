<section class="ptb40" id="partners">
    <div class="container">
        <div class="section-title">
            <h2>popular Companies</h2>
        </div>

        <!-- Start of Owl Slider -->
        <div class="owl-carousel partners-slider">
            @forelse ($popularCompanies as $company)
                <div class="item">
                    <a href="{{ route('companies.show', $company->slug) }}" title="{{ $company->name }}">
                        <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" class="img-fluid"
                            style="max-height: 80px; width: auto;">
                    </a>
                </div>

            @empty
            @endforelse


        </div>
        <!-- End of Owl Slider -->

    </div>
</section>
