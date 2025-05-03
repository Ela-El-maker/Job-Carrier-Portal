@extends('admin.layouts.master')

@section('contents')
    <style>
        .rating {
            direction: rtl;
            display: inline-flex;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 1.8rem;
            color: lightgray;
            cursor: pointer;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: gold;
        }
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Edit Review</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Review #{{ $review->id }}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Rating --}}
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <div class="rating">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="rating"
                                            value="{{ $i }}" {{ $review->rating == $i ? 'checked' : '' }}>
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
                                <label for="is_approved">Status</label>
                                <select class="form-control select2" name="is_approved">
                                    <option value="0" {{ $review->is_approved === 0 ? 'selected' : '' }}>Not Approved</option>
                                    <option value="1" {{ $review->is_approved === 1 ? 'selected' : '' }}>Approved</option>
                                </select>
                                <x-input-error :messages="$errors->get('is_approved')" class="mt-2" />
                            </div>


                            {{-- Submit --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Review</button>
                                <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
