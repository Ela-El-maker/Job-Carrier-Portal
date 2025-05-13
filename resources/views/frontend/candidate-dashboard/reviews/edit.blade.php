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
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: #f7b500;
        }

        .rating label:hover,
        .rating label:hover~label {
            transform: scale(1.2);
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
                    <h2>Edit Client Reviews</h2>
                </div>
            </div>
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

    <!-- Main Content -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')

                <!-- Main Panel -->
                <div class="col-md-9 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()?->name }}!</h4>

                    <div class="job-post-wrapper mt20">
                        <div class="row candidate-profile">
                            <div class="col-md-12 col-xs-12">
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Edit a Review</h3>
                                        </div>

                                        <!-- Review Edit Form -->
                                        <form action="{{ route('client-reviews.update', $review->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Rating --}}
                                            <div class="form-group">
                                                <label for="rating">Rating</label>
                                                <div class="rating">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <input type="radio" id="star{{ $i }}" name="rating"
                                                            value="{{ $i }}"
                                                            {{ old('rating', $review->rating) == $i ? 'checked' : '' }}>
                                                        <label for="star{{ $i }}"
                                                            title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                                                    @endfor
                                                </div>
                                                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                                            </div>

                                            {{-- Review Text --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="review">Review</label>
                                                        <textarea class="form-control {{ hasError($errors, 'review') }}" id="editor" name="review">{{ old('review', $review->review) }}</textarea>
                                                        <x-input-error :messages="$errors->get('review')" class="mt-2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Review</button>
                                            </div>
                                        </form>

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
