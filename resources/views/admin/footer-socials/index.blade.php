@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Social Icons</h1>
        </div>

        <div class="section-body"></div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Social Icons</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.social-icon.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                value="{{ request('search') }}">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 42px" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('admin.social-icon.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Create New
                </a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>URL</th>
                                <th style="width: 17%">Visible at Home</th>
                                <th>State</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($socialIcons as $index => $icon)
                                <tr>
                                    <td>{{ $socialIcons->firstItem() + $index }}</td>
                                    <td><i style="font-size: 30px;" class="{{ $icon->icon }}"></i></td>
                                    <td><a href="{{ $icon->url }}" target="_blank">{{ $icon->url }}</a></td>

                                    <!-- Show Column -->
                                    <td>
                                        @if ($icon->show)
                                            <span class="badge badge-primary">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <label class="custom-switch mt-0">
                                            <input type="checkbox" class="custom-switch-input social_icon_status"
                                                name="custom-switch-checkbox" data-id="{{ $icon?->id }}"
                                                @checked($icon?->show)>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.social-icon.edit', $icon->id) }}"
                                            class="btn-small btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.social-icon.destroy', $icon->id) }}"
                                            class="btn-small btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Results Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($socialIcons->hasPages())
                        {{ $socialIcons->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.social_icon_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked');
                let newStatus = isChecked ? '1' : '0';

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.social-icon-status.update', ':id') }}'.replace(":id", id),

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
