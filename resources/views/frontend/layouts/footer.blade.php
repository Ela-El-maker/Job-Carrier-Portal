<footer class="footer1">

    <!-- ===== Start of Footer Information & Links Section ===== -->
    <div class="footer-info ptb80">
        <div class="container">

            <!-- 1st Footer Column -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-about">

                <!-- Your Logo Here -->
                <a href="index.html">
                    <img src="images/logo-white.svg" alt="">
                </a>

                <!-- Small Description -->
                <p class="pt40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type changed.</p>

                <!-- Info -->
                <ul class="nopadding">
                    <li><i class="fa fa-map-marker"></i>New York City, USA</li>
                    <li><i class="fa fa-phone"></i>(123) 456 789 0012</li>
                    <li><i class="fa fa-envelope-o"></i>youremail@cariera.com</li>
                </ul>
            </div>

            <!-- 2nd Footer Column -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-links">
                <h3>useful links</h3>

                <!-- Links -->
                <ul class="nopadding">
                    <li><a href="post-job.html"><i class="fa fa-angle-double-right"></i>add job</a></li>
                    <li><a href="blog-right-sidebar-v1.html"><i class="fa fa-angle-double-right"></i>blog</a></li>
                    <li><a href="search-jobs-1.html"><i class="fa fa-angle-double-right"></i>find jobs</a></li>
                    <li><a href="faq.html"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a href="login.html"><i class="fa fa-angle-double-right"></i>login</a></li>
                    <li><a href="privacy-policy.html"><i class="fa fa-angle-double-right"></i>privacy policy</a></li>
                    <li><a href="register.html"><i class="fa fa-angle-double-right"></i>register</a></li>
                    <li><a href="shop-right-sidebar.html"><i class="fa fa-angle-double-right"></i>shop</a></li>
                    <li><a href="submit-resume.html"><i class="fa fa-angle-double-right"></i>submit resume</a></li>
                </ul>
            </div>

            <!-- 3rd Footer Column -->
            @php
                $popularBlogs = \App\Models\Blog::where('status', 1)
                    ->where('show_at_popular', 1)
                    ->inRandomOrder()
                    ->latest()
                    ->take(3)
                    ->get();
            @endphp

            <div class="col-md-3 col-sm-6 col-xs-6 footer-posts">
                <h3>popular posts</h3>
                @forelse ($popularBlogs as $blog)
                    <!-- Single Post 1 -->
                    <div class="footer-blog-post">

                        <!-- Thumbnail -->
                        <div class="thumbnail-post">
                            <a href="{{ route('blogs.show', $blog?->slug) }}">
                                <img src="{{ asset($blog?->image) }}"
                                    alt="{{ Str::limit(strip_tags($blog?->title), 5, '...') }}">
                            </a>
                        </div>

                        <!-- Link -->
                        <div class="post-info">
                            <a
                                href="{{ route('blogs.show', $blog?->slug) }}">{{ Str::limit(strip_tags($blog?->title), 10, '...') }}</a>
                            <span>{{ relativeTime($blog?->created_at) }}</span>
                        </div>
                    </div>
                @empty
                    <div class="footer-blog-post text-muted text-center small">
                        <i class="fas fa-info-circle d-block mb-1" style="font-size: 1.2rem;"></i>
                        No popular posts to show.
                    </div>
                @endforelse



            </div>

            <!-- 4th Footer Column -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-newsletter">
                <h3>newsletter</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>

                <!-- Subscribe Form -->
                <form action="#" class="form-inline mailchimp mtb30" novalidate>

                    <!-- Form -->
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" name="EMAIL" class="form-control" id="mc-email"
                                placeholder="Your Email" autocomplete="off">
                            <label for="mc-email"></label>
                            <button type="submit" class="btn btn-blue btn-effect">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- Start of Live Chat -->
                <div class="footer-chat row nomargin">

                    <!-- Supporter Image -->
                    <div class="col-md-4">
                        <div class="supporter-image">
                            <img src="images/clients/client4.jpg" alt="">
                        </div>
                    </div>

                    <!-- Chat details -->
                    <div class="col-md-8">
                        <div class="chat-details">
                            <span>Helpline Center</span>

                            <p class="pt10 nomargin">Chat Live now!
                                <br>Hello, my name is John Doe, how may i help you?
                            </p>

                            <!-- Live Chat Link -->
                            <div class="text-right pt15">
                                <a href="#"><i class="fa fa-comments-o"></i>Live Chat</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End of Live Chat -->
            </div>

        </div>
    </div>
    <!-- ===== End of Footer Information & Links Section ===== -->


    <!-- ===== Start of Footer Copyright Section ===== -->
    <div class="copyright ptb40">
        <div class="container">

            <div class="col-md-6 col-sm-6 col-xs-12">
                <span>Copyright &copy; <a href="#">cariera</a>. All Rights Reserved</span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- Start of Social Media Buttons -->
                <ul class="social-btns list-inline text-right">
                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll facebook">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-facebook"></i>
                                <i class="social-btn-roll-icon fa fa-facebook"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll twitter">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-twitter"></i>
                                <i class="social-btn-roll-icon fa fa-twitter"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll google-plus">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                <i class="social-btn-roll-icon fa fa-google-plus"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll instagram">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-instagram"></i>
                                <i class="social-btn-roll-icon fa fa-instagram"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll linkedin">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                <i class="social-btn-roll-icon fa fa-linkedin"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="#" class="social-btn-roll rss">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-rss"></i>
                                <i class="social-btn-roll-icon fa fa-rss"></i>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- End of Social Media Buttons -->
            </div>

        </div>
    </div>
    <!-- ===== End of Footer Copyright Section ===== -->

</footer>
