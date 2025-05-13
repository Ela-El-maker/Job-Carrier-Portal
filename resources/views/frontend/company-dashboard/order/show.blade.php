@extends('frontend.layouts.master')
@section('contents')
    <style>
        .upload-file-btn {
            position: relative;
            overflow: hidden;
            background: #29b1fd;
            color: #f6f6f6;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 5px;
            text-align: center;
            display: flex;
            /* Flexbox layout */
            align-items: center;
            /* Vertical centering */
            justify-content: center;
            /* Horizontal centering */
            cursor: pointer;
            /* Adds pointer on hover */
        }

        .upload-file-btn input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            /* Ensures input behaves as clickable */
        }
    </style>
    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>PROFILE</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Company Profile</li>
                    </ul>
                </div>
            </div>
            <!-- End of Breadcrumb -->

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <!-- Start of Row -->
            <div class="row">
                @include('frontend.company-dashboard.sidebar')
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-9 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <!-- Start of Row -->
                        <div class="row candidate-profile">
                            <!-- Start of Profile Description and Dashboard Cards -->
                            <div class="col-md-12 col-xs-12">
                                <!-- Card Container for Candidate Details -->
                                <div class="card-container">
                                    <div class="col-md-12 mb-4">
                                        <div class="card">
                                            <h5 class="ps-4 pt-4">Order Info</h5>
                                            <hr>
                                            <div class="card-body"> <!-- Removed p-0 for better spacing -->
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Order Id</th>
                                                            <td>{{ $order?->order_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Transaction No.</th>
                                                            <td>{{ $order?->transaction_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Date</th>
                                                            <td>{{ formatDate($order?->created_at) }},
                                                                {{ $order?->created_at->format('h:i A') }}</td>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Action</th>
                                                            <td><b><a class="btn btn-success"
                                                                        href="{{ route('company.orders.invoice', $order?->id) }}"><i
                                                                            class="fas fa-download"></i> Download
                                                                        Invoice</a></b></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- End of card-body -->
                                        </div> <!-- End of card -->
                                    </div> <!-- End of col-4 -->
                                    <div class="col-md-12 mb-4">
                                        <div class="card">
                                            <h5 class="ps-4 pt-4">Billing and Payment Info</h5>
                                            <hr>
                                            <div class="card-body"> <!-- Removed p-0 for better spacing -->
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Company</th>
                                                            <td>{{ $order->company?->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>{{ $order->company?->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Payment Method</th>
                                                            <td>{{ $order?->payment_provider }}</td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div> <!-- End of card-body -->
                                        </div> <!-- End of card -->
                                    </div> <!-- End of col-4 -->
                                    <div class="col-md-12 mb-4">
                                        <div class="card">
                                            <h5 class="ps-4 pt-4">Plan</h5>
                                            <hr>

                                            <div class="card-body"> <!-- Removed p-0 for better spacing -->
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Name</th>
                                                            <td>{{ $order->plan?->label }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Price</th>
                                                            <td>{{ $order?->default_amount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Plan Benefits</th>
                                                            <td>{{ $order?->payment_provider }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Job Post Limit</th>
                                                            <td>{{ $order->plan?->job_limit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Featured Job Post Limit</th>
                                                            <td>{{ $order->plan?->featured_job_limit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Highlighted Job Post Limit</th>
                                                            <td>{{ $order->plan?->highlight_job_limit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Profile Verified</th>
                                                            <td>{{ $order->plan?->profile_verified ? 'Yes ' : 'No' }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div> <!-- End of card-body -->
                                        </div> <!-- End of card -->
                                    </div> <!-- End of col-4 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
