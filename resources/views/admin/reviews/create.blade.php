@extends('admin.layouts.master')
@section('contents')

<section class="section">
    <div class="section-header">
        <h1>Create Review</h1>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>New Review Entry</h4>
                </div>

                <div class="card-body">
                    <div class="alert alert-warning">
                        <strong>Note:</strong> Creating a review manually is not allowed from the admin panel. Reviews are generated automatically based on user submissions.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
