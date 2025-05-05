@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Blog Post Details</h1>
            <div class="ml-auto">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>

        <div class="section-body">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>{{ $blog->title }}</h4>
                </div>

                <div class="card-body">

                    {{-- Image --}}
                    <div class="mb-4 text-center">
                        @if ($blog->image)
                            <img src="{{ asset($blog->image) }}" alt="Blog Image" class="img-fluid rounded"
                                style="max-height: 350px; object-fit: cover;">
                        @else
                            <p class="text-muted">No image available</p>
                        @endif
                    </div>

                    {{-- Title --}}
                    <div class="mb-3">
                        <h6 class="text-muted">Title</h6>
                        <p class="font-weight-bold">{{ $blog->title }}</p>
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <h6 class="text-muted">Description</h6>
                        <div class="border p-3 rounded bg-light">
                            {!! $blog->description !!}
                        </div>
                    </div>

                    {{-- Metadata Badges --}}
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <h6 class="text-muted">Status</h6>
                            <span class="badge {{ $blog->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $blog->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="col-md-4 mb-2">
                            <h6 class="text-muted">Is Popular</h6>
                            <span class="badge {{ $blog->show_at_popular ? 'badge-success' : 'badge-secondary' }}">
                                {{ $blog->show_at_popular ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        <div class="col-md-4 mb-2">
                            <h6 class="text-muted">Featured</h6>
                            <span class="badge {{ $blog->featured ? 'badge-info' : 'badge-light' }}">
                                {{ $blog->featured ? 'Yes' : 'No' }}
                            </span>
                        </div>
                    </div>

                    {{-- Timestamps --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Created At</h6>
                            <p>{{ $blog->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Last Updated</h6>
                            <p>{{ $blog->updated_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>
                    {{-- Author --}}
                    @if ($blog->author)
                        <div class="mb-3">
                            <h6 class="text-muted">Author</h6>
                            <p>
                                <strong>{{ $blog->author->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $blog->author->email }}</small>
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
