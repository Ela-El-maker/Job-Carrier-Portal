@include('frontend.home.sections.get-started-section')
<footer class="footer1">
    @php
        $popularBlogs = \App\Models\Blog::where('status', 1)
            ->where('show_at_popular', 1)
            ->inRandomOrder()
            ->latest()
            ->take(3)
            ->get();

        $footerOne = \Menu::getByName('Footer Menu One');

        $footer = \App\Models\Footer::first();
        $footerSocials = \App\Models\SocialIcon::where(['show'=>1])->take(5)->get();
    @endphp
    <!-- ===== Start of Footer Information & Links Section ===== -->
    <div class="footer-info ptb80" style="background: url({{ asset($footer?->background_footer) }}) no-repeat;position: relative; background-size: cover;">
        <div class="container">

            <!-- 1st Footer Column -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-about">

                <!-- Your Logo Here -->
                <a href="{{ url('/') }}">
                    <img src="{{ asset($footer?->logo) }}" alt="">
                </a>

                <!-- Small Description -->
                <p class="pt40">
                    {!! $footer?->details !!}
                </p>

                <!-- Info -->
                <ul class="nopadding">
                    <li><i class="fa fa-map-marker"></i>{{ $footer?->address }}</li>
                    <li><i class="fa fa-phone"></i>
                        @if ($footer?->phone)
                            {{ $footer?->phone }}
                        @else
                            {{ config('settings.site_phone') }}
                        @endif

                    </li>
                    <li><i class="fa fa-envelope-o"></i>
                        @if ($footer?->email)
                            {{ $footer?->email }}
                        @else
                            {{ config('settings.site_email') }}
                        @endif
                       </li>
                </ul>
            </div>

            <!-- 2nd Footer Column -->
            <div class="col-md-3 col-sm-6 col-xs-6 footer-links">
                <h3>useful links</h3>

                <!-- Links -->
                <ul class="nopadding">
                    @foreach ($footerOne as $menu)
                    <li><a href="{{ $menu['link']}}"><i class="fa fa-angle-double-right"></i>{{ $menu['label'] }}</a>
                    @endforeach
                </ul>
            </div>

            <!-- 3rd Footer Column -->


            <div class="col-md-3 col-sm-6 col-xs-6 footer-posts">
                <h3>popular posts</h3>
                @forelse ($popularBlogs as $blog)
                    <!-- Single Post 1 -->
                    <div class="footer-blog-post">

                        <!-- Thumbnail -->
                        <div class="thumbnail-post">
                            <a href="{{ route('blogs.show', $blog?->slug) }}" class="hover-link">
                                <img src="{{ asset($blog && $blog->image ? $blog->image : 'frontend/default-uploads/default-blog.png') }}"
                                    alt="{{ $blog?->title ?? 'Blog image' }}">
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
                <p></p>

                <!-- Subscribe Form -->
                <form action="" class="form-inline form-newsletter mailchimp mtb30" novalidate>

                    @csrf
                    <!-- Form -->
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" id="mc-email"
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
                    {{-- <div class="col-md-8">
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
                    </div> --}}
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
                <span>{{ $footer?->copyright }}</span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- Start of Social Media Buttons -->
                <ul class="social-btns list-inline text-right">
                    <!-- Social Media -->
                    @foreach ($footerSocials as $link)
                        <li>
                        <a href="{{ $link?->url }}" class="social-btn-roll facebook">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon {{ $link?->icon }}"></i>
                                <i class="social-btn-roll-icon {{ $link?->icon }}"></i>
                            </div>
                        </a>
                    </li>
                    @endforeach

                </ul>
                <!-- End of Social Media Buttons -->
            </div>

        </div>
    </div>
    <!-- ===== End of Footer Copyright Section ===== -->

</footer>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.form-newsletter').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let form = $(this);
                let button = form.find('button');

                $.ajax({
                    method: 'POST',
                    url: '{{ route('newsletter.store') }}',
                    data: formData,
                    beforeSend: function() {
                        button.text('Processing...').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            button.text('Subscribed!');
                            setTimeout(() => {
                                button.text('Subscribe');
                            }, 2000);
                            form.trigger('reset');
                            notyf.success(response.message);
                        } else {
                            notyf.error(response.message ||
                                'Subscription failed. Please try again.');
                            button.text('Subscribe');
                        }
                    },
                    error: function(xhr) {
                        let message = 'An error occurred. Please try again.';
                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function(index, value) {
                                    notyf.error(value[0]);
                                });
                                return;
                            }
                            if (xhr.responseJSON.message) {
                                message = xhr.responseJSON.message;
                            }
                        }
                        notyf.error(message);
                    },
                    complete: function() {
                        // If not already handled in success/error
                        if (button.text() === 'Processing...') {
                            button.text('Subscribe').prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
@endpush
