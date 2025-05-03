@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Review Posts </h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Review Posts </h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.reviews.index') }}" method="GET">
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
                <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Create New</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Rating</th>
                            <th>Title</th>
                            <th style="width: 17%">Visible at Home</th>
                            <th>State</th>
                            <th style="width: 30%">Action</th>
                        </tr>
                        <tbody>
                            @forelse ($reviews as $review)
                                <tr>
                                    <td>
                                        {{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        @if ($review?->candidate)
                                            {{ $review->candidate?->full_name }}
                                        @elseif ($review?->company)
                                            {{ $review?->user?->name }}
                                        @else
                                            Unknown
                                        @endif
                                    </td>

                                    <td>
                                        @if ($review?->user?->role === 'candidate')
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(233, 17, 186, 0.15); color: #f01717;">Candidate</span>
                                        @elseif ($review?->user?->role === 'company')
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(22, 70, 214, 0.15); color: #f01717;">Company</span>
                                        @else
                                            Unknown
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Rating Stars -->
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= $review?->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </div>
                                    </td>

                                    <td>
                                        @if ($review?->candidate)
                                            {{ $review->candidate?->title }}
                                        @elseif ($review?->company)
                                            {{ $review?->company?->name }}
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td>
                                        @if ($review?->is_approved === 1)
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(17, 233, 85, 0.15); color: #393838;">Approved</span>
                                        @elseif ($review?->is_approved === 0)
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(212, 15, 22, 0.15); color: #393838;">Not
                                                Approved</span>
                                        @elseif (is_null($review?->is_approved))
                                            <span
                                                style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                        @endif
                                    </td>

                                    <td class="align-middle text-center">
                                        <label class="custom-switch mt-0">
                                            <input type="checkbox" class="custom-switch-input review_status"
                                                name="custom-switch-checkbox" data-id="{{ $review?->id }}"
                                                @checked($review?->is_approved)>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>



                                    <td class="align-middle text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.reviews.show', $review->id) }}"
                                                class="btn btn-sm btn-success btn-sm mr-1" style="padding: 4px 8px;"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.reviews.edit', $review?->id) }}"
                                                class="btn btn-primary btn-sm mr-1" style="padding: 4px 8px;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.reviews.destroy', $review?->id) }}"
                                                class="btn btn-danger btn-sm delete-item" style="padding: 4px 8px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="py-5">
                                            <i class="fas fa-image fa-4x text-light mb-3"></i>
                                            <p class="text-muted mb-0">No review posts found</p>
                                            <a href="{{ route('admin.reviews.create') }}"
                                                class="btn btn-sm btn-primary mt-3">
                                                Create First Review Post
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.review_status').on('change', function() {
                let id = $(this).data('id');
                let isChecked = $(this).is(':checked');
                let newStatus = isChecked ? '1' : '0';

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.review-status.update', ':id') }}'.replace(":id", id),

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
