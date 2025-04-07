<section class="ptb80" id="latest-news">
    <div class="container">

        <!-- Section Title -->
        <div class="section-title">
            <h2>{{ $blogTitle?->title }}</h2>
        </div>
        @forelse ($blogs as $blog)
            <!-- Start of Blog Post -->
            <div class="col-md-4 col-xs-12">
                <div class="blog-post">
                    <!-- Blog Post Image -->
                    <div class="blog-post-thumbnail">
                        <a href="{{ $blog?->slug }}" class="hover-link">
                            <img src="{{ asset($blog?->image) }}" alt="{{ $blog?->title }}">
                        </a>
                    </div>

                    <!-- Blog Post Info -->
                    <div class="post-info">
                        <a href="{{ route('blogs.show', $blog?->slug) }}">{{ $blog?->title }}</a>

                        <div class="post-details">
                            <span class="date"><i
                                    class="fa fa-calendar"></i>{{ relativeTime($blog?->created_at) }}</span>
                            <span class="comments"><i class="fa fa-user"></i>{{ $blog?->author?->name }}</span>
                        </div>

                        <p>{{ Str::limit(strip_tags($blog?->description), 65, '...') }}</p>

                    </div>

                    <!-- Read More Button -->
                    <a href="{{ route('blogs.show', $blog?->slug) }}" class="btn btn-blue btn-small btn-effect">read
                        more</a>

                </div>
            </div>
            <!-- End of Blog Post -->
        @empty
            <div class="no-posts-message"
                style="grid-column: 1 / -1;
                        text-align: center;
                        padding: 2rem;
                        background-color: #f8f9fa;
                        border-radius: 8px;
                        font-style: italic;
                        color: #777;">

                <p>No blog posts available at the moment.</p>
            </div>
        @endforelse




        <div class="col-md-12 col-xs-12 mt60 text-center">
            <p>{!! $blogTitle?->description !!}</p>

            <a href="{{ route('blogs.index') }}" class="btn btn-purple btn-effect mt20">visit blog</a>
        </div>

    </div>
</section>
