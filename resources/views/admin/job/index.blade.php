{{-- @extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Job Posts </h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Job Posts </h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.jobs.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                value="{{ request('search') }}">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 42px" class="btn btn-primary"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Create New</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Job</th>
                            <th>Category/Role</th>
                            <th>Salary</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Golden</th>
                            <th>Approve</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-2">
                                                <img style="width: 50px;height:50px;object-fit:cover;"
                                                    src="{{ asset($job?->company?->logo) }}" alt="">
                                            </div>
                                            <div>
                                                <b>{{ $job?->title }}</b>
                                                <br>
                                                <span>{{ $job?->company?->name }} - {{ $job?->jobType?->name }}</span>
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
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($job?->deadline > date('Y-m-d'))
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td
                                        style="padding: 10px; vertical-align: middle; text-align: center; white-space: nowrap;">
                                        @if ($job?->is_golden)
                                            <!-- Golden Job Badge -->
                                            <span
                                                style="
                                                display: inline-block;
                                                background: linear-gradient(135deg, #FFD700, #F5A623);
                                                color: #222;
                                                font-weight: 600;
                                                padding: 5px 12px;
                                                font-size: 12px;
                                                border-radius: 30px;
                                                box-shadow: 0 2px 4px rgba(245, 166, 35, 0.25);
                                                text-transform: uppercase;
                                                letter-spacing: 0.5px;
                                                border: 1px solid rgba(255, 215, 0, 0.3);
                                                max-width: 100%;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                            ">
                                                <span style="margin-right: 4px; font-size: 11px;">✨</span>Golden Job
                                            </span>
                                        @else
                                            <!-- Regular Badge -->
                                            <span
                                                style="
                                                display: inline-block;
                                                background: #f5f7fa;
                                                color: #667085;
                                                font-weight: 500;
                                                padding: 5px 12px;
                                                font-size: 12px;
                                                border-radius: 30px;
                                                border: 1px solid #e4e7ec;
                                                text-transform: uppercase;
                                                letter-spacing: 0.5px;
                                                max-width: 100%;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                            ">
                                                Standard
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="custom-switch mt-2">
                                                <input @checked($job->status === 'active') type="checkbox"
                                                    data-id="{{ $job->id }}" name="custom-switch-checkbox"
                                                    class="custom-switch-input post_status">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.jobs.edit', $job?->id) }}"
                                            class="btn-small btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.jobs.destroy', $job?->id) }}"
                                            class="btn-small btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"> No Results Found! </td>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.post_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked'); // Get the current state of the toggle
                let newStatus = isChecked ? 'active' : 'inactive'; // Determine the new status

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.job-status.update', ':id') }}'.replace(":id", id),
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: newStatus // Send the new status to the backend
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            window.location
                                .reload(); // Reload the page to reflect the updated status
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred while updating the status:', error);
                        // Optionally, show a user-friendly error message (e.g., using toastr)
                        // toastr.error('An error occurred while updating the status.');
                    }
                });
            });
        });
    </script>
@endpush --}}

@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Job Posts</h1>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-1"></i>Create New
            </a>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">All Job Posts</h4>
                    <div class="card-header-form">
                        <form action="{{ route('admin.jobs.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search jobs..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 25%">Job</th>
                                    <th style="width: 12%">Category/Role</th>
                                    <th style="width: 12%">Salary</th>
                                    <th style="width: 10%">Deadline</th>
                                    <th style="width: 8%">Status</th>
                                    <th style="width: 12%">Type</th>
                                    <th style="width: 8%">Approve</th>
                                    <th style="width: 8%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $job)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3" style="width: 50px; height: 50px; flex-shrink: 0;">
                                                    <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;"
                                                        src="{{ asset($job?->company?->logo) }}"
                                                        alt="{{ $job?->company?->name }} logo">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"
                                                        style="font-size: 14px; font-weight: 600; line-height: 1.3;">
                                                        {{ $job?->title }}
                                                    </h6>
                                                    <span style="font-size: 13px; color: #6c757d;">
                                                        {{ $job?->company?->name }} - {{ $job?->jobType?->name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <div style="font-weight: 600; font-size: 13px;">{{ $job?->category?->name }}
                                                </div>
                                                <span
                                                    style="font-size: 12px; color: #6c757d;">{{ $job?->jobRole?->name }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <div style="font-weight: 600; font-size: 13px;">
                                                    @if ($job?->salary_mode === 'range')
                                                        {{ $job?->min_salary }} - {{ $job?->max_salary }}
                                                        {{ config('settings.site_default_currency') }}
                                                    @else
                                                        {{ $job?->custom_salary }}
                                                    @endif
                                                </div>
                                                <span
                                                    style="font-size: 12px; color: #6c757d;">{{ $job?->salaryType?->name }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span style="font-size: 13px;">{{ formatDate($job?->deadline) }}</span>
                                        </td>
                                        <td class="align-middle">
                                            @if ($job?->status === 'pending')
                                                <span class="badge badge-warning"
                                                    style="font-size: 11px; padding: 5px 8px;">Pending</span>
                                            @elseif ($job?->deadline > date('Y-m-d'))
                                                <span class="badge badge-success"
                                                    style="font-size: 11px; padding: 5px 8px;">Active</span>
                                            @else
                                                <span class="badge badge-danger"
                                                    style="font-size: 11px; padding: 5px 8px;">Expired</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($job?->is_golden)
                                                <span
                                                    style="
                                                    display: inline-block;
                                                    background: linear-gradient(135deg, #FFD700, #F5A623);
                                                    color: #222;
                                                    font-weight: 600;
                                                    padding: 4px 10px;
                                                    font-size: 11px;
                                                    border-radius: 20px;
                                                    box-shadow: 0 1px 3px rgba(245, 166, 35, 0.2);
                                                    text-transform: uppercase;
                                                    letter-spacing: 0.5px;
                                                    border: 1px solid rgba(255, 215, 0, 0.3);
                                                    white-space: nowrap;
                                                ">
                                                    <span style="margin-right: 3px; font-size: 10px;">✨</span>Golden
                                                </span>
                                            @else
                                                <span
                                                    style="
                                                    display: inline-block;
                                                    background: #f5f7fa;
                                                    color: #667085;
                                                    font-weight: 500;
                                                    padding: 4px 10px;
                                                    font-size: 11px;
                                                    border-radius: 20px;
                                                    border: 1px solid #e4e7ec;
                                                    text-transform: uppercase;
                                                    letter-spacing: 0.5px;
                                                    white-space: nowrap;
                                                ">
                                                    Standard
                                                </span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <label class="custom-switch mt-0">
                                                <input @checked($job->status === 'active') type="checkbox"
                                                    data-id="{{ $job->id }}" name="custom-switch-checkbox"
                                                    class="custom-switch-input post_status">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.jobs.edit', $job?->id) }}"
                                                    class="btn btn-primary btn-sm mr-1" style="padding: 4px 8px;">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.jobs.destroy', $job?->id) }}"
                                                    class="btn btn-danger btn-sm delete-item" style="padding: 4px 8px;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="empty-state">
                                                <div class="empty-state-icon">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <h6>No Results Found!</h6>
                                                <p class="lead">
                                                    Try adjusting your search criteria or create a new job post.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        @if ($jobs->hasPages())
                            {{ $jobs->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.post_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked');
                let newStatus = isChecked ? 'active' : 'inactive';

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.job-status.update', ':id') }}'.replace(":id", id),
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred while updating the status:', error);
                    }
                });
            });
        });
    </script>
@endpush
