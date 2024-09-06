@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>register</h2>
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
    <!-- ===== Start of Login - Register Section ===== -->
    <section class="ptb80" id="login">
        <div class="container">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <!-- Start of Login Box -->
                <div class="login-box">

                    <div class="login-title">
                        <h4>Register</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                placeholder="Example Username" name="name" value="{{ old('name') }}" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>


                        <!-- E-mail -->
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email') }}" required>
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
                        <div class="row">
                            <hr>
                            <h5 for="" class="mb-2">Create Account For</h5>
                            <br>
                            <div class="form-group col-md-3">
                                <input class="form-check-input" type="radio" name="account_type" id="typeCandidate"
                                    value="candidate">
                                <label class="form-check-label" for="typeCandidate">Candidate</label>
                            </div>

                            <div class="form-group col-md-3">
                                <input class="form-check-input " type="radio" name="account_type" id="typeCompany"
                                    value="company">
                                <label class="form-check-label" for="typeCompany">Company</label>
                            </div>

                        </div>
                        @if ($errors->has('account_type'))
                            <div class="invalid-feedback ">
                                {{ $errors->first('account_type') }}
                            </div>
                        @endif

                        <!-- Already have an Account -->
                        <div class="form-group text-center">
                            <div class="text-muted text-center">Already have an account?
                                <a href="{{ route('login') }}">Sign in</a>
                            </div>
                        </div>
                        <!-- Create Account Button -->
                        <div class="form-group text-center nomargin">
                            <button type="submit" class="btn btn-blue btn-effect">Create Account</button>
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
