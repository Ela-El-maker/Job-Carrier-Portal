<!-- ===== Start of Featured Categories Section ===== -->
<section class="ptb80" id="categories2">
    <div class="container">
        <div class="section-title">
            <h2>Featured Categories</h2>
        </div>

        @if ($featuredCategories->count() > 0)
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

            <div class="col-md-12 mt40 text-center">
                <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect nomargin">Browse All</a>
            </div>
        @else
            <!-- Clean Empty State UI -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="background-color: #f9fafb; border-radius: 8px; padding: 40px 30px; text-align: center; margin: 20px 0; border: 1px solid #e5e7eb;">
                        <div style="display: inline-flex; justify-content: center; align-items: center; width: 70px; height: 70px; background-color: #eef2ff; border-radius: 50%; margin-bottom: 20px;">
                            <svg style="width: 30px; height: 30px; color: #4f46e5;" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </div>
                        <h3 style="font-size: 20px; font-weight: 600; color: #111827; margin-bottom: 10px;">No Featured Categories Available</h3>
                        <p style="color: #6b7280; font-size: 16px; max-width: 400px; margin: 0 auto 25px;">We don't have any featured categories to display at the moment. Check back later or browse all available jobs.</p>
                        <a href="{{ route('jobs.index') }}" class="btn btn-blue btn-effect">Browse All Jobs</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- ===== End of Featured Categories Section ===== -->
