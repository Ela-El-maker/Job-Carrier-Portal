@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1>Candidates</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to All Users
        </a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">All Registered Candidates</h4>
            </div>

            <div class="card-body p-0">
                <!-- Centered Search Bar -->
                <form method="GET" action="{{ route('admin.users.candidates') }}" class="mb-3 d-flex justify-content-center">
                    <div class="input-group" style="max-width: 400px;">
                        <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                               value="{{ request()->get('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 20%">Image</th>
                                <th style="width: 20%;">Account Name</th>
                                <th style="width: 15%;">Registered</th>
                                <th style="width: 10%;">Status</th>
                                <th>Active</th>
                                {{-- <th style="width: 15%;">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($candidates as $index => $candidate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($candidate?->image ?? 'default-avatar.png') }}"
                                                 alt="Avatar" class="rounded-circle mr-2"
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="badge badge-primary" style="font-size: 0.9rem;">
                                                {{ $candidate?->title }}
                                            </span>
                                        </div>
                                    </td>


                                    <td>{{ $candidate?->full_name }}</td>
                                    <td>{{ $candidate->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($candidate->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $candidate->last_login_at ? $candidate->last_login_at->diffForHumans() : 'Never' }}
                                    </td>
                                    {{-- <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.users.show', $candidate?->id) }}"
                                                class="btn btn-info btn-sm mr-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $candidate?->id) }}"
                                                class="btn btn-primary btn-sm mr-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.users.destroy', $candidate?->id) }}"
                                                class="btn btn-danger btn-sm delete-item" style="padding: 4px 8px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <p class="text-muted mb-0">No candidates found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($candidates->hasPages())
                <div class="card-footer d-flex justify-content-end">
                    {{ $candidates->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
