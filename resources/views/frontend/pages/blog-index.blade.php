@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>blog</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">blog</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <section class="blog-masonry ptb80">
        <div class="container">
            <div class="row">
                <!-- Main content column -->
                <div class="col-md-8 col-xs-12">
                    <div class="row blog-grid">
                        @forelse ($blogs as $blog)
                            <!-- Start of Blog Post 1 with Image Thumbnail -->
                            <div class="element col-md-6 col-xs-12">
                                <article class="blog-single shadow-hover pb30">
                                    <!-- Post Thumbnail -->
                                    <div class="blog-post-thumbnail normal-post">
                                        <a href="{{ route('blogs.show', $blog?->slug) }}" class="hover-link"><img
                                                src="{{ asset($blog?->image) }}" alt=""></a>
                                    </div>

                                    <!-- Post Detail -->
                                    <div class="blog-post-title pt30 pb10">
                                        <h3><a href="{{ route('blogs.show', $blog?->slug) }}">{{ $blog?->title }}</a></h3>
                                        <p class="nomargin pt5">By <a class="blog-author"
                                                href="#">{{ $blog?->author?->name }}</a> <span
                                                class="blog-date">{{ relativeTime($blog?->created_at) }}</span></p>
                                    </div>
                                    <div class="blog-post-details pt20">
                                        <p class="nomargin pb20">
                                            {{ Str::limit(strip_tags($blog?->description), 100, '...') }}</p>
                                        <a class="btn btn-blue btn-small btn-effect"
                                            href="{{ route('blogs.show', $blog?->slug) }}">Read More</a>
                                    </div>
                                </article>
                            </div>
                            <!-- End of Blog Post 1 -->
                        @empty
                            <div class="col-md-12 text-center py-5">
                                <div class="empty-state mb-4">
                                    <i class="fas fa-newspaper fa-4x text-blue opacity-50"></i>
                                </div>
                                <h2 class="mb-3">No Blog Posts Yet</h2>
                                <p class="lead mb-4">We're working on creating some amazing content for you.</p>
                                <p class="text-muted mb-4">Our team of writers is crafting insightful articles that will
                                    appear here soon.</p>
                                <a href="{{ url('/') }}" class="btn btn-blue btn-effect">Back to Home</a>
                            </div>
                        @endforelse



                        <!-- Add more blog posts here... -->
                    </div>
                </div>

                <!-- Start of Blog Sidebar -->
                <div class="col-md-4 col-xs-12 blog-sidebar">

                    <!-- Start of Search -->
                    <div class="col-md-12">
                        <form action="{{ route('blogs.index') }}" method="get">
                            <input type="text" class="form-control" placeholder="search..." name="search"
                                value="{{ request()->search }}">
                        </form>
                    </div>
                    <!-- End of Search -->
                    <!-- Start of Popular Posts -->
                    <div class="col-md-12 clearfix mt40">
                        <h4 class="widget-title">Featured posts</h4>

                        @forelse ($featured as $post)
                            <!-- Blog Post 1 -->
                            <div class="sidebar-blog-post">
                                <!-- Thumbnail -->
                                <div class="thumbnail-post">
                                    <a href="{{ route('blogs.show', $post?->slug) }}">
                                        <img src="{{ asset($post?->image) }}" alt="">
                                    </a>
                                </div>

                                <!-- Link -->
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
                                    <p class="text-muted small mb-0">Stay tuned for our hand-picked featured content coming
                                        soon!</p>
                                </div>
                            </div>
                        @endforelse



                    </div>
                    <!-- End of Popular Posts -->

                    <!-- Start of Popular Posts -->
                    <div class="col-md-12 clearfix mt40">
                        <h4 class="widget-title">popular posts</h4>

                        @forelse ($popularPosts as $post)
                            <!-- Blog Post 1 -->
                            <div class="sidebar-blog-post">
                                <!-- Thumbnail -->
                                <div class="thumbnail-post">
                                    <a href="{{ route('blogs.show', $post?->slug) }}">
                                        <img src="{{ asset($post?->image) }}" alt="">
                                    </a>
                                </div>

                                <!-- Link -->
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
                                    <p class="text-muted small mb-0">Stay tuned for our hand-picked popular content coming
                                        soon!</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- End of Popular Posts -->






                    <!-- Start of Social Media -->
                    <div class="col-md-12 mt40">
                        <h4 class="widget-title">share</h4>

                        <!-- Start of Social Media ul -->
                        <ul class="social-btns list-inline mt20">
                            <!-- Social Media -->
                            <li>
                                <a data-social="facebook" href="#" class="social-btn-roll facebook transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a data-social="twitter" href="#" class="social-btn-roll twitter transparent">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
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
                        <!-- End of Social Media ul -->
                    </div>
                    <!-- Start of Social Media -->
                </div>
                <!-- End of Blog Sidebar -->
            </div>
        </div>
    </section>
@endsection
