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
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No popular categories found at the moment.</p>
                    <a href="{{ route('jobs.index') }}" class="btn btn-primary mt-3">Browse All</a>
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
