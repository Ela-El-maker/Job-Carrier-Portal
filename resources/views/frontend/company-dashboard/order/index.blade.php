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
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <!-- Start of Row -->
                        <div class="row candidate-profile">
                            <!-- Start of Profile Description and Dashboard Cards -->
                            <div class="col-md-12 col-xs-12">
                                <!-- Card Container for Candidate Details -->
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="pt-4">All Orders for {{ auth()->user()->name }}</h4>
                                            <div class="card-header-form">
                                                <form action="" method="GET">
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            placeholder="Search" value="{{ request('search') }}">
                                                        <div class="input-group-btn">
                                                            <button type="submit" style="height: 42px"
                                                                class="btn btn-primary"><i
                                                                    class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Order No.</th>
                                                        <th>Plan</th>
                                                        <th>Payment Method</th>
                                                        <th>Paid Amount</th>
                                                        <th>Payment Status</th>

                                                        <th>Transaction Date</th>
                                                        <th style="width: 20%">Action</th>
                                                    </tr>
                                                    <tbody>
                                                        @forelse ($orders as $order)
                                                            <tr>
                                                                <td>#{{ $order?->order_id }}
                                                                </td>

                                                                <td>{{ $order?->package_name }}</td>
                                                                <td>{{ $order?->payment_provider }}</td>

                                                                <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}
                                                                </td>

                                                                <td>
                                                                    <div class="badge badge-info">
                                                                        {{ $order?->payment_status }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        style="font-size: 14px; font-weight: bold; color: #333;">
                                                                        {{ $order?->created_at->format('M d, Y') }}
                                                                    </span>
                                                                    <br>
                                                                    <span style="font-size: 12px; color: #666;">
                                                                        {{ $order?->created_at->format('h:i A') }}
                                                                    </span>
                                                                </td>

                                                                <td>
                                                                    <a href="{{ route('company.orders.show', $order?->id) }}"
                                                                        class="btn-sm btn btn-primary"><i
                                                                            class="fas fa-eye"></i> </a>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center"> No Results Found!
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <nav class="d-inline-block">
                                                @if ($orders->hasPages())
                                                    {{ $orders->withQueryString()->links() }}
                                                @endif
                                            </nav>

                                        </div>
                                    </div>
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
