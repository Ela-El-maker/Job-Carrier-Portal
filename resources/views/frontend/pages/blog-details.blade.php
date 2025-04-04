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

    <!-- ===== Start of Single Blog Post Section ===== -->
    <section class="ptb80" id="blog-post">
        <div class="container">

            <!-- Start of Blog Post Content Wrapper -->
            <div class="col-md-12 col-xs-12 post-content-wrapper">

                <!-- Start of Post Title -->
                <div class="post-title">
                    <h2>{{ $blog?->title }}</h2>

                    <!-- Post Details -->
                    <div class="post-detail">
                        <span><i class="fa fa-user"></i>{{ $blog?->author?->name }}</span>
                        <span><i class="fa fa-clock-o"></i>{{ relativeTime($blog?->created_at) }}</span>
                        <span><i class="fa fa-comments-o"></i>12 Comments</span>
                    </div>
                </div>
                <!-- End of Post Title -->

                <!-- Start of Post Content -->
                <div class="post-content">

                    <!-- Post Image -->
                    <div class="post-img">
                        <img src="{{ asset($blog?->image) }}" class="img-responsive" alt="">
                    </div>

                    <p>{!! $blog?->description !!}</p>



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

                    </ul>
                    <!-- End of Social Media ul -->


                    <!-- Start of Blog Post Comments -->
                    {{-- <div class="mt60" id="blog-comments">
                        <div class="main-content">

                            <h4>4 comments</h4>

                            <!-- Start of Comment List -->
                            <ul class="comments-list">

                                <!-- Start of Comment 1 -->
                                <li class="comment">
                                    <!-- Commenter Image -->
                                    <a class="pull-left commenter" href="#">
                                        <img src="images/clients/client1.jpg" alt="" class="img-responsive">
                                    </a>

                                    <div class="media-body comment-body">
                                        <!-- Comment Wrapper -->
                                        <div class="comment-content-wrapper">
                                            <div class="media-heading clearfix">

                                                <!-- Commenters Name -->
                                                <h6 class="commenter-name">john doe</h6>

                                                <div class="comment-reply pull-right">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-blue btn-small btn-effect">reply</a>
                                                </div>

                                                <!-- Comment Info -->
                                                <div class="comment-info">
                                                    <span>Nov 11, 2016 at 7:49 am</span>
                                                </div>

                                                <!-- Comment -->
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </div>

                                            <!-- ==== Start of Comment Replies ==== -->
                                            <ul class="comment-replies">

                                                <!-- Start of Comment Reply 1 -->
                                                <li class="comment-replied">
                                                    <!-- Commenter Image -->
                                                    <a class="pull-left commenter" href="#">
                                                        <img src="images/clients/client2.jpg" alt=""
                                                            class="img-responsive">
                                                    </a>

                                                    <div class="media-body comment-body">
                                                        <!-- Comment Wrapper -->
                                                        <div class="comment-content-wrapper">
                                                            <div class="media-heading clearfix">

                                                                <!-- Commenters Name -->
                                                                <h6 class="commenter-name">john doe</h6>

                                                                <!-- Comment Info -->
                                                                <div class="comment-info">
                                                                    <span>Nov 11, 2016 at 7:51 am</span>
                                                                </div>

                                                                <!-- Comment -->
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. Lorem Ipsum has been the
                                                                    industry's standard dummy text ever since the 1500s,
                                                                    when an unknown printer took a galley of type and
                                                                    scrambled it to make a type specimen book.</p>
                                                            </div>
                                                        </div>
                                                        <!-- End of Comment Wrapper -->
                                                    </div>
                                                </li>
                                                <!-- End of Comment Reply 1 -->

                                                <!-- Start of Comment Reply 2 -->
                                                <li class="comment-replied">
                                                    <!-- Commenter Image -->
                                                    <a class="pull-left commenter" href="#">
                                                        <img src="images/clients/client3.jpg" alt=""
                                                            class="img-responsive">
                                                    </a>

                                                    <div class="media-body comment-body">
                                                        <!-- Comment Wrapper -->
                                                        <div class="comment-content-wrapper">
                                                            <div class="media-heading clearfix">

                                                                <!-- Commenters Name -->
                                                                <h6 class="commenter-name">john doe</h6>

                                                                <!-- Comment Info -->
                                                                <div class="comment-info">
                                                                    <span>Nov 11, 2016 at 7:52 am</span>
                                                                </div>

                                                                <!-- Comment -->
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. Lorem Ipsum has been the
                                                                    industry's standard dummy text ever since the 1500s,
                                                                    when an unknown printer took a galley of type and
                                                                    scrambled it to make a type specimen book.</p>
                                                            </div>
                                                        </div>
                                                        <!-- End of Comment Wrapper -->
                                                    </div>
                                                </li>
                                                <!-- End of Comment Reply 2 -->

                                            </ul>
                                            <!-- ==== End of Comment Replies ==== -->
                                        </div>
                                        <!-- End of Comment Wrapper -->
                                    </div>
                                </li>
                                <!-- End of Comment 1 -->


                                <!-- Start of Comment 2 -->
                                <li class="comment">
                                    <!-- Commenter Image -->
                                    <a class="pull-left commenter" href="#">
                                        <img src="images/clients/client1.jpg" alt="" class="img-responsive">
                                    </a>

                                    <div class="media-body comment-body">
                                        <!-- Comment Wrapper -->
                                        <div class="comment-content-wrapper">
                                            <div class="media-heading clearfix">

                                                <!-- Commenters Name -->
                                                <h6 class="commenter-name">john doe</h6>

                                                <div class="comment-reply pull-right">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-blue btn-small btn-effect">reply</a>
                                                </div>

                                                <!-- Comment Info -->
                                                <div class="comment-info">
                                                    <span>Nov 11, 2016 at 8:51 am</span>
                                                </div>

                                                <!-- Comment -->
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </div>
                                        </div>
                                        <!-- End of Comment Wrapper -->
                                    </div>
                                </li>
                                <!-- End of Comment 2 -->


                                <!-- Start of Comment 3 -->
                                <li class="comment">
                                    <!-- Commenter Image -->
                                    <a class="pull-left commenter" href="#">
                                        <img src="images/clients/client4.jpg" alt="" class="img-responsive">
                                    </a>

                                    <div class="media-body comment-body">
                                        <!-- Comment Wrapper -->
                                        <div class="comment-content-wrapper">
                                            <div class="media-heading clearfix">

                                                <!-- Commenters Name -->
                                                <h6 class="commenter-name">john doe</h6>

                                                <div class="comment-reply pull-right">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-blue btn-small btn-effect">reply</a>
                                                </div>

                                                <!-- Comment Info -->
                                                <div class="comment-info">
                                                    <span>Nov 11, 2016 at 8:55 am</span>
                                                </div>

                                                <!-- Comment -->
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.</p>
                                            </div>
                                        </div>
                                        <!-- End of Comment Wrapper -->
                                    </div>
                                </li>
                                <!-- End of Comment 3 -->

                            </ul>
                            <!-- End of Comment List -->


                            <!-- Start of Comment Submit Form -->
                            <h4 class="pt40">Leave a comment</h4>

                            <form class="row" id="comment-form">
                                <div class="col-md-6 form-group">
                                    <input class="form-control input-box" type="text" name="name"
                                        placeholder="Your Name">
                                </div>

                                <div class="col-md-6 form-group">
                                    <input class="form-control input-box" type="email" name="email"
                                        placeholder="your@email.com">
                                </div>

                                <div class="col-md-12 form-group mb30">
                                    <textarea class="form-control textarea-box" rows="8" name="message" placeholder="Type your message..."></textarea>
                                </div>
                                <div class="col-md-6 col-xs-6 comment-require">
                                    <p>All fields are required.</p>
                                </div>
                                <div class="col-md-6 col-xs-6 comment-submit">
                                    <button class="btn btn-blue btn-effect pull-right" type="submit">Send
                                        message</button>
                                </div>
                            </form>
                            <!-- End of Comment Submit Form -->

                        </div>
                    </div> --}}
                    <!-- Start of Blog Post Comments -->
                    <div class="mt60" id="blog-comments">
                        <div class="main-content">
                            <h4>{{ $blog->comments->count() }} {{ Str::plural('comment', $blog->comments->count()) }}</h4>

                            <!-- Start of Comment List -->
                            <ul class="comments-list">
                                @foreach ($blog->comments as $comment)
                                    @include('frontend.pages.comments._comment', [
                                        'comment' => $comment,
                                        'depth' => 0,
                                    ])
                                @endforeach
                            </ul>
                            <!-- End of Comment List -->

                            @auth
                                <!-- Start of Comment Submit Form -->
                                <h4 class="pt40">Leave a comment</h4>
                                <form class="row" action="{{ route('candidate.comments.store', $blog) }}" method="POST">
                                    @csrf
                                    <div class="col-md-12 form-group mb30">
                                        <textarea class="form-control textarea-box" rows="8" name="body" placeholder="Type your message..." required></textarea>
                                    </div>
                                    <div class="col-md-6 col-xs-6 comment-require">
                                        <p>All fields are required.</p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 comment-submit">
                                        <button class="btn btn-blue btn-effect pull-right" type="submit">Post comment</button>
                                    </div>
                                </form>
                                <!-- End of Comment Submit Form -->
                            @else
                                <div class="alert alert-info">
                                    <a href="{{ route('login') }}">Login</a> to post a comment.
                                </div>
                            @endauth
                        </div>
                    </div>
                    <!-- Comments Section -->

                    <!-- Create a new partial for comments (resources/views/partials/comment.blade.php) -->

                </div>
                <!-- End of Post Content -->

            </div>
            <!-- End of Blog Post Content Wrapper -->
        </div>
    </section>
    <!-- ===== End of Single Blog Post Section ===== -->





    <!-- ===== Start of Next Post Section ===== -->
    <section class="ptb120" id="next-post">
        <div class="container">
            <div class="col-md-12">
                <span>You may also like</span>

                <!-- Post Title -->
                <h2 class="ptb40">How to prepare for an Interview</h2>

                <!-- Button -->
                <a href="#" class="btn btn-blue btn-effect">read now</a>
            </div>
        </div>
    </section>
    <!-- ===== End of Next Post Section ===== -->
@endsection
