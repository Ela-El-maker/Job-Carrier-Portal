@extends('frontend.layouts.master')
@section('contents')
    <style>
        /* General styling */
        .blog-content {
            padding: 60px 0;
        }

        /* Post styling */
        .blog-post-wrapper {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin-bottom: 30px;
            padding: 30px;
        }

        .post-header {
            margin-bottom: 20px;
        }

        .post-title {
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .post-meta {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .post-meta span {
            margin-right: 15px;
        }

        .post-meta i {
            margin-right: 5px;
        }

        .post-featured-image {
            margin-bottom: 25px;
        }

        .post-featured-image img {
            width: 100%;
            border-radius: 4px;
        }

        .post-content {
            line-height: 1.7;
            margin-bottom: 30px;
            font-size: 16px;
        }

        /* Post tags */
        .post-tags {
            margin: 30px 0;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .post-tags h4 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        /* Social share */
        .post-share {
            margin: 30px 0;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .post-share h4 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .social-share .social-btn {
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            border-radius: 50%;
            color: #fff;
            margin-right: 5px;
            transition: all 0.3s;
        }

        .social-share .facebook {
            background-color: #3b5998;
        }

        .social-share .twitter {
            background-color: #1da1f2;
        }

        .social-share .linkedin {
            background-color: #0077b5;
        }

        .social-share .whatsapp {
            background-color: #25D366;
        }

        .social-share .pinterest {
            background-color: #bd081c;
        }

        .social-share .social-btn:hover {
            opacity: 0.85;
        }

        /* Author bio */
        .author-bio {
            background: #f9f9f9;
            padding: 25px;
            margin: 30px 0;
            border-radius: 4px;
        }

        .author-bio h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .author-image img {
            max-width: 100%;
        }

        .author-social {
            margin-top: 15px;
        }

        .author-social li {
            margin-right: 10px;
        }

        /* Post navigation */
        .post-navigation {
            margin: 30px 0;
            padding: 20px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .post-navigation span {
            display: block;
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .post-navigation h5 {
            margin: 0;
            font-weight: 600;
        }

        .next-post {
            text-align: right;
        }

        /* Related posts */
        .related-posts {
            margin: 40px 0;
        }

        .related-posts h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .related-post-item {
            margin-bottom: 15px;
        }

        .related-post-item img {
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .related-post-item h5 {
            margin: 10px 0;
            font-weight: 600;
        }

        .post-date {
            font-size: 13px;
            color: #777;
        }

        /* Comments */
        .comments-section {
            margin: 40px 0;
        }

        .comments-section h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .comment-list {
            list-style: none;
            padding: 0;
        }

        .comment {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
        }

        .comment-avatar {
            float: left;
            margin-right: 20px;
        }

        .comment-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .comment-content {
            overflow: hidden;
        }

        .comment-author {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .comment-meta {
            margin-bottom: 10px;
            font-size: 13px;
            color: #777;
        }

        .comment-reply {
            margin-top: 15px;
        }

        .comment-form-wrapper {
            margin-top: 40px;
        }

        .comment-form-wrapper h3 {
            margin-bottom: 20px;
        }

        /* Sidebar */
        .blog-sidebar {
            margin-bottom: 30px;
        }

        .widget {
            margin-bottom: 30px;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            padding: 25px;
        }

        .widget-title {
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .widget-title:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: #007bff;
        }

        /* Search widget */
        .search-widget .input-group {
            width: 100%;
        }

        /* Categories widget */
        .categories-widget ul li {
            border-bottom: 1px solid #eee;
            padding: 8px 0;
        }

        .categories-widget ul li:last-child {
            border-bottom: none;
        }

        .categories-widget .badge {
            background: #007bff;
        }

        /* Recent posts widget */
        .recent-post {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .recent-post:first-child {
            padding-top: 0;
        }

        .recent-post:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .recent-post h5 {
            margin: 0 0 5px;
            font-size: 14px;
            font-weight: 600;
        }

        /* Tags widget */
        .tag-cloud {
            margin-bottom: 0;
        }

        .tag-cloud li {
            margin: 3px;
        }

        .tag-cloud a {
            display: inline-block;
            padding: 4px 10px;
            background: #f5f5f5;
            border-radius: 3px;
            color: #666;
            font-size: 13px;
            transition: all 0.3s;
        }

        .tag-cloud a:hover {
            background: #007bff;
            color: #fff;
            text-decoration: none;
        }

        /* Newsletter widget */
        .newsletter-widget p {
            margin-bottom: 15px;
        }

        /* Social widget */
        .social-icons {
            margin-bottom: 0;
        }

        .social-icons li {
            margin: 0 5px 5px 0;
        }

        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            border-radius: 4px;
            color: #fff;
            transition: all 0.3s;
        }

        .social-icons .facebook {
            background-color: #3b5998;
        }

        .social-icons .twitter {
            background-color: #1da1f2;
        }

        .social-icons .linkedin {
            background-color: #0077b5;
        }

        .social-icons .instagram {
            background-color: #e4405f;
        }

        .social-icons .youtube {
            background-color: #ff0000;
        }

        .social-icons a:hover {
            opacity: 0.85;
        }

        /* Call to action */
        .cta-section {
            padding: 40px 0;
            background: #007bff;
            color: #fff;
        }

        .cta-title {
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .cta-description {
            margin-bottom: 0;
            font-size: 16px;
            opacity: 0.9;
        }

        .review-content img {
            max-width: 100%;
            max-height: 250px;
            height: auto;
            width: auto;
            border-radius: 6px;
            object-fit: contain;
            display: block;
            margin: 10px 0;
        }

        /* Responsive styles */
        @media (max-width: 767px) {
            .post-navigation .next-post {
                text-align: left;
                margin-top: 15px;
            }

            .cta-section .text-right {
                text-align: left;
                margin-top: 15px;
            }
        }
    </style>
    <!-- =============== Start of Page Header Section =============== -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-uppercase">Blog</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header Section =============== -->

    <!-- ===== Start of Blog Content Section ===== -->
    <section class="blog-content ptb60">
        <div class="container">
            <div class="row">
                <!-- Main Content Column -->
                <div class="col-md-8">
                    <div class="blog-post-wrapper">
                        <!-- Post Header -->
                        <div class="post-header">
                            <h2 class="post-title">{{ $blog?->title }}</h2>
                            <div class="post-meta">
                                <span><i class="fa fa-user"></i> {{ $blog?->author?->name }}</span>
                                <span><i class="fa fa-calendar"></i> {{ $blog?->created_at->format('F d, Y') }}</span>
                                <span><i class="fa fa-comments"></i> {{ $blog->comments->count() }}
                                    {{ Str::plural('Comment', $blog->comments->count()) }}</span>
                                @if ($blog?->category)
                                    <span><i class="fa fa-folder"></i> {{ $blog?->category?->name }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="post-featured-image">
                            <img src="{{ asset($blog?->image) }}" class="img-responsive" alt="{{ $blog?->title }}">
                        </div>

                        <!-- Post Content -->
                        <div class="post-content review-content">
                            {!! $blog?->description !!}
                        </div>

                        <!-- Post Tags -->
                        {{-- @if ($blog?->tags && count($blog?->tags) > 0)
                            <div class="post-tags">
                                <h4>Tags:</h4>
                                <ul class="list-inline">
                                    @foreach ($blog?->tags as $tag)
                                        <li><a href="{{ route('blog.tag', $tag->slug) }}"
                                                class="btn btn-sm btn-default">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <!-- Post Share -->
                        <div class="post-share">
                            <h4>Share This Post:</h4>
                            <ul class="social-share list-inline">
                                <!-- Facebook -->
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                        class="social-btn facebook" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <!-- Twitter -->
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $blog?->title }}"
                                        class="social-btn twitter" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <!-- LinkedIn -->
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                        class="social-btn linkedin" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <!-- WhatsApp -->
                                <li>
                                    <a href="https://wa.me/?text={{ $blog?->title }} {{ url()->current() }}"
                                        class="social-btn whatsapp" target="_blank">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <!-- Pinterest -->
                                <li>
                                    <a href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&media={{ asset($blog?->image) }}&description={{ $blog?->title }}"
                                        class="social-btn pinterest" target="_blank">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Author Bio -->
                        @if ($blog?->author)
                            <div class="author-bio">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <div class="author-image">
                                            <img src="{{ asset($blog?->author?->avatar ?? 'images/default-avatar.png') }}"
                                                class="img-circle" alt="{{ $blog?->author?->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-10">
                                        <h4>{{ $blog?->author?->name }}</h4>
                                        <p>{{ $blog?->author?->bio ?? 'Author bio not available.' }}</p>
                                        @if ($blog?->author?->social_links)
                                            <ul class="author-social list-inline">
                                                @foreach ($blog?->author?->social_links as $platform => $link)
                                                    <li><a href="{{ $link }}" target="_blank"><i
                                                                class="fa fa-{{ strtolower($platform) }}"></i></a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Post Navigation -->
                        <div class="post-navigation">
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- @if ($previousPost)
                                        <div class="prev-post">
                                            <span><i class="fa fa-arrow-left"></i> Previous Post</span>
                                            <h5><a
                                                    href="{{ route('blog.show', $previousPost->slug) }}">{{ $previousPost->title }}</a>
                                            </h5>
                                        </div>
                                    @endif --}}
                                </div>
                                <div class="col-md-6">
                                    {{-- @if ($nextPost)
                                        <div class="next-post text-right">
                                            <span>Next Post <i class="fa fa-arrow-right"></i></span>
                                            <h5><a
                                                    href="{{ route('blog.show', $nextPost->slug) }}">{{ $nextPost->title }}</a>
                                            </h5>
                                        </div>
                                    @endif --}}
                                </div>
                            </div>
                        </div>

                        <!-- Related Posts -->
                        {{-- @if (isset($relatedPosts) && count($relatedPosts) > 0)
                            <div class="related-posts">
                                <h3>Related Posts</h3>
                                <div class="row">
                                    @foreach ($relatedPosts as $post)
                                        <div class="col-md-4">
                                            <div class="related-post-item">
                                                <a href="{{ route('blog.show', $post->slug) }}">
                                                    <img src="{{ asset($post->thumbnail) }}" class="img-responsive"
                                                        alt="{{ $post->title }}">
                                                </a>
                                                <h5><a
                                                        href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h5>
                                                <span class="post-date"><i class="fa fa-calendar"></i>
                                                    {{ $post->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif --}}

                        <!-- Comments Section -->
                        <div class="comments-section">
                            <h3>{{ $blog->comments->count() }} {{ Str::plural('Comment', $blog->comments->count()) }}</h3>

                            <!-- Comment List -->
                            {{-- @if ($blog->comments->count() > 0)
                                <ul class="comment-list">
                                    @foreach ($blog->comments as $comment)
                                        @include('frontend.pages.comments._comment', [
                                            'comment' => $comment,
                                            'depth' => 0,
                                        ])
                                    @endforeach
                                </ul>
                            @else
                                <div class="no-comments">
                                    <p>No comments yet. Be the first to comment!</p>
                                </div>
                            @endif --}}

                            <!-- Comment Form -->
                            <div class="comment-form-wrapper">
                                <h3>Leave a Comment</h3>
                                {{-- @auth
                                    <form action="{{ route('candidate.comments.store', $blog) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" name="body" placeholder="Your comment..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </form>
                                @else
                                    <div class="alert alert-info">
                                        <a href="{{ route('login') }}">Login</a> to post a comment.
                                    </div>
                                @endauth --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <!-- Search Widget -->
                        <div class="widget search-widget">
                            <h4 class="widget-title">Search</h4>
                            <div class="widget-content">
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- About Widget -->
                        <div class="widget about-widget">
                            <h4 class="widget-title">About Us</h4>
                            <div class="widget-content">
                                <p>We provide the latest insights, career advice, and industry trends to help you succeed in
                                    your professional journey.</p>
                                <a href="" class="btn btn-sm btn-primary">Learn More</a>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="widget categories-widget">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    {{-- @foreach ($categories ?? [] as $category)
                                        <li>
                                            <a href="{{ route('blog.category', $category->slug) }}">
                                                {{ $category->name }} <span
                                                    class="badge">{{ $category->blogs_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="widget recent-posts-widget">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="widget-content">
                                {{-- @foreach ($recentPosts ?? [] as $post)
                                    <div class="recent-post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ route('blog.show', $post->slug) }}">
                                                    <img src="{{ asset($post->thumbnail) }}" class="img-responsive"
                                                        alt="{{ $post->title }}">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <h5><a
                                                        href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h5>
                                                <span class="post-date"><i class="fa fa-calendar"></i>
                                                    {{ $post->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>

                        <!-- Tags Widget -->
                        <div class="widget tags-widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <div class="widget-content">
                                <ul class="tag-cloud list-inline">
                                    {{-- @foreach ($popularTags ?? [] as $tag)
                                        <li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="widget newsletter-widget">
                            <h4 class="widget-title">Newsletter</h4>
                            <div class="widget-content">
                                <p>Subscribe to our newsletter to get the latest updates directly to your inbox.</p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                                </form>
                            </div>
                        </div>

                        <!-- Social Media Widget -->
                        <div class="widget social-widget">
                            <h4 class="widget-title">Follow Us</h4>
                            <div class="widget-content">
                                <ul class="social-icons list-inline">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Blog Content Section ===== -->

    <!-- ===== Start of Call to Action Section ===== -->
    <section class="cta-section bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="cta-title">Stay updated with our latest career insights</h3>
                    <p class="cta-description">Join our community and get weekly updates on job trends, interview tips, and
                        career advice.</p>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('blogs.index') }}" class="btn btn-light btn-lg">Explore More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Call to Action Section ===== -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            trackView('blog', {{ $blog->id }});
        });
    </script>
@endpush
