<section class="ptb40" id="partners">
    <div class="container">

        <!-- Start of Owl Slider -->
        <div class="owl-carousel partners-slider">
            @foreach ($sponsors as $sponsor)
                <!-- Partner Logo -->
                <div class="item">
                    <a href="{{ $sponsor?->url }}"><img src="{{ asset($sponsor?->logo) }}" alt="{{ $sponsor?->name }}"></a>
                </div>
            @endforeach


        </div>
        <!-- End of Owl Slider -->

    </div>
</section>
