<section class="ptb80" id="testimonials" style="background-color: #f8f9fa; padding: 80px 0;">
    <div class="container">

        <!-- Section Title -->
        <div class="section-title" style="text-align: center; margin-bottom: 40px;">
            <h2 style="color: #333; font-weight: 600; text-transform: capitalize; margin-bottom: 15px;">Testimonials</h2>
            <div style="height: 3px; width: 60px; background-color: #0d6efd; margin: 0 auto;"></div>
        </div>

        <!-- Owl Carousel Wrapper -->
        <div class="owl-carousel testimonial">
            @forelse ($reviews as $review)
                <!-- Testimonial 1 -->
                <div class="item">
                    <div class="review"
                        style="background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); margin-bottom: 20px;">
                        <blockquote
                            style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-style: italic; position: relative; padding-left: 20px; border-left: 3px solid #0d6efd;">
                            {{ strip_tags($review?->review) }}
                        </blockquote>
                        <div class="rating"
                            style="text-align: center; font-size: 22px; color: #f1c40f; margin-top: 10px;">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    ★
                                @else
                                    <span style="color: #ddd;">★</span>
                                @endif
                            @endfor
                        </div>

                    </div>

                    @if ($review?->candidate)
                        <div class="customer"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset($review?->candidate?->image) }}" alt="Client Testimonial"
                                style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                            <h4 class="uppercase pt20"
                                style="margin-top: 10px; text-transform: uppercase; font-weight: 600; font-size: 16px;">
                                {{ $review->candidate?->full_name }}</h4>
                            <p style="font-size: 14px; color: #777; margin-top: 5px;">{{ $review->candidate?->title }}
                            </p>
                        </div>
                    @elseif ($review?->company)
                        <div class="customer"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset($review?->company?->logo) }}" alt="Client Testimonial"
                                style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                            <h4 class="uppercase pt20"
                                style="margin-top: 10px; text-transform: uppercase; font-weight: 600; font-size: 16px;">
                                {{ $review?->user?->name }}</h4>
                            <p style="font-size: 14px; color: #777; margin-top: 5px;"> {{ $review?->company?->name }}
                            </p>
                        </div>
                    @else
                        Unknown
                    @endif

                </div>

            @empty
            @endforelse

        </div>
        <!-- End of Owl Carousel -->

    </div>
</section>
