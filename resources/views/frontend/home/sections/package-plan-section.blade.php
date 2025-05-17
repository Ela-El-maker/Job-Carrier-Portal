<!-- ===== Start of Pricing Tables Section ===== -->
<section class="pricing-tables pb80">
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            @foreach ($plans as $plan)
                <!-- Start of Pricing Table -->
                <div class="col-md-4 col-xs-12 mt80">
                    @if ($plan?->recommended)
                        <div class="pricing-table shadow-hover" id="popular">
                    @else
                        <div class="pricing-table shadow-hover" id="">
                    @endif

                        <!-- Pricing Header -->
                        <div class="pricing-header">
                            <h2>{{ $plan?->label }}</h2>
                        </div>

                        <!-- Pricing -->
                        <div class="pricing">
                            <span class="currency">$</span>
                            <span class="amount">{{ $plan?->price }}</span>
                            <span class="month">per month</span>
                        </div>

                        <!-- Pricing Body -->
                        <div class="pricing-body">
                            <ul class="list">
                                <li>{{ $plan?->job_limit }} Job Limits</li>
                                <li>{{ $plan?->featured_job_limit }} Featured Job Limits</li>
                                <li>{{ $plan?->highlight_job_limit }} Highlight Job Limits</li>
                                <li>{{ $plan?->golden_job }} Golden Job Limits</li> <!-- New Line -->
                                @if ($plan?->profile_verified)
                                    <li>Verified Profile</li>
                                @else
                                    <strike>Verified Profile</strike>
                                @endif
                            </ul>
                        </div>

                        <!-- Pricing Footer -->
                        <div class="pricing-footer">
                            <a href="{{ route('checkout.index', $plan?->id) }}" class="btn btn-blue btn-effect">get started</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- End Row -->
    </div>
</section>
<!-- ===== End of Pricing Tables Section ===== -->
