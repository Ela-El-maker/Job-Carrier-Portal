<!-- ========== Start of Main Slider Section ========== -->
<section class="hero-slider-section">
    <!-- ===== Start of Swiper Slider ===== -->
    <div class="swiper-container hero-swiper">
        <div class="swiper-wrapper">
            @forelse ($heroes as $index => $hero)
                @php
                    // Determine layout type (0: image-left, 1: image-right, 2: centered)
                    $layoutType = $index % 3;
                    // Get proper image paths with fallbacks
                    // $bgImage = $hero->background_image
                    //     ? {{ asset($hero?->background_image) }}
                    //     : asset('frontend/assets/images/img/slider-img-1.jpg');
                    // $mainImage = $hero->image
                    //     ? {{ asset($hero?->image) }}
                    //     : asset('frontend/assets/images/img/placeholder.jpg');
                @endphp

                <!-- Start of Slide -->
                <div class="swiper-slide hero-slide"
                    style="background-image: url({{ asset($hero?->background_image) }});">
                    <div class="slide-overlay"></div>

                    <!-- Start of Slider Content -->
                    <div class="container hero-container">
                        <div class="row hero-row">
                            @if ($layoutType == 0)
                                <!-- Layout 1: Image on left, text on right -->
                                <div class="col-lg-6 col-md-6 hero-image-col">
                                    <div class="hero-image-wrapper">
                                        <img src="{{ asset($hero?->image) }}" alt="Feature Image" class="hero-image">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 hero-content-col">
                                    <div class="hero-content">
                                        <div class="section-title">
                                            <h2 class="text-white">{{ $hero->title }}</h2>
                                        </div>
                                        <div class="hero-description">
                                            <p class="text-white">
                                                {{-- Ensure sub_title is safe for HTML rendering --}}
                                                {{-- Use {!! !!} to allow HTML tags in sub_title --}}
                                                {!! $hero->sub_title !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif($layoutType == 1)
                                <!-- Layout 2: Text on left, image on right -->
                                <div class="col-lg-6 col-md-6 hero-content-col">
                                    <div class="hero-content">
                                        <div class="section-title">
                                            <h2 class="text-white">{{ $hero->title }}</h2>
                                        </div>
                                        <div class="hero-description">
                                            <p class="text-white">
                                                {{-- Ensure sub_title is safe for HTML rendering --}}
                                                {{-- Use {!! !!} to allow HTML tags in sub_title --}}
                                                {!! $hero->sub_title !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 hero-image-col">
                                    <div class="hero-image-wrapper">
                                        <img src="{{ $hero?->image }}" alt="Feature Image" class="hero-image">
                                    </div>
                                </div>
                            @else
                                <div
                                    style="
                                    max-width: 800px;
                                    margin: 2rem auto;
                                    text-align: center;
                                    background: rgba(255,255,255,0.05);
                                    backdrop-filter: blur(4px);
                                    padding: 30px;
                                    border-radius: 12px;
                                    border: 1px solid rgba(255,255,255,0.1);
                                    ">
                                    <!-- Image with refined hover effect -->
                                    <div style="
                                        margin: 0 auto 25px;
                                        width: fit-content;
                                        border-radius: 8px;
                                        overflow: hidden;
                                        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
                                        transition: all 0.3s ease;
                                                "
                                        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 25px rgba(0,0,0,0.2)'"
                                        onmouseout="this.style.transform='none'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.15)'">
                                        <img src="{{ asset($hero->image) }}"
                                            style="
                                        height: 220px;
                                        width: 400px;
                                        object-fit: cover;
                                        display: block;
                                    ">
                                    </div>

                                    <!-- Text content with better spacing -->
                                    <div class="hero-content">
                                        <div class="section-title">
                                            <h2 class="text-white">{{ $hero->title }}</h2>
                                        </div>
                                        <div class="hero-description">
                                            <p class="text-white">
                                                {{-- Ensure sub_title is safe for HTML rendering --}}
                                                {{-- Use {!! !!} to allow HTML tags in sub_title --}}
                                                {!! $hero->sub_title !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </div>
    </div>
    <!-- End of Slider Content -->
    </div>
    <!-- End of Slide -->
@empty
    <!-- Fallback slide if no heroes found -->
    <div class="swiper-slide hero-slide" style="background-image: url('frontend/assets/images/img/slider-img-1.jpg');">
        <div class="slide-overlay"></div>
        <div class="container hero-container">
            <div class="row hero-row">
                <div class="col-lg-8 col-md-10 mx-auto hero-centered-col">
                    <div class="hero-content text-center">
                        <h2 class="hero-title">Welcome to Our Website</h2>
                        <div class="hero-description">No hero content has been added yet.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforelse
    </div>
    <!-- End of Swiper Wrapper -->

    <!-- Pagination -->
    <div class="swiper-pagination hero-pagination"></div>

    <!-- Navigation Buttons -->
    <div class="swiper-button-prev hero-button-prev"><i class="fa fa-angle-left"></i></div>
    <div class="swiper-button-next hero-button-next"><i class="fa fa-angle-right"></i></div>
    </div>
    <!-- ===== End of Swiper Slider ===== -->
</section>
<!-- ========== End of Main Slider Section ========== -->

<!-- Swiper CSS -->
{{-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> --}}

<style>
    /* Hero Slider Styles */
    .hero-slider-section {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .hero-swiper {
        width: 100%;
        height: 100%;
    }

    .hero-slide {
        position: relative;
        height: 600px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        transition: all 1.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        transition: opacity 1.2s ease;
    }

    .hero-container {
        position: relative;
        z-index: 10;
        height: 100%;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .hero-row {
        height: 100%;
        display: flex;
        align-items: center;
        width: 100%;
    }

    /* Image Styles */
    .hero-image-col,
    .hero-content-col,
    .hero-centered-col {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-image-wrapper {
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-image-wrapper.centered {
        margin-bottom: 30px;
    }

    .hero-image {
        max-width: 100%;
        max-height: 400px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        transition: transform 0.6s ease, box-shadow 0.6s ease;
    }

    .hero-slide:hover .hero-image {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    }

    /* Content Styles */
    .hero-content {
        padding: 20px;
        transition: transform 0.6s ease, opacity 0.6s ease;
    }

    .hero-title {
        color: #ffffff;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        transition: transform 0.6s ease;
    }

    .hero-description {
        color: #ffffff;
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 25px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        transition: transform 0.6s ease;
    }

    /* Navigation Styles */
    .hero-button-prev,
    .hero-button-next {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        transition: all 0.3s ease;
        z-index: 20;
    }

    .hero-button-prev:hover,
    .hero-button-next:hover {
        background-color: rgba(255, 255, 255, 0.4);
        transform: scale(1.1);
    }

    .hero-button-prev:after,
    .hero-button-next:after {
        display: none;
    }

    .hero-button-prev i,
    .hero-button-next i {
        font-size: 24px;
        color: white;
    }

    /* Pagination Styles */
    .hero-pagination {
        position: absolute;
        bottom: 20px;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 20;
        transition: all 0.4s ease;
    }

    .hero-pagination .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.7);
        opacity: 0.7;
        transition: all 0.4s ease;
    }

    .hero-pagination .swiper-pagination-bullet-active {
        background-color: #ffffff;
        opacity: 1;
        transform: scale(1.2);
    }

    /* Centered Layout Specific */
    .hero-centered-col {
        text-align: center;
    }

    /* Swiper Transition Effects */
    .swiper-slide {
        transform: translate3d(0, 0, 0) !important;
        backface-visibility: hidden;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .hero-slide {
            height: 500px;
        }

        .hero-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 767px) {
        .hero-slide {
            height: auto;
            min-height: 600px;
            padding: 60px 0;
        }

        .hero-row {
            flex-direction: column;
        }

        .hero-image-col,
        .hero-content-col {
            width: 100%;
            max-width: 100%;
            flex: 0 0 100%;
        }

        .hero-image-wrapper {
            margin-bottom: 20px;
        }

        .hero-content {
            text-align: center;
            padding: 15px;
        }

        .hero-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .hero-description {
            font-size: 1rem;
        }

        .hero-button-prev,
        .hero-button-next {
            width: 40px;
            height: 40px;
        }
    }
</style>

<!-- Swiper JS -->
{{-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> --}}

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.hero-swiper', {
            // Core parameters
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,

            // Smooth transition settings
            speed: 1200, // Transition duration in ms (1.2 seconds)
            effect: 'slide', // Use slide instead of fade for smoother transitions
            grabCursor: true,

            // Autoplay with longer delay
            autoplay: {
                delay: 7000, // 7 seconds between slides
                disableOnInteraction: false,
                waitForTransition: true // Wait for transition to complete
            },

            // Smooth easing function
            easing: 'cubic-bezier(0.4, 0, 0.2, 1)',

            // Pagination
            pagination: {
                el: '.hero-pagination',
                clickable: true,
                dynamicBullets: true
            },

            // Navigation arrows
            navigation: {
                nextEl: '.hero-button-next',
                prevEl: '.hero-button-prev',
            },

            // Event callbacks
            on: {
                init: function() {
                    // Preload images for smoother transitions
                    this.slides.forEach(slide => {
                        const img = slide.querySelector('img');
                        if (img && !img.complete) {
                            img.loading = 'eager';
                        }
                    });
                },
                transitionStart: function() {
                    // Add smooth fade effect during transition
                    const slides = this.slides;
                    slides.forEach(slide => {
                        slide.style.opacity = '0';
                        slide.style.transition = 'opacity 0.8s ease';
                    });
                },
                transitionEnd: function() {
                    // Restore opacity after transition
                    const slides = this.slides;
                    slides.forEach(slide => {
                        slide.style.opacity = '1';
                    });
                    this.slides[this.activeIndex].style.opacity = '1';
                }
            }
        });

        // Force update on window load
        window.addEventListener('load', function() {
            heroSwiper.update();
            heroSwiper.slideTo(0);
        });
    });
</script>
