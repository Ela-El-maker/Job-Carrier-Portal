@extends('frontend.layouts.master')

@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>blog</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <section class="blog-masonry ptb80">
        <div class="container">
            <div class="row">
                <!-- Main content column -->
                <div class="col-md-8 col-sm-12 pr-md-4 blog-main-content">
                    <!-- Blog Post Grid Container -->
                    <div class="row blog-grid-fix">
                        @forelse ($blogs->chunk(2) as $pair)
                            <div class="row mb30">
                                @foreach ($pair as $blog)
                                    <div class="col-md-6 col-xs-12">
                                        <article class="blog-single shadow-hover pb30">
                                            <!-- Post Thumbnail -->
                                            <div class="blog-post-thumbnail normal-post">
                                                <a href="{{ route('blogs.show', $blog?->slug) }}" class="hover-link">
                                                    <img src="{{ asset($blog && $blog->image ? $blog->image : 'frontend/default-uploads/default-blog.png') }}"
                                                        alt="{{ $blog?->title ?? 'Blog image' }}">
                                                </a>
                                            </div>

                                            <!-- Post Detail -->
                                            <div class="blog-post-title pt30 pb10">
                                                <h3>
                                                    <a href="{{ route('blogs.show', $blog?->slug) }}">
                                                        {{ $blog?->title }}
                                                    </a>
                                                </h3>
                                                <p class="nomargin pt5">
                                                    By <a class="blog-author" href="#">{{ $blog?->author?->name }}</a>
                                                    <span class="blog-date">{{ relativeTime($blog?->created_at) }}</span>
                                                </p>
                                            </div>
                                            <div class="blog-post-details pt20">
                                                <p class="nomargin pb20">
                                                    {{ Str::limit(strip_tags($blog?->description), 100, '...') }}
                                                </p>
                                                <a class="btn btn-blue btn-small btn-effect"
                                                    href="{{ route('blogs.show', $blog?->slug) }}">Read More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <h4>No blog posts found</h4>
                                <p class="text-muted">Please check back later or try a different search.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="blog-vertical-divider d-none d-md-block"></div>

                <!-- Blog Sidebar -->
                <div class="col-md-4 col-sm-12 blog-sidebar">
                    <div class="row">
                        <!-- Search -->
                        <div class="col-md-12 mb30">
                            <form action="{{ route('blogs.index') }}" method="get">
                                <input type="text" class="form-control" placeholder="search..." name="search"
                                       value="{{ request()->search }}">
                            </form>
                        </div>

                        <!-- Featured Posts -->
                        <div class="col-md-12 mb30">
                            <h4 class="widget-title">Featured posts</h4>
                            @forelse ($featured as $post)
                                <div class="sidebar-blog-post">
                                    <div class="thumbnail-post">
                                        <a href="{{ route('blogs.show', $post?->slug) }}" class="hover-link">
                                            <img src="{{ asset($post && $post->image ? $post->image : 'frontend/default-uploads/default-blog.png') }}"
                                                 alt="{{ $post?->title ?? 'Blog image' }}">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <a href="{{ route('blogs.show', $post?->slug) }}">{{ $post?->title }}</a>
                                        <span>{{ relativeTime($post?->created_at) }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="sidebar-blog-post empty-featured">
                                    <div class="text-center py-4">
                                        <div class="mb-3">
                                            <i class="fas fa-star-half-alt fa-3x text-muted"></i>
                                        </div>
                                        <h6 class="fw-semibold mb-2">No Featured Posts Yet</h6>
                                        <p class="text-muted small mb-0">Stay tuned for our hand-picked featured content coming soon!</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Popular Posts -->
                        <div class="col-md-12 mb30">
                            <h4 class="widget-title">popular posts</h4>
                            @forelse ($popularPosts as $post)
                                <div class="sidebar-blog-post">
                                    <div class="thumbnail-post">
                                        <a href="{{ route('blogs.show', $post?->slug) }}" class="hover-link">
                                            <img src="{{ asset($post && $post->image ? $post->image : 'frontend/default-uploads/default-blog.png') }}"
                                                 alt="{{ $post?->title ?? 'Blog image' }}">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <a href="{{ route('blogs.show', $post?->slug) }}">{{ $post?->title }}</a>
                                        <span>{{ relativeTime($post?->created_at) }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="sidebar-blog-post empty-featured">
                                    <div class="text-center py-4">
                                        <div class="mb-3">
                                            <i class="fas fa-star-half-alt fa-3x text-muted"></i>
                                        </div>
                                        <h6 class="fw-semibold mb-2">No Popular Posts Yet</h6>
                                        <p class="text-muted small mb-0">Stay tuned for our hand-picked popular content coming soon!</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Social Media -->
                        <div class="col-md-12 mb30">
                            <h4 class="widget-title">share</h4>
                            <ul class="social-btns list-inline mt20">
                                <li>
                                    <a href="#" class="social-btn-roll facebook transparent">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-facebook"></i>
                                            <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-btn-roll twitter transparent">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-twitter"></i>
                                            <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/?text=Check%20out%20this%20job%20{{ url()->current() }}"
                                       class="social-btn-roll whatsapp transparent" target="_blank">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                            <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                       class="social-btn-roll linkedin transparent" target="_blank">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                            <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.reddit.com/submit?url={{ url()->current() }}&title=Check%20this%20job%20out"
                                       class="social-btn-roll reddit transparent" target="_blank">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-reddit"></i>
                                            <i class="social-btn-roll-icon fa fa-reddit"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/pin/create/button/?url={{ url()->current() }}&media=&description=Check%20this%20job%20out"
                                       class="social-btn-roll pinterest transparent" target="_blank">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-pinterest"></i>
                                            <i class="social-btn-roll-icon fa fa-pinterest"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/share/url?url={{ url()->current() }}&text=Check%20this%20job%20out"
                                       class="social-btn-roll telegram transparent" target="_blank">
                                        <div class="social-btn-roll-icons">
                                            <i class="social-btn-roll-icon fa fa-telegram"></i>
                                            <i class="social-btn-roll-icon fa fa-telegram"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social Media -->
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- CSS for the vertical divider -->
<style>
    /* Position the container to allow for absolute positioning of the divider */
    .blog-masonry .row {
        position: relative;
    }

    /* Vertical divider styling */
    .blog-vertical-divider {
        position: absolute;
        left: 66.66%; /* Position at the boundary of col-md-8 */
        top: 0;
        bottom: 0;
        width: 1px;
        background-color: #e0e0e0; /* Light gray color */
    }

    /* Add some spacing between main content and sidebar */
    .blog-main-content {
        padding-right: 30px;
    }

    .blog-sidebar {
        padding-left: 30px;
    }

    /* Hide the divider on mobile screens */
    @media (max-width: 767px) {
        .blog-vertical-divider {
            display: none;
        }

        .blog-main-content,
        .blog-sidebar {
            padding-left: 15px;
            padding-right: 15px;
        }
    }
</style>
@endsection
