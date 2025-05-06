@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <div>
                <a href="{{ route('admin.users.candidates') }}" class="btn btn-outline-primary mr-2">
                    <i class="fas fa-user"></i> Candidates
                </a>
                <a href="{{ route('admin.users.companies') }}" class="btn btn-outline-success">
                    <i class="fas fa-building"></i> Companies
                </a>

            </div>
        </div>


        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">All Registered Users</h4>
                </div>

                <div class="card-body p-0">
                    <!-- Centered Search Bar -->
                    <form method="GET" action="{{ route('admin.users.index') }}"
                        class="mb-3 d-flex justify-content-center">
                        <div class="input-group" style="max-width: 400px;">
                            <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                                value="{{ request()->get('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>AccName</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($user->role === 'company' && $user->company)
                                                    <img src="{{ asset($user->company->logo ?? 'default-avatar.png') }}"
                                                        alt="Avatar" class="rounded-circle"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @elseif ($user->role === 'candidate' && $user->candidateProfile)
                                                    <img src="{{ asset($user->candidateProfile->image ?? 'default-avatar.png') }}"
                                                        alt="Avatar" class="rounded-circle"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('default-avatar.png') }}" alt="Avatar"
                                                        class="rounded-circle"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                            </td>
                                            <td>{{ $user->name ?? 'N/A' }}</td>
                                            <td>{{ ucfirst($user->role ?? 'N/A') }}</td>
                                            <td>
                                                @if ($user->role === 'company')
                                                    {{ $user->company->name ?? 'N/A' }}
                                                @elseif ($user->role === 'candidate')
                                                    {{ $user->candidateProfile->full_name ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                                        class="btn btn-info btn-sm mr-1" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm mr-1" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.users.destroy', $user?->id) }}"
                                                        class="btn btn-danger btn-sm delete-item" style="padding: 4px 8px;">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center text-muted py-4">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                @if ($users->hasPages())
                    <div class="card-footer d-flex justify-content-end">
                        {{ $users->withQueryString()->links() }}
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
