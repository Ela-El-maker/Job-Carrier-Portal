@extends('frontend.portfolio.layouts.master')

@section('content')
    <div class="container py-5 d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
        <h1 class="display-4 text-danger mb-3">Portfolio Not Found</h1>
        <p class="lead text-muted mb-4">
            The portfolio for {{ $candidatePortfolio?->candidate->full_name ?? 'this candidate' }} is not available or has not been created yet.
        </p>
        <a href="{{ route('candidates.index') }}" class="btn btn-primary">
            ← Back to Candidate Listings
        </a>
    </div>
@endsection
