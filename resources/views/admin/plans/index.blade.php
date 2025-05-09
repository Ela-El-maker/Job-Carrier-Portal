@extends('admin.layouts.master')
@section('contents')
    <style>
        .custom-card-width {
            width: 105%;
            /* Increase this value as needed to adjust the width */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h1>Price Plans</h1>
        </div>
        <div class="text-right">
            <a href="{{ route('admin.plans.create') }}" class="btn btn-primary mb-5"><i class="fas fa-plus-circle"></i> Create
                New</a>
        </div>

        <div class="section-body">
            <div class="row">
                @forelse ($plans as $plan)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing custom-card-width"> <!-- Custom class added -->
                            <div class="pricing">
                                @if ($plan?->recommended)
                                    <div class="pricing-title">
                                        Recommended
                                    </div>
                                @endif


                                <div class="pricing-padding">
                                    <div>
                                        @if ($plan?->frontend_show)
                                            <span class="badge bg-primary text-light">Showing at frontend</span>
                                        @endif
                                        @if ($plan?->show_at_home)
                                            <span class="badge bg-success text-light">Showing at home</span>
                                        @endif
                                    </div>

                                    <div>
                                        <h4>
                                            {{ $plan?->label }}
                                        </h4>
                                    </div>
                                    <div class="pricing-price">
                                        <div>${{ $plan?->price }}</div>
                                    </div>
                                    <div class="pricing-details">
                                        <div class="pricing-item">
                                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                            <div class="pricing-item-label">{{ $plan?->job_limit }} Job Post Limit</div>
                                        </div>
                                        <div class="pricing-item">
                                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                            <div class="pricing-item-label">{{ $plan?->featured_job_limit }} Featured Job
                                                Post
                                                Limit</div>
                                        </div>
                                        <div class="pricing-item">
                                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                            <div class="pricing-item-label">{{ $plan?->highlight_job_limit }} Highlight Job
                                                Post
                                            </div>
                                        </div>

                                        <div class="pricing-item">
                                            <div class="pricing-item-icon">
                                                @if ($plan?->golden_job == 0)
                                                    <div class="pricing-item-icon bg-danger text-white"><i
                                                            class="fas fa-times"></i>
                                                    </div>
                                                @else
                                                    <i class="fas fa-check"></i>
                                                @endif
                                            </div>
                                            <div class="pricing-item-label">
                                                {{ $plan?->golden_job }} Golden Job Post
                                            </div>
                                        </div>


                                        <div class="pricing-item">
                                            @if ($plan->profile_verified)
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i>
                                                </div>
                                            @else
                                                <div class="pricing-item-icon bg-danger text-white"><i
                                                        class="fas fa-times"></i>
                                                </div>
                                            @endif
                                            <div class="pricing-item-label">Verify Company</div>

                                        </div>


                                    </div>
                                </div>

                                <div class="pricing-cta" style="display: flex; justify-content: space-between">
                                    <a href="{{ route('admin.plans.edit', $plan->id) }}"
                                        class="w-100 bg-primary text-light">Edit <i class="fas fa-arrow-right"></i></a>
                                    <a href="{{ route('admin.plans.destroy', $plan->id) }}"
                                        class="w-100 bg-danger text-light delete-item">Delete <i
                                            class="fas fa-times"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>
@endsection
