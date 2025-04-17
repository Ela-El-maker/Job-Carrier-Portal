<!-- ===== Start of Popular Categories Section ===== -->
<section class="ptb80 bg-light" id="categories3">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h2 class="font-weight-bold">Popular Categories</h2>
            <p class="text-muted">Explore top hiring categories</p>
        </div>

        <div class="row">
            @forelse ($popularJobCategories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition-all text-center py-4 rounded-3">
                        <div class="card-body">
                            <!-- Icon -->
                            <div class="mb-3 text-primary">
                                <i class="{{ $category?->icon }}" style="font-size: 50px;"></i>
                            </div>

                            <!-- Category Info -->
                            <h5 class="card-title mb-2">
                                <a href="{{ route('jobs.index', ['category' => $category?->slug]) }}"
                                    class="text-dark text-decoration-none">
                                    {{ Str::limit($category?->name, 20) }}
                                </a>
                            </h5>
                            <p class="text-muted mb-0">
                                {{ $category?->jobs_count }} open positions
                            </p>
                        </div>
                    </div>
                </div>
            @empty
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="background-color: #f9fafb; border-radius: 8px; padding: 40px 30px; text-align: center; margin: 20px 0; border: 1px solid #e5e7eb;">
                        <div style="display: inline-flex; justify-content: center; align-items: center; width: 70px; height: 70px; background-color: #eef2ff; border-radius: 50%; margin-bottom: 20px;">
                            <svg style="width: 30px; height: 30px; color: #4f46e5;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </div>
                        <h3 style="font-size: 20px; font-weight: 600; color: #111827; margin-bottom: 10px;">No Popular Categories Available</h3>
                        <p style="color: #6b7280; font-size: 16px; max-width: 400px; margin: 0 auto 25px;">We don't have any popular categories to display at the moment. Check back later or browse all available jobs.</p>
                        <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect">Browse All Jobs</a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        @if ($popularJobCategories->count())
            <div class="text-center mt-5">
                <a href="{{ route('jobs.index') }}" class="btn btn-primary">Browse All</a>
            </div>
        @endif

    </div>
</section>
<!-- ===== End of Popular Categories Section ===== -->
