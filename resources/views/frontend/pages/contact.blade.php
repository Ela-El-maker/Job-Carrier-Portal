@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>contact us </h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="ptb80" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-xs-12">
                    <p>We'd love to hear from you! Please fill out the form below, and we'll get back to you as soon as
                        possible.</p>

                    <!-- Start of Contact Form -->
                    <form id="contact-form" class="mt30" action="{{ route('send-mail') }}" method="POST">
                        @csrf
                        <!-- contact result -->
                        <div id="contact-result"></div>
                        <!-- end of contact result -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <input class="form-control input-box" type="text" name="name" placeholder="Your Name"
                                autocomplete="off">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group">
                            <input class="form-control input-box" type="email" name="email"
                                placeholder="your-email@example.com" autocomplete="off">
                        </div>
                        <!-- Form Group -->
                        <div class="form-group">
                            <input class="form-control input-box" type="text" name="company"
                                placeholder="Your Company(Optional)" autocomplete="off">
                        </div>
                        <!-- Form Group -->
                        <div class="form-group">
                            <input class="form-control input-box" type="tel" name="phone" placeholder="Phone Number"
                                autocomplete="off">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group">
                            <input class="form-control input-box" type="text" name="subject" placeholder="Subject"
                                autocomplete="off">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group mb20">
                            <textarea class="form-control textarea-box" rows="8" name="message" placeholder="Type your message..."></textarea>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group text-center">
                            <button class="btn btn-blue btn-effect submit" type="submit">Send message</button>
                        </div>
                    </form>
                    <!-- End of Contact Form -->
                </div>

                <!-- Start of Google Map -->
                <div class="col-md-6 col-xs-12 gmaps">
                    @if (config('settings.site_map'))
                        {!! config('settings.site_map') !!}
                    @endif
                </div>
                <!-- End of Google Map -->

            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#contact-form").on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let button = $('.submit');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('send-mail') }}',
                    data: formData,
                    beforeSend: function() {
                        button.text('Sending ...');
                        button.prop('disabled', true);
                    },
                    success: function(response) {
                        button.text('Send Message');
                        button.prop('disabled', false);
                        $(".form-messege").html(
                            '<span style="display: block; padding: 15px; margin: 20px 0; color: #fff; background-color: #4CAF50; border-radius: 4px; font-size: 18px; font-weight: bold; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">' +
                            '<i class="fas fa-check-circle" style="margin-right: 10px;"></i>' +
                            'Message sent successfully!' +
                            '</span>'
                        );
                        $("#contact-form")[0].reset();
                        notyf.success(response.message);

                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            // alert(value[0]);
                            console.log(value);
                            notyf.error(value[0]);
                        });
                        button.text('Send Message');
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
