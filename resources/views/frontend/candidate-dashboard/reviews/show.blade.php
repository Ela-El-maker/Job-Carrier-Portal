@extends('frontend.layouts.master')

@section('contents')
    <style>
        .rating {
            direction: rtl;
            display: inline-flex;
            gap: 0.4rem;
            justify-content: center;
            align-items: center;
            font-size: 2.8rem;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ccc;
            cursor: pointer;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: #f7b500;
        }

        .review-content img {
            max-width: 100%;
            max-height: 250px;
            height: auto;
            width: auto;
            border-radius: 6px;
            object-fit: contain;
            display: block;
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            .rating {
                font-size: 2.2rem;
            }
        }
    </style>

    <!-- Page Header Section -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>View Client Review</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('client-reviews.index') }}">Reviews</a></li>
                        <li class="active">View Review</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')

                <!-- Main Panel -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()?->name }}!</h4>

                    <div class="job-post-wrapper mt20">
                        <div class="row candidate-profile">
                            <div class="col-md-12 col-xs-12">
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Review Details</h3>
                                        </div>

                                        <div class="card-body">
                                            <!-- Rating Display -->
                                            <div class="form-group">
                                                <label>Rating</label>
                                                <div class="rating">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <input type="radio" id="star{{ $i }}" name="rating"
                                                            value="{{ $i }}"
                                                            {{ $review->rating == $i ? 'checked' : '' }} disabled>
                                                        <label for="star{{ $i }}">&#9733;</label>
                                                    @endfor
                                                </div>
                                            </div>

                                            <!-- Review Text Display -->
                                            <div class="form-group">
                                                <label for="review">Review</label>
                                                <div class="form-control review-content" style="min-height: 150px;">
                                                    {!! $review?->review !!}
                                                </div>
                                            </div>


                                            @if ($review->candidate)
                                                <div class="form-group">
                                                    <label>Reviewer Info</label>
                                                    <div
                                                        style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                                                        <!-- Left: Image and Name -->
                                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                                            @if ($review?->candidate->image)
                                                                <img src="{{ asset($review?->candidate?->image) }}"
                                                                    alt="Reviewer Image"
                                                                    style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                                                            @endif
                                                            <p style="margin: 0;">{{ $review?->candidate?->full_name }}</p>
                                                        </div>

                                                        <!-- Right: Review Date -->
                                                        <div style="font-size: 1.5rem; color: #777;">
                                                            @if ($review?->updated_at != $review?->created_at)
                                                                Updated {{ relativeTime($review?->updated_at) }}
                                                            @else
                                                                Posted {{ relativeTime($review?->created_at) }}
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <a href="{{ route('client-reviews.index') }}" class="btn btn-primary">
                                                    <i class="fa fa-arrow-left"></i> Back to Reviews
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
