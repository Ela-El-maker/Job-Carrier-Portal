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
            /* Bigger stars */
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
            /* Gold-like yellow */
        }

        .rating label:hover,
        .rating label:hover~label {
            transform: scale(1.2);
            /* Slight zoom on hover */
        }

        @media (max-width: 768px) {
            .rating {
                font-size: 2.2rem;
                /* Slightly smaller stars on mobile */
            }
        }
    </style>

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
                @include('frontend.company-dashboard.sidebar')

                <!-- Main Panel -->
                <div class="col-md-9 col-xs-12 job-post-main">
                    <h4>Welcome {{ auth()->user()?->name }}!</h4>

                    <div class="job-post-wrapper mt20">
                        <div class="row candidate-profile">
                            <!-- Start of Profile Description and Dashboard Cards -->
                            <div class="col-md-12 col-xs-12">
                                <!-- Card Container for Candidate Details -->
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Create a Review</h3>
                                        </div>

                                        <form action="{{ route('client-reviews.store') }}" method="POST">
                                            @csrf
                                            {{-- Rating --}}
                                            <div class="form-group">
                                                <label for="rating">Rating</label>
                                                <div class="rating">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <input type="radio" id="star{{ $i }}" name="rating"
                                                            value="{{ $i }}"
                                                            {{ old('rating') == $i ? 'checked' : '' }}>
                                                        <label for="star{{ $i }}"
                                                            title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                                                    @endfor
                                                </div>
                                                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="review">Review</label>
                                                        <textarea class="form-control {{ hasError($errors, 'review') }}" id="editor" name="review">
                                                            {{ old('review') }}
                                                        </textarea>
                                                        <x-input-error :messages="$errors->get('review')" class="mt-2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
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
