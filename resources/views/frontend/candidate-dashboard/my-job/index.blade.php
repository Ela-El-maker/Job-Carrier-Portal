@extends('frontend.layouts.master')
@section('contents')
    <!-- =============== Start of Page Header Section =============== -->
    <section style="background-color: #f8f9fa; padding: 20px 0;">
        <div class="container">
            <div class="row" style="display: flex; align-items: center;">
                <div class="col-md-6">
                    <h2 style="margin: 0; font-weight: 700; color: #333;">My Applications</h2>
                </div>
                <div class="col-md-6">
                    <ul style="list-style: none; display: flex; justify-content: flex-end; margin: 0; padding: 0;">
                        <li style="margin-right: 10px;"><a href="{{ url('/') }}"
                                style="color: #4361ee; text-decoration: none;">Home</a></li>
                        <li style="color: #6c757d;">Applied Jobs</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header Section =============== -->

    <!-- ===== Start of Main Content Section ===== -->
    <section style="padding: 30px 0;">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                    @include('frontend.candidate-dashboard.sidebar')

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div style="background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <!-- Header with title and search -->
                        <div
                            style="padding: 15px 20px; border-bottom: 1px solid #eaedf2; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <h5 style="margin: 0; font-weight: 700; font-size: 18px; color: #333;">Applied Jobs</h5>
                                <span
                                    style="background-color: #4361ee; color: white; padding: 3px 10px; border-radius: 15px; font-size: 12px; margin-left: 10px;">{{ $appliedJobs->total() }}</span>
                            </div>
                            <form action="" method="GET" style="display: flex; max-width: 280px;">
                                <div style="display: flex; width: 100%;">
                                    <input type="text" name="search" placeholder="Search Jobs"
                                        style="border: 1px solid #ced4da; border-right: none; padding: 8px 12px; border-radius: 4px 0 0 4px; width: 100%; outline: none;">
                                    <button type="submit"
                                        style="background-color: #4361ee; color: white; border: none; padding: 8px 12px; border-radius: 0 4px 4px 0; cursor: pointer;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Table container -->
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead style="background: linear-gradient(to right, #4361ee, #3a0ca3);">
                                    <tr>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">
                                            #</th>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">
                                            Position</th>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">
                                            Category</th>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">
                                            Applied</th>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: left; font-size: 13px; white-space: nowrap;">
                                            Status</th>
                                        <th
                                            style="padding: 12px 15px; color: white; font-weight: 600; text-align: center; font-size: 13px; white-space: nowrap;">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($appliedJobs as $appliedJob)
                                        <tr
                                            style="border-bottom: 1px solid #eaedf2; transition: background-color 0.2s ease;">
                                            <td style="padding: 12px 15px; vertical-align: middle; color: #6c757d;">
                                                {{ $loop->iteration }}</td>
                                            <td style="padding: 12px 15px; vertical-align: middle;">
                                                <div
                                                    style="margin-bottom: 4px; font-weight: 600; color: #333; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                    {{ $appliedJob?->job?->title }}
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span
                                                        style="background-color: #f1f3f9; color: #4361ee; padding: 2px 6px; border-radius: 4px; font-size: 11px; margin-right: 8px; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        {{ $appliedJob?->job?->company?->name }}
                                                    </span>
                                                    <span
                                                        style="color: #6c757d; font-size: 12px;">{{ $appliedJob?->job?->jobType?->name }}</span>
                                                </div>
                                            </td>
                                            <td style="padding: 12px 15px; vertical-align: middle;">
                                                <div
                                                    style="font-weight: 500; color: #333; font-size: 13px; margin-bottom: 4px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                    {{ $appliedJob?->job?->category?->name }}
                                                </div>
                                                <div
                                                    style="font-size: 11px; background-color: #f1f3f9; display: inline-block; padding: 2px 6px; border-radius: 4px; color: #6c757d; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                    {{ $appliedJob?->job?->jobRole?->name }}
                                                </div>
                                            </td>
                                            <td style="padding: 12px 15px; vertical-align: middle;">
                                                <div style="font-size: 13px; color: #333; margin-bottom: 3px;">
                                                    {{ relativeTime($appliedJob?->created_at) }}
                                                </div>
                                                <div style="font-size: 12px; color: #6c757d;">
                                                    Deadline: {{ formatDate($appliedJob?->job?->deadline) }}
                                                </div>
                                            </td>
                                            <td style="padding: 12px 15px; vertical-align: middle;">
                                                @if ($appliedJob?->job?->status === 'pending')
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                                @elseif ($appliedJob?->job?->deadline > now())
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(76, 175, 80, 0.15); color: #48bb78;">Active</span>
                                                @else
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f56565;">Expired</span>
                                                @endif
                                            </td>
                                            <td style="padding: 12px 15px; vertical-align: middle; text-align: center;">
                                                @if ($appliedJob?->job?->deadline < now())
                                                    <button
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #6c757d; color: white; border-radius: 4px; border: none; font-size: 13px; cursor: not-allowed; opacity: 0.7;">
                                                        <i class="fas fa-eye-slash" style="margin-right: 5px;"></i> Expired
                                                    </button>
                                                @else
                                                    <a href="{{ route('jobs.show', $appliedJob?->job?->slug) }}"
                                                        style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 12px; background-color: #4361ee; color: white; border-radius: 4px; text-decoration: none; font-size: 13px; box-shadow: 0 2px 4px rgba(67, 97, 238, 0.2);">
                                                        <i class="fas fa-eye" style="margin-right: 5px;"></i> View
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="padding: 40px 20px; text-align: center;">
                                                <div style="padding: 20px;">
                                                    <i class="fas fa-clipboard-list"
                                                        style="font-size: 48px; color: #d1d5db; margin-bottom: 15px;"></i>
                                                    <h5
                                                        style="font-size: 18px; color: #333; margin-bottom: 10px; font-weight: 600;">
                                                        No Job Applications Found</h5>
                                                    <p style="color: #6c757d; margin-bottom: 20px; font-size: 14px;">You
                                                        haven't applied to any jobs yet.</p>
                                                    <a href="{{ route('jobs.index') }}"
                                                        style="display: inline-block; padding: 8px 16px; background-color: #4361ee; color: white; text-decoration: none; border-radius: 4px; font-weight: 500; transition: all 0.3s ease;">
                                                        Explore Jobs
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if ($appliedJobs->hasPages())
                            <div style="padding: 15px; border-top: 1px solid #eaedf2; text-align: right;">
                                {{ $appliedJobs->withQueryString()->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Main Content Section ===== -->
@endsection
