@extends('frontend.layouts.master')

@section('contents')
    <style>
        /* General Styling */
        .blog-content {
            padding: 60px 0;
        }

        .blog-post-wrapper {
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            padding: 40px;
        }

        .post-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .post-meta {
            color: #888;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .post-meta span {
            margin-right: 20px;
        }

        .post-featured-image img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .post-content {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .post-share h4 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .social-share {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .social-card {
            flex: 1 1 auto;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .facebook { background-color: #3b5998; }
        .twitter { background-color: #1da1f2; }
        .linkedin { background-color: #0077b5; }
        .whatsapp { background-color: #25d366; }
        .pinterest { background-color: #bd081c; }

        .social-card i {
            margin-right: 8px;
        }

        .post-navigation {
            margin-top: 50px;
            border-top: 1px solid #eee;
            padding-top: 30px;
        }

        .post-navigation h5 {
            margin: 5px 0;
            font-weight: 600;
        }

        .prev-post, .next-post {
            font-size: 14px;
        }

        .next-post {
            text-align: right;
        }

        @media (max-width: 767px) {
            .next-post {
                text-align: left;
                margin-top: 20px;
            }
        }
    </style>

    <!-- Page Header -->
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

    <!-- Blog Content -->
    <section class="blog-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-post-wrapper">

                        <!-- Header -->
                        <div class="post-header">
                            <h2 class="post-title">{{ $blog?->title }}</h2>
                            <div class="post-meta">
                                <span><i class="fa fa-user"></i> {{ $blog?->author?->name }}</span>
                                <span><i class="fa fa-calendar"></i> {{ $blog?->created_at->format('F d, Y') }}</span>
                                <span><i class="fa fa-comments"></i> {{ $blog->comments->count() }} {{ Str::plural('Comment', $blog->comments->count()) }}</span>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="post-featured-image">
                            <img src="{{ asset($blog?->image) }}" alt="{{ $blog?->title }}">
                        </div>

                        <!-- Content -->
                        <div class="post-content">
                            {!! $blog?->description !!}
                        </div>

                        <!-- Share -->
                        <div class="post-share">
                            <h4>Share This Post:</h4>
                            <div class="social-share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                   class="social-card facebook" target="_blank">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $blog?->title }}"
                                   class="social-card twitter" target="_blank">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                   class="social-card linkedin" target="_blank">
                                    <i class="fa fa-linkedin"></i> LinkedIn
                                </a>
                                <a href="https://wa.me/?text={{ $blog?->title }} {{ url()->current() }}"
                                   class="social-card whatsapp" target="_blank">
                                    <i class="fa fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&media={{ asset($blog?->image) }}&description={{ $blog?->title }}"
                                   class="social-card pinterest" target="_blank">
                                    <i class="fa fa-pinterest"></i> Pinterest
                                </a>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="post-navigation row mt-5">
                            <div class="col-md-6">
                                @if ($previousPost)
                                    <div class="prev-post">
                                        <span><i class="fa fa-arrow-left nav-arrow"></i> Previous Post</span>
                                        <h5>
                                            <a href="{{ route('blogs.show', $previousPost->slug) }}">
                                                {{ $previousPost->title }}
                                            </a>
                                        </h5>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($nextPost)
                                    <div class="next-post">
                                        <span>Next Post <i class="fa fa-arrow-right nav-arrow"></i></span>
                                        <h5>
                                            <a href="{{ route('blogs.show', $nextPost->slug) }}">
                                                {{ $nextPost->title }}
                                            </a>
                                        </h5>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
