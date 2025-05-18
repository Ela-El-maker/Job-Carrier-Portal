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
    <section class="page-header" style="padding-top: 200px;">
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

                                        <div style="overflow-x: auto;">
                                            <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
                                                <thead>
                                                    <tr style="background-color: #f1f4f8;">
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">#</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Order
                                                            No.</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Plan
                                                        </th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Payment
                                                            Method</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Paid
                                                            Amount</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Payment
                                                            Status</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">
                                                            Transaction Date</th>
                                                        <th style="padding: 12px; text-align: left; color: #2c3e50;">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($orders as $order)
                                                        <tr style="border-bottom: 1px solid #e9ecef;">
                                                            <td style="padding: 12px;">
                                                                {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}
                                                            </td>
                                                            <td style="padding: 12px; color: #2980b9;">
                                                                #{{ $order?->order_id }}</td>
                                                            <td style="padding: 12px;">{{ $order?->package_name }}</td>
                                                            <td style="padding: 12px;">{{ $order?->payment_provider }}</td>
                                                            <td style="padding: 12px; font-weight: bold;">
                                                                {{ $order?->amount }} {{ $order?->paid_in_currency }}
                                                            </td>
                                                            <td style="padding: 12px;">
                                                                <span
                                                                    style="background-color:
                                    @if ($order?->payment_status == 'completed') #2ecc71
                                    @elseif($order?->payment_status == 'pending') #f39c12
                                    @else #e74c3c @endif;
                                    color: white; padding: 4px 8px; border-radius: 4px;">
                                                                    {{ $order?->payment_status }}
                                                                </span>
                                                            </td>
                                                            <td style="padding: 12px;">
                                                                <div style="color: #2c3e50; font-weight: bold;">
                                                                    {{ $order?->created_at->format('M d, Y') }}
                                                                </div>
                                                                <div style="color: #7f8c8d; font-size: 0.8em;">
                                                                    {{ $order?->created_at->format('h:i A') }}
                                                                </div>
                                                            </td>
                                                            <td style="padding: 12px;">
                                                                <a href="{{ route('company.orders.show', $order?->id) }}"
                                                                    style="background-color: #3498db; color: white; text-decoration: none; padding: 6px 10px; border-radius: 4px;">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8"
                                                                style="text-align: center; padding: 20px; color: #7f8c8d;">
                                                                No Orders Found
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
