<!-- ===== Start of Newsletter Section ===== -->
<section class="newsletter ptb40">
    <div class="container">
        <div class="row">
            <!-- Newsletter Heading -->
            <div class="col-md-12 text-center mb-20">
                <h3 class="text-white">Subscribe to Our Newsletter</h3>
                <p class="text-white">Join our growing community and receive exclusive updates and special offers.</p>
            </div>

            <!-- Newsletter Form -->
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <form class="form-newsletter">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="email" placeholder="Enter your email address"
                                class="form-control">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <button type="submit" class="btn btn-blue btn-effect btn-block">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-12">
                            <p class="small text-white">We respect your privacy and will never share your information.
                            </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- ===== End of Newsletter Section ===== -->
