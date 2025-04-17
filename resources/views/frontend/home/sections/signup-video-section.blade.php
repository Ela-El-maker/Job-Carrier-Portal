<section id="signup-video" style="background-image: url()">
    <div class="container-fluid">
        <div class="row">

            <!-- Start of Signup Column -->
            <div class="col-md-6 signup-sec ptb80 text-center">
                <div class="col-md-8 col-md-offset-2">

                    <!-- Section Title -->
                    <div class="section-title">
                        <h2 class="text-white">{{ $customSection?->title }}</h2>
                    </div>

                    <p class="text-white mt20">
                        {!! $customSection?->sub_title !!}
                    </p>

                    @if($customSection?->button && $customSection?->button_label)
                        <a href="{{ $customSection->button }}" class="btn btn-purple btn-effect mt80">
                            {{ $customSection->button_label }}
                        </a>
                    @endif

                    <!-- Arrow Icon -->
                    <img src="{{ asset('images/icons/arrow.svg') }}" alt="" class="signup-arrow visible-lg-block">
                </div>

                <!-- Signup icon -->
                <img src="{{ asset('images/icons/icon1.svg') }}" alt="" class="signup-icon visible-lg-block">
            </div>
            <!-- End of Signup Column -->

            <!-- Start of Media Column -->
            <div class="col-md-6 video-sec overlay-gradient text-center d-flex align-items-center justify-content-center" style="position: relative;">

                @if($customSection?->media_type === 'image' && $customSection?->media_path)
                    <img src="{{ asset($customSection?->media_path) }}" alt="Section Image" class="img-fluid w-100 h-100" style="object-fit: cover;">

                @elseif($customSection?->media_type === 'video' && $customSection?->media_path)
                    {{-- <video autoplay muted loop controls class="w-100 h-100" style="object-fit: cover;">
                        <source src="{{ asset($customSection->media_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> --}}

                    <a href="{{ asset($customSection?->media_path) }}" class="popup-video" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <i class="fa fa-play fa-3x text-white"></i>
                    </a>
                @endif

            </div>
            <!-- End of Media Column -->

        </div>

    </div>
</section>



