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
                    <h2>JOBS</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            <!-- Start of Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li class="active">Company Jobs</li>
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
                                            <h4>All Job Posts </h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="card-header-form">
                                                        <form action="{{ route('company.jobs.index') }}" method="GET">
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
                                                <div class="col-md-3">
                                                    <a href="{{ route('company.jobs.create') }}" class="btn btn-primary"><i
                                                            class="fas fa-plus-circle"></i>
                                                        Create New</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th style="width: 5%">#</th>
                                                        <th>Job</th>
                                                        <th>Category/Role</th>
                                                        <th>Salary</th>
                                                        <th>Deadline</th>
                                                        <th>Status</th>
                                                        <th style="width: 10%">Action</th>
                                                    </tr>
                                                    <tbody>
                                                        @forelse ($jobs as $job)
                                                            <tr>
                                                                <td>{{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}
                                                                </td> <!-- Add numbering here -->
                                                                <td>
                                                                    <div class="d-flex">

                                                                        <div>
                                                                            <b>{{ $job?->title }}</b>
                                                                            <br>
                                                                            <span>{{ $job?->company?->name }} -
                                                                                {{ $job?->jobType?->name }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <b>{{ $job?->category?->name }}</b>
                                                                        <br>
                                                                        <span>{{ $job?->jobRole?->name }}</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if ($job?->salary_mode === 'range')
                                                                        {{ $job?->min_salary }} - {{ $job?->max_salary }}
                                                                        {{ config('settings.site_default_currency') }}
                                                                        <br>
                                                                        <span>{{ $job?->salaryType?->name }}</span>
                                                                    @else
                                                                        {{ $job?->custom_salary }}
                                                                        <br>
                                                                        <span>{{ $job?->salaryType?->name }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ formatDate($job?->deadline) }}</td>
                                                                <td>
                                                                    @if ($job?->status === 'pending')
                                                                        <span class="badge"
                                                                            style="background-color: #ffc107; ">Pending</span>
                                                                    @elseif ($job?->deadline && \Carbon\Carbon::parse($job->deadline)->isFuture())
                                                                        <span class="badge"
                                                                            style="background-color: #28a745;">Active</span>
                                                                    @else
                                                                        <span class="badge"
                                                                            style="background-color: #dc3545;">Expired</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('company.jobs.edit', $job?->id) }}"
                                                                        class="btn btn-primary btn-small btn-block"
                                                                        style="margin-bottom: 10px;">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('company.jobs.destroy', $job?->id) }}"
                                                                        class="btn btn-danger btn-small btn-block delete-item">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
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
                                                @if ($jobs->hasPages())
                                                    {{ $jobs->withQueryString()->links() }}
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
