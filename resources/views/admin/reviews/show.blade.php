@extends('admin.layouts.master')

@section('contents')
    <style>
        .review-content {
            max-width: 100%;
            overflow-x: auto;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            background: #f9f9f9;
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
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Review Details</h1>
            <div class="ml-auto">
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Review #{{ $review?->id }}</h4>
                    </div>
                    <div class="card-body">

                        {{-- Reviewer --}}
                        <div class="mb-3">
                            <strong>Reviewer:</strong>
                            <span>
                                @if ($review?->candidate)
                                    {{ $review->candidate?->full_name }}
                                @elseif ($review?->company)
                                    {{ $review?->user?->name }}
                                @else
                                    Unknown
                                @endif
                            </span>
                        </div>

                        {{-- Rating --}}
                        <div class="mb-3">
                            <strong>Rating:</strong>
                            <span>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <span style="color: gold;">&#9733;</span>
                                    @else
                                        <span style="color: lightgray;">&#9733;</span>
                                    @endif
                                @endfor
                            </span>
                        </div>
                        <div class="form-group">
                            <strong>Review:</strong>

                            <div class="review-content">
                                {!! $review?->review !!}
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if ($review?->is_approved === 1)
                                <span
                                    style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(17, 233, 85, 0.15); color: #393838;">
                                    Approved
                                </span>
                            @elseif ($review?->is_approved === 0)
                                <span
                                    style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(212, 15, 22, 0.15); color: #393838;">
                                    Not Approved
                                </span>
                            @elseif (is_null($review?->is_approved))
                                <span
                                    style="display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background-color: rgba(255, 152, 0, 0.15); color: #ed8936;">
                                    Pending
                                </span>
                            @endif
                        </div>

                        {{-- Timestamps --}}
                        <div class="mb-3">
                            <strong>Created At:</strong> {{ relativeTime($review?->created_at) }}<br>
                            <strong>Last Updated:</strong> {{ relativeTime($review?->updated_at) }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
