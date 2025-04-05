@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Hero Posts </h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Hero Posts </h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.hero.index') }}" method="GET">
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
                <a href="{{ route('admin.hero.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Create New</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Image</th>
                            <th>Background</th>
                            <th>Title</th>
                            <th style="width: 17%">Visible at Home</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                        <tbody>
                            @forelse ($heroes as $hero)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($hero?->image) }}" class="rounded shadow-sm"
                                            style="width: 80px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <img src="{{ asset($hero?->background_image) }}" class="rounded shadow-sm"
                                            style="width: 80px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="align-middle">
                                        <div class="font-weight-bold">{{ $hero?->title }}</div>
                                        <div class="small text-muted">{{ Str::limit(strip_tags($hero?->sub_title, 50)) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($hero?->show_at_home === 1)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.hero.edit', $hero?->id) }}"
                                            class="btn-small btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.hero.destroy', $hero?->id) }}"
                                            class="btn-small btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="py-5">
                                            <i class="fas fa-image fa-4x text-light mb-3"></i>
                                            <p class="text-muted mb-0">No hero posts found</p>
                                            <a href="{{ route('admin.hero.create') }}" class="btn btn-sm btn-primary mt-3">
                                                Create First Hero Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer with Pagination -->
            <div class="card-footer bg-white">
                <nav class="d-flex justify-content-end">
                    {{-- @if (isset($heroes) && $heroes->hasPages())
                        {{ $heroes->withQueryString()->links() }}
                    @endif --}}
                </nav>
            </div>
        </div>
    </div>
@endsection
