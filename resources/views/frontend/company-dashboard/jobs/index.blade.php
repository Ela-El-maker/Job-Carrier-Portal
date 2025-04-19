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

                    <!-- Start of Row -->
                    <div class="row">
                        <!-- Product Wrapper -->
                        <div class="col-md-12 product-wrapper">
                            <div style="width: 100%; padding: 15px; margin-bottom: 20px;">
                                <!-- Header with title and actions -->
                                <div
                                    style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
                                    <h2 style="color: #2c3e50; margin: 0; font-size: 1.5rem;">All Job Posts</h2>
                                    <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 10px;">
                                        <form action="{{ route('company.jobs.index') }}" method="GET">
                                            <div style="display: flex; align-items: center;">
                                                <input type="text" name="search" placeholder="Search Jobs"
                                                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; margin-right: 5px; max-width: 100%;">
                                                <button type="submit"
                                                    style="background-color: #3498db; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <a href="{{ route('company.jobs.create') }}"
                                            style="background-color: #2ecc71; color: white; text-decoration: none; padding: 8px 12px; border-radius: 4px; display: flex; align-items: center; white-space: nowrap;">
                                            <i class="fas fa-plus-circle" style="margin-right: 5px;"></i> Create New
                                        </a>
                                    </div>
                                </div>

                                <!-- Job listings table -->
                                <div
                                    style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow-x: auto;">
                                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                                        <thead style="background: linear-gradient(to right, #4361ee, #3a0ca3);">
                                            <tr>
                                                <th
                                                    style="padding: 12px 8px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    #</th>
                                                <th
                                                    style="padding: 12px 8px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Job</th>
                                                <th
                                                    style="padding: 12px 8px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Category/Role</th>
                                                <th
                                                    style="padding:  5px 5px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Applications</th>
                                                <th
                                                    style="padding:  5px 5px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Deadline</th>
                                                <th
                                                    style="padding: 12px 8px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Status</th>
                                                <th
                                                    style="padding: 12px 8px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($jobs as $job)
                                                <tr style="border-bottom: 1px solid #e9ecef;">
                                                    <td
                                                        style="padding: 12px 8px; vertical-align: middle; color: #6c757d; font-weight: 500; font-size: 14px;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="padding: 12px 8px; vertical-align: middle;">
                                                        <div
                                                            style="font-weight: 700; color: #2d3748; font-size: 15px; margin-bottom: 4px; max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                            {{ Str::limit($job?->title,15,'...') }}
                                                        </div>
                                                        <div
                                                            style="color: #718096; font-size: 13px; display: flex; align-items: center; flex-wrap: wrap; gap: 5px;">
                                                            <span
                                                                style="background-color: #e6f2ff; color: #3182ce; padding: 2px 6px; border-radius: 4px; font-size: 11px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                                {{ $job?->company?->name }}
                                                            </span>
                                                            <span>{{ $job?->jobType?->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td style="padding: 12px 8px; vertical-align: middle;">
                                                        <div
                                                            style="font-weight: 600; color: #2d3748; font-size: 14px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                            {{ Str::limit($job?->category?->name,15,'...') }}
                                                        </div>
                                                        <div
                                                            style="color: #718096; font-size: 13px; background-color: #f0f4f8; display: inline-block; padding: 2px 6px; border-radius: 4px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                            {{ Str::limit($job?->jobRole?->name ,15,'...')}}
                                                        </div>
                                                    </td>
                                                    <td style="padding: 5px 5px; vertical-align: middle;">
                                                        <span
                                                            style="background-color: #e6f2ff; color: #3182ce; padding: 4px 8px; border-radius: 4px; font-size: 13px; white-space: nowrap;">
                                                            {{ $job?->applications_count }} Total
                                                        </span>
                                                    </td>
                                                    <td
                                                        style="padding: 5px 5px; vertical-align: middle; color: #4a5568; font-weight: 500; white-space: nowrap;">
                                                        {{ relativeTime($job?->deadline) }}
                                                    </td>
                                                    <td
                                                        style="padding: 12px 8px; vertical-align: middle; white-space: nowrap;">
                                                        @if ($job?->status === 'pending')
                                                            <span
                                                                style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                                        @elseif ($job?->deadline > date('Y-m-d'))
                                                            <span
                                                                style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(76, 175, 80, 0.15); color: #48bb78;">Active</span>
                                                        @else
                                                            <span
                                                                style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f56565;">Expired</span>
                                                        @endif
                                                    </td>
                                                    <td style="padding: 12px 8px; vertical-align: middle;">
                                                        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                                                            <a href="{{ route('company.job.applications', $job?->id) }}"
                                                                title="View Applications"
                                                                style="display: inline-flex; align-items: center; justify-content: center; height: 32px; width: 32px; background-color: #3182ce; color: white; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                                                                <i class="fas fa-list"></i>
                                                            </a>
                                                            <a href="{{ route('company.jobs.edit', $job?->id) }}"
                                                                title="Edit Job"
                                                                style="display: inline-flex; align-items: center; justify-content: center; height: 32px; width: 32px; background-color: #48bb78; color: white; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('company.jobs.destroy', $job?->id) }}"
                                                                class="delete-item" title="Delete Job"
                                                                style="display: inline-flex; align-items: center; justify-content: center; height: 32px; width: 32px; background-color: #e53e3e; color: white; border-radius: 4px; text-decoration: none; transition: all 0.2s ease;">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7"
                                                        style="padding: 40px 20px; text-align: center; background-color: #f7fafc;">
                                                        <div
                                                            style="font-size: 20px; color: #2d3748; margin-bottom: 10px; font-weight: 600;">
                                                            No Jobs Found
                                                        </div>
                                                        <div style="font-size: 16px; color: #718096; margin-bottom: 20px;">
                                                            Create a new job posting to get started
                                                        </div>
                                                        <a href="{{ route('company.jobs.create') }}"
                                                            style="display: inline-block; padding: 10px 20px; background-color: #3182ce; color: white; text-decoration: none; border-radius: 6px; font-weight: 600; transition: all 0.2s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                            Create New Job
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination container -->
                                <div style="padding: 15px 0; text-align: right;">
                                    <nav style="display: inline-block;">
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
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
