<!-- ===== Start of Featured Categories Section ===== -->
<section class="ptb80" id="categories2">
    <div class="container">

        <div class="section-title">
            <h2>Featured Categories</h2>
        </div>

        <!-- Start of Row -->
        <div class="row nomargin">

            @php
                // Break categories into 2 columns
                $chunks = $featuredCategories->chunk(ceil($featuredCategories->count() / 2));
            @endphp

            @foreach ($chunks as $chunk)
                <div class="col-md-6 col-xs-12 cat-wrapper">
                    <ul>
                        @foreach ($chunk as $category)
                            <li>
                                <a href="{{ route('jobs.index', ['category' => $category->slug]) }}">
                                    <h4>{{ ucfirst($category->name) }}</h4>
                                </a>
                                <span>({{ $category->jobs_count }} open positions)</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

        </div>
        <!-- End of Row -->

        @if ($featuredCategories->count())
            <div class="col-md-12 mt40 text-center">
                <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect nomargin">Browse All</a>
            </div>
        @endif

    </div>
</section>
<!-- ===== End of Featured Categories Section ===== -->
