@extends('admin.layouts.master')
@section('contents')
<style>
    .badge {
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>
    <section class="section">
        <div class="section-header">
            <h1>Job Details</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Job: {{ $job->title }}</h2>
                        <div class="card-header-action ml-auto">
                            <!-- Back Button -->
                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>Delete
                                </button>
                            </form>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Job Details -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Basic Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200px">Job Title</th>
                                                <td>{{ $job->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Company</th>
                                                <td>{{ $job->company?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>{{ $job->category?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Vacancies</th>
                                                <td>{{ $job->vacancies }}</td>
                                            </tr>
                                            <tr>
                                                <th>Deadline</th>
                                                <td>{{ $job->deadline }} : {{ relativeTime($job?->deadline) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    @if($job->status === 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Details -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Location Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200px">Country</th>
                                                <td>{{ $job->country?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>State</th>
                                                <td>{{ $job->state?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <td>{{ $job->city?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $job->address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Salary Details -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Salary Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200px">Salary Mode</th>
                                                <td>{{ ucfirst($job->salary_mode) }}</td>
                                            </tr>
                                            @if($job->salary_mode === 'range')
                                                <tr>
                                                    <th>Minimum Salary</th>
                                                    <td>{{ $job->min_salary }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Maximum Salary</th>
                                                    <td>{{ $job->max_salary }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th>Custom Salary</th>
                                                    <td>{{ $job->custom_salary }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Salary Type</th>
                                                <td>{{ $job->salaryType?->name }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Attributes -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Job Attributes</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200px">Experience</th>
                                                <td>{{ $job->jobExperience?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Job Role</th>
                                                <td>{{ $job->jobRole?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Education</th>
                                                <td>{{ $job->jobEducation?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Job Type</th>
                                                <td>{{ $job->jobType?->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tags</th>
                                                <td>
                                                    @foreach($job->tags as $tag)
                                                        <span class="badge badge-primary">{{ $tag->name }}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Skills</th>
                                                <td>
                                                    @foreach($job->skills as $skill)
                                                        <span class="badge badge-success">{{ $skill?->skill?->name }}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Benefits</th>
                                                <td>
                                                    @foreach(( $job?->benefits) as $jobBenefit)
                                                        <span class="badge badge-info">{{ $jobBenefit?->benefit?->name }}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Promotion Status -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Promotion Status</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200px">Featured</th>
                                                <td>
                                                    @if($job->is_featured)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-secondary">No</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Highlight</th>
                                                <td>
                                                    @if($job->is_highlight)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-secondary">No</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Golden Job</th>
                                                <td>
                                                    @if($job->is_golden)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-secondary">No</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Job Description</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! $job->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
