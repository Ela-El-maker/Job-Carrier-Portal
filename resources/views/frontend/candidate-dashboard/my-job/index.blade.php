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
                @include('frontend.company-dashboard.sidebar')
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()->name }}!</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        <div class="mb-3">
                            <h3 class="mb-0">Applied Jobs(200)</h3>
                        </div>
                        <div style="overflow-x: auto;">
                            <table class="table"
                                style="border-collapse: separate; border-spacing: 0; width: 100%; margin-bottom: 0;">
                                <thead>
                                    <tr style="background-color: #f8f9fa;">
                                        <th
                                            style="padding: 15px; border-top: none; border-bottom: 2px solid #e9ecef; font-weight: 600; color: #495057;">
                                            Company</th>
                                        <th
                                            style="padding: 15px; border-top: none; border-bottom: 2px solid #e9ecef; font-weight: 600; color: #495057;">
                                            Salary</th>
                                        <th
                                            style="padding: 15px; border-top: none; border-bottom: 2px solid #e9ecef; font-weight: 600; color: #495057;">
                                            Applied Date</th>
                                        <th
                                            style="padding: 15px; border-top: none; border-bottom: 2px solid #e9ecef; font-weight: 600; color: #495057;">
                                            Status</th>
                                        <th
                                            style="padding: 15px; border-top: none; border-bottom: 2px solid #e9ecef; font-weight: 600; color: #495057; width: 15%;">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($appliedJobs as $appliedJob)
                                        <tr
                                            style="transition: background-color 0.2s; border-bottom: 1px solid #e9ecef; background-color: {{ $loop->even ? '#f9f9f9' : 'white' }};">
                                            <td style="padding: 15px; vertical-align: middle;">
                                                <div style="display: flex; align-items: center;">
                                                    <div
                                                        style="width: 50px; height: 50px; border-radius: 6px; overflow: hidden; background-color: #f8f9fa; border: 1px solid #dee2e6; display: flex; align-items: center; justify-content: center;">
                                                        <img style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                                            src="{{ asset($appliedJob?->job?->company?->logo) }}"
                                                            alt="">
                                                    </div>
                                                    <div style="padding-left: 15px;">
                                                        <h6
                                                            style="margin: 0; font-weight: 600; color: #333; font-size: 14px;">
                                                            {{ $appliedJob?->job?->company?->name }}
                                                        </h6>
                                                        <span
                                                            style="color: #6c757d; font-size: 13px;">{{ $appliedJob?->job?->company?->companyCountry?->name }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                style="padding: 15px; vertical-align: middle; font-size: 14px; color: #444;">
                                                @if ($appliedJob?->job?->salary_mode === 'range')
                                                    <div style="font-weight: 600;">{{ $appliedJob?->job?->min_salary }} -
                                                        {{ $appliedJob?->job?->max_salary }}
                                                        {{ config('settings.site_default_currency') }}</div>
                                                    <span style="color: #6c757d; font-size: 13px;">
                                                        per {{ $appliedJob?->job?->salaryType?->name }}
                                                    </span>
                                                @else
                                                    <div style="font-weight: 600;">{{ $appliedJob?->job?->custom_salary }}
                                                    </div>
                                                    <span style="color: #6c757d; font-size: 13px;">
                                                        per {{ $appliedJob?->job?->salaryType?->name }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td
                                                style="padding: 15px; vertical-align: middle; font-size: 14px; color: #555;">
                                                {{ formatDate($appliedJob?->created_at) }}
                                            </td>
                                            <td style="padding: 15px; vertical-align: middle;">
                                                @if ($appliedJob?->job?->deadline < now())
                                                    <span
                                                        style="display: inline-block; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f44336;">Expired</span>
                                                @else
                                                    @php
                                                        $status = strtolower($appliedJob?->job?->status);
                                                        $badgeStyle = '';
                                                        switch ($status) {
                                                            case 'pending':
                                                                $badgeStyle =
                                                                    'background-color: rgba(255, 152, 0, 0.15); color: #ff9800;';
                                                                break;
                                                            case 'active':
                                                                $badgeStyle =
                                                                    'background-color: rgba(76, 175, 80, 0.15); color: #4CAF50;';
                                                                break;
                                                            case 'expired':
                                                                $badgeStyle =
                                                                    'background-color: rgba(244, 67, 54, 0.15); color: #f44336;';
                                                                break;
                                                            default:
                                                                $badgeStyle =
                                                                    'background-color: rgba(108, 117, 125, 0.15); color: #6c757d;';
                                                        }
                                                    @endphp
                                                    <span
                                                        style="display: inline-block; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; {{ $badgeStyle }}">
                                                        {{ ucfirst($status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td style="padding: 15px; vertical-align: middle;">
                                                @if ($appliedJob?->job?->deadline < now())
                                                    <span
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #6c757d; color: white; border-radius: 4px; font-size: 14px; cursor: not-allowed; opacity: 0.7;">
                                                        <i class="fas fa-eye-slash" style="margin-right: 5px;"></i> Expired
                                                    </span>
                                                @else
                                                    <a href="{{ route('jobs.show', $appliedJob?->job?->slug) }}"
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #4361ee; color: white; border-radius: 4px; text-decoration: none; transition: background-color 0.2s; font-size: 14px;">
                                                        <i class="fas fa-eye" style="margin-right: 5px;"></i> View
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" style="padding: 30px; text-align: center; color: #6c757d;">
                                                <div style="font-size: 16px; margin-bottom: 5px;">No applications found
                                                </div>
                                                <div style="font-size: 14px;">When you apply for jobs, they will appear here
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->

    <!-- ===== End of Main Wrapper Section ===== -->
@endsection
