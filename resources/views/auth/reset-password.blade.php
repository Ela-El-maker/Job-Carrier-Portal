@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Reset password</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active">pages</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->

    <!-- ===== Start of Login - Register Section ===== -->
    <section class="ptb80" id="login">
        <div class="container">
            <div class="col-md-6 col-md-offset-3 col-xs-12">

                <!-- Start of Login Box -->
                <div class="login-box">

                    <div class="login-title">
                        <h4>Reset password</h4>
                    </div>
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">


                        <!-- Email Address -->
                        <!-- Form Group -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email', $request->email) }}" placeholder="example@example.com">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>


                        <!-- Row for Password and Confirm Password -->
                        <div class="row">
                            <!-- Password -->
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="************">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input type="password"name="password_confirmation"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="************">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                            </div>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group text-center">
                            <button class="btn btn-blue btn-effect">Reset Password</button>
                            <a href="{{ route('login') }}" class="btn btn-blue btn-effect">login</a>
                        </div>

                    </form>
                    <!-- End of Login Form -->
                </div>
                <!-- End of Login Box -->

            </div>
        </div>
    </section>
    <!-- ===== End of Login - Register Section ===== -->
@endsection
