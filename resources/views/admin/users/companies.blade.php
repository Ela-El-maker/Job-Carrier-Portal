@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center">
            <h1>Companies</h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to All Users
            </a>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">All Registered Companies</h4>
                </div>
                <div class="card-body p-0">
                    <!-- Centered Search Bar -->
                    <form method="GET" action="{{ route('admin.users.companies') }}"
                        class="mb-3 d-flex justify-content-center">
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
                                    <th>Logo</th>
                                    <th style="width: 20%;">Company Name</th>
                                    <th style="width: 20%;">Website</th>
                                    <th style="width: 15%;">Registered</th>
                                    <th style="width: 10%;">Status</th>
                                    {{-- <th style="width: 10%;">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($company?->logo ?? 'default-avatar.png') }}" alt="Avatar"
                                                class="rounded-circle"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>{{ $company->name }}</td>
                                        <td>
                                            @if ($company->website)
                                                <a href="{{ $company->website }}"
                                                    target="_blank">{{ $company->website }}</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $company->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if ($company->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.users.show', $company?->id) }}"
                                                    class="btn btn-info btn-sm mr-1" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.users.edit', $company?->id) }}"
                                                    class="btn btn-primary btn-sm mr-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.users.destroy', $company?->id) }}"
                                                    class="btn btn-danger btn-sm delete-item" style="padding: 4px 8px;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <p class="text-muted mb-0">No companies found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($companies->hasPages())
                <div class="card-footer d-flex justify-content-end">
                    {{ $companies->links() }}
                </div>
            @endif
            </div>
        </div>
    </section>
@endsection
