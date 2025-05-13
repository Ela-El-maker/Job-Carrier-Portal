 <div class="card">
     <div class="card-header">
         <h4>All Pending Job Posts</h4>
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
                     <th>Approve</th>
                     <th style="width: 20%">Action</th>
                 </tr>
                 <tbody>
                     @forelse ($jobs as $job)
                         <tr>
                             <td>{{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}</td>
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
                                 <a href="{{ route('admin.jobs.edit', $job?->id) }}" class="btn-small btn btn-primary">
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
                             <td colspan="8" class="text-center">No Results Found!</td>
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
