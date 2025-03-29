@extends('frontend.layouts.master')
@section('contents')
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
                @include('frontend.candidate-dashboard.sidebar')

                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <div class="mb-3"
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h3 class="mb-0" style="font-size: 22px; color: #333; font-weight: 700; margin: 0;">Bookmarked
                                Jobs <span
                                    style="background-color: #4361ee; color: white; padding: 2px 8px; border-radius: 20px; font-size: 14px; margin-left: 8px;">200</span>
                            </h3>
                            <form action="" method="GET" style="display: flex; align-items: center;">
                                <div
                                    style="display: flex; align-items: center; background-color: white; border-radius: 8px; padding: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                    <input type="text" name="search" placeholder="Search Jobs"
                                        style="padding: 10px 16px; border: none; border-radius: 8px; width: 250px; outline: none; font-size: 14px;">
                                    <button type="submit"
                                        style="background-color: #4361ee; color: white; border: none; padding: 10px 16px; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-size: 14px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div
                            style="background-color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); overflow: hidden;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead style="background: linear-gradient(to right, #4361ee, #3a0ca3);">
                                    <tr>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            #</th>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Job</th>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Category/Role</th>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Salary</th>

                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Deadline</th>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Status</th>
                                        <th
                                            style="padding: 12px; color: white; font-weight: 600; text-align: left; text-transform: uppercase; letter-spacing: 0.5px; font-size: 13px;">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookmarks as $bookmark)
                                        <tr
                                            style="border-bottom: 1px solid #e9ecef; transition: background-color 0.2s ease;">
                                            <td
                                                style="padding: 12px; vertical-align: middle; color: #6c757d; font-weight: 500; font-size: 14px;">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="padding: 12px; vertical-align: middle;">
                                                <div
                                                    style="font-weight: 700; color: #2d3748; font-size: 15px; margin-bottom: 4px; max-width: 250px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $bookmark?->job?->title }}
                                                </div>
                                                <div
                                                    style="color: #718096; font-size: 13px; display: flex; align-items: center;">
                                                    <span
                                                        style="background-color: #e6f2ff; color: #3182ce; padding: 2px 6px; border-radius: 4px; margin-right: 8px; font-size: 11px; max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $bookmark?->job?->company?->name }}
                                                    </span>
                                                    {{ $bookmark?->job?->jobType?->name }}
                                                </div>
                                            </td>
                                            <td style="padding: 12px; vertical-align: middle;">
                                                <div
                                                    style="font-weight: 600; color: #2d3748; font-size: 14px; max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $bookmark?->job?->category?->name }}
                                                </div>
                                                <div
                                                    style="color: #718096; font-size: 13px; background-color: #f0f4f8; display: inline-block; padding: 2px 6px; border-radius: 4px; max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $bookmark?->job?->jobRole?->name }}
                                                </div>
                                            </td>

                                            <td
                                                style="padding: 12px; vertical-align: middle; font-size: 14px; color: #444;">
                                                @if ($bookmark?->job?->salary_mode === 'range')
                                                    <div style="font-weight: 600;">{{ $bookmark?->job?->min_salary }} -
                                                        {{ $bookmark?->job?->max_salary }}
                                                        {{ config('settings.site_default_currency') }}</div>
                                                    <span style="color: #6c757d; font-size: 13px;">
                                                        per {{ $bookmark?->job?->salaryType?->name }}
                                                    </span>
                                                @else
                                                    <div style="font-weight: 600;">{{ $bookmark?->job?->custom_salary }}
                                                    </div>
                                                    <span style="color: #6c757d; font-size: 13px;">
                                                        per {{ $bookmark?->job?->salaryType?->name }}
                                                    </span>
                                                @endif
                                            </td>



                                            <td style="padding: 12px; vertical-align: middle;">
                                                @php
                                                    $deadlineInfo = calculateDeadline($bookmark?->job?->deadline);
                                                @endphp
                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                    <i class="{{ $deadlineInfo['icon'] }}"
                                                        style="color: {{ $deadlineInfo['class'] === 'deadline-passed' ? '#e53e3e' : '#38a169' }};"></i>
                                                    <span
                                                        style="color: {{ $deadlineInfo['class'] === 'deadline-passed' ? '#e53e3e' : '#4a5568' }}; font-weight: 500;">
                                                        {{ $deadlineInfo['message'] }}
                                                    </span>
                                                </div>
                                                <div style="font-size: 12px; color: #718096; margin-top: 4px;">
                                                    {{ formatDate($bookmark?->job?->deadline) }}
                                                </div>
                                            </td>

                                            <td style="padding: 12px; vertical-align: middle;">
                                                @if ($bookmark?->job?->status === 'pending')
                                                    <span
                                                        style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                                @elseif ($bookmark?->job?->deadline > now())
                                                    <span
                                                        style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(76, 175, 80, 0.15); color: #48bb78;">Active</span>
                                                @else
                                                    <span
                                                        style="display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f56565;">Expired</span>
                                                @endif
                                            </td>
                                            <td style="padding: 12px; vertical-align: middle;">
                                                @if ($bookmark?->job?->deadline < now())
                                                    <span
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #6c757d; color: white; border-radius: 6px; font-size: 14px; cursor: not-allowed; opacity: 0.7;">
                                                        <i class="fas fa-eye-slash" style="margin-right: 5px;"></i> Expired
                                                    </span>
                                                @else
                                                    <a href="{{ route('jobs.show', $bookmark?->job?->slug) }}"
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #4361ee; color: white; border-radius: 6px; text-decoration: none; transition: background-color 0.2s; font-size: 14px; box-shadow: 0 2px 5px rgba(67, 97, 238, 0.2);">
                                                        <i class="fas fa-eye" style="margin-right: 5px;"></i> View
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"
                                                style="padding: 40px; text-align: center; background-color: #f7fafc;">
                                                <div
                                                    style="font-size: 24px; color: #2d3748; margin-bottom: 10px; font-weight: 600;">
                                                    No Jobs Found
                                                </div>
                                                <div style="font-size: 16px; color: #718096; margin-bottom: 20px;">
                                                    Create a new job posting to get started
                                                </div>
                                                <a href="{{ route('company.jobs.create') }}"
                                                    style="display: inline-block; padding: 10px 20px; background-color: #4361ee; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                                    Create New Job
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 15px; border-top: 1px solid #eaedf2; text-align: right;">
                            <nav style="display: inline-block;">
                                @if ($bookmarks->hasPages())
                                    {{ $bookmarks->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                    <!-- End of Job Post Wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
