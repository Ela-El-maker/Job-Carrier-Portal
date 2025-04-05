<!-- ===== Start of Popular Categories Section ===== -->
<section class="ptb80" id="categories3">
    <div class="container">

        <div class="section-title">
            <h2>Popular Categories</h2>
        </div>

        <div class="row nomargin">
            @forelse ($popularJobCategories as $category)
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category shadow-hover ptb30">

                        <!-- Icon -->
                        <div class="category-icon pt10">
                            <i class="{{ $category?->icon }}" style="font-size: 50px;"></i>
                        </div>

                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="{{ route('jobs.index', ['category' => $category?->slug]) }}">
                                {{ Str::limit($category?->name, 20) }}
                            </a>
                            <p>({{ $category?->jobs_count }} open positions)</p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p>No popular categories found at the moment.</p>
                    <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect nomargin">Browse All</a>
                </div>
            @endforelse
        </div>

        @if ($popularJobCategories->count())
            <div class="col-md-12 mt60 text-center">
                <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect nomargin">Browse All</a>
            </div>
        @endif

    </div>
</section>
<!-- ===== End of Popular Categories Section ===== -->
