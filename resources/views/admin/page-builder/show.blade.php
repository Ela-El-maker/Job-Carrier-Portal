@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>View Page</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.page-builder.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>{{ $page->page_name }}</h4>
                <div class="ml-auto">
                    <span class="badge badge-{{ $page->status === 'published' ? 'success' : 'warning' }}">
                        {{ ucfirst($page->status) }}
                    </span>
                    <span class="badge badge-{{ $page->show === 1 ? 'primary' : ($page->show === 0 ? 'secondary' : 'dark') }}">
                        {{ $page->show === 1 ? 'Visible' : ($page->show === 0 ? 'Hidden' : 'Pending') }}
                    </span>
                </div>
            </div>

            <div class="card-body">
                <p><strong>Slug:</strong> <code>/page/{{ $page->slug }}</code></p>
                <p><strong>Created At:</strong> {{ $page->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Last Updated:</strong> {{ $page->updated_at->format('d M Y, H:i') }}</p>

                <hr>
                <h5>Page Content:</h5>
                <div>{!! $page->content !!}</div>
            </div>

            <div class="card-footer text-right">
                <a href="{{ route('admin.page-builder.edit', $page->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
