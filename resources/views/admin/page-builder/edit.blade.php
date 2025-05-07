@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Edit Page Builder</h1>
    </div>

    <div class="section-body">
        <form action="{{ route('admin.page-builder.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Page</h4>
                </div>
                <div class="card-body">

                    {{-- Page Name --}}
                    <div class="form-group">
                        <label for="page_name">Page Name</label>
                        <input type="text" name="page_name" class="form-control @error('page_name') is-invalid @enderror" value="{{ old('page_name', $page->page_name) }}">
                        @error('page_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $page->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="form-group">
                        <label for="content">Page Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" rows="10">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                            <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Show --}}
                    <div class="form-group">
                        <label for="show">Show on Frontend?</label>
                        <select name="show" class="form-control select2 @error('show') is-invalid @enderror">
                            <option value="" {{ old('show', (string) $page->show) === '' ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ old('show', (string) $page->show) === '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('show', (string) $page->show) === '0' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('show')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Update Page</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
