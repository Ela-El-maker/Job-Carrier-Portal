@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Sponsors</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Sponsors</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.sponsors.index') }}" method="GET">
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
                <a href="{{ route('admin.sponsors.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Create New
                </a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Toggle</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sponsors as $index => $sponsor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sponsor?->name }}</td>
                                    <td>
                                        @if ($sponsor->logo)
                                            <img src="{{ asset($sponsor?->logo) }}" width="80" height="100"
                                                alt="logo">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($sponsor->url)
                                            <a href="{{ $sponsor?->url }}" target="_blank">{{ $sponsor?->url }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($sponsor?->show === 1)
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(17, 233, 85, 0.15); color: #393838;">Approved</span>
                                        @elseif ($sponsor?->show === 0)
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(212, 15, 22, 0.15); color: #393838;">Not
                                                Approved</span>
                                        @elseif (is_null($sponsor?->show))
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <label class="custom-switch mt-0">
                                            <input type="checkbox" class="custom-switch-input sponsor_status"
                                                name="custom-switch-checkbox" data-id="{{ $sponsor?->id }}"
                                                @checked($sponsor?->show)>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.sponsors.edit', $sponsor?->id) }}"
                                            class="btn-small btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.sponsors.destroy', $sponsor?->id) }}"
                                            class="btn-small btn btn-danger delete-item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No sponsors found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($sponsors->hasPages())
                        {{ $sponsors->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.sponsor_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked');
                let newStatus = isChecked ? '1' : '0';

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.sponsor-status.update', ':id') }}'.replace(":id", id),

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
