@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Page Builder</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Custom Pages</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.page-builder.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search pages"
                                value="{{ request('search') }}">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 42px" class="btn btn-primary"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('admin.page-builder.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus-circle"></i>
                    Create New Page</a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Show</th>
                                <th>Change</th>
                                <th>Last Updated</th>
                                <th style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $page)
                                <tr>
                                    <td>{{ ($pages->currentPage() - 1) * $pages->perPage() + $loop->iteration }}</td>
                                    <td>{{ $page->page_name }}</td>
                                    <td><code>/page/{{ $page->slug }}</code></td>

                                    <!-- Status Column -->
                                    <td>
                                        @if ($page->status === 'published')
                                            <span class="badge badge-success">Published</span>
                                        @elseif ($page->status === 'draft')
                                            <span class="badge badge-secondary">Draft</span>
                                        @else
                                            <span class="badge badge-light">Unknown</span>
                                        @endif
                                    </td>

                                    <!-- Show Column -->
                                    <td>
                                        @if ($page->show)
                                            <span class="badge badge-primary">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <label class="custom-switch mt-0">
                                            <input type="checkbox" class="custom-switch-input page_builder_status"
                                                name="custom-switch-checkbox" data-id="{{ $page?->id }}"
                                                @checked($page?->show)>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>

                                    <!-- Last Updated -->
                                    <td>{{ $page->updated_at->format('d M Y, H:i') }}</td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('admin.page-builder.show', $page->id) }}"
                                            class="btn-small btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.page-builder.edit', $page->id) }}"
                                            class="btn-small btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('admin.page-builder.destroy', $page?->id) }}"
                                            class="btn-small btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No pages found!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($pages->hasPages())
                        {{ $pages->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.page_builder_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked');
                let newStatus = isChecked ? '1' : '0';

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.page-builder-status.update', ':id') }}'.replace(":id", id),

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
