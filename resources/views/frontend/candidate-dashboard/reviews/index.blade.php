@extends('frontend.layouts.master')

@section('contents')
    <!-- =============== Start of Page Header Section =============== -->
    <section class="page-header">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Client Reviews</h2>
                </div>
            </div>

            <!-- Breadcrumb -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== End of Page Header Section =============== -->

    <!-- =============== Main Content =============== -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3" style="margin-bottom: 20px;">
                    @include('frontend.candidate-dashboard.sidebar')
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div style="background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <!-- Header with title and search -->
                        <!-- Top bar with Create and Search -->
                        <div
                            style="padding: 15px 20px; border-bottom: 1px solid #eaedf2; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 15px;">

                            <!-- Heading -->
                            <div style="flex: 1; min-width: 200px;">
                                <h5 style="margin: 0; font-weight: 700; font-size: 18px; color: #333;">My Reviews</h5>
                            </div>

                            <!-- Search Form -->
                            <form action="" method="GET" style="flex: 1; max-width: 280px; display: flex;">
                                <input type="text" name="search" placeholder="Search Jobs"
                                    style="border: 1px solid #ced4da; border-right: none; padding: 8px 12px; border-radius: 4px 0 0 4px; width: 100%; outline: none;">
                                <button type="submit"
                                    style="background-color: #4361ee; color: white; border: none; padding: 8px 12px; border-radius: 0 4px 4px 0; cursor: pointer;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>

                            <!-- Create Review Button -->
                            <div style="flex-shrink: 0;">
                                <a href="{{ route('client-reviews.create') }}"
                                    style="background-color: #4361ee; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px;">
                                    + Create Review
                                </a>
                            </div>

                        </div>



                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 30%">Rating</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th style="width: 30%" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reviews as $review)
                                        <tr>
                                            <td>{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}
                                            </td>
                                            <td>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review?->rating)
                                                        <i class="fas fa-star" style="color: #f1c40f;"></i>
                                                        <!-- filled star -->
                                                    @else
                                                        <i class="far fa-star" style="color: #f1c40f;"></i>
                                                        <!-- outlined star -->
                                                    @endif
                                                @endfor
                                                <span class="ml-2 text-muted">({{ $review?->rating }}
                                                    Star{{ $review?->rating > 1 ? 's' : '' }})</span>
                                            </td>

                                            <td>{{ Str::limit(strip_tags($review?->review), 60, '...') }}</td>
                                            <td style="padding: 12px 15px; vertical-align: middle;">
                                                @if ($review?->is_approved === 1)
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(72, 187, 120, 0.15); color: #48bb78;">Approved</span>
                                                @elseif ($review?->is_approved === 0)
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(244, 67, 54, 0.15); color: #f56565;">Not Approved</span>
                                                @elseif (is_null($review?->is_approved))
                                                    <span
                                                        style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">Pending</span>
                                                @endif
                                            </td>
                                            @if ($review?->updated_at != $review?->created_at)
                                                <td>{{ relativeTime($review?->updated_at) }}</td>
                                            @else
                                                <td>{{ relativeTime($review?->created_at) }}</td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ route('client-reviews.show', $review?->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('client-reviews.edit', $review?->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <i class="fas fa-comments fa-2x text-muted mb-3"></i>
                                                <h5>No Reviews Found</h5>
                                                <p class="text-muted">You haven't written any reviews yet.</p>
                                                <a href="{{ route('client-reviews.create') }}"
                                                    class="btn btn-primary">Write a Review</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div style="padding: 15px; text-align: right;">
                            @if ($reviews->hasPages())
                                {{ $reviews->withQueryString()->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
