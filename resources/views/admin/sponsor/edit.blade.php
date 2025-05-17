@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Edit Sponsor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.sponsors.index') }}">Sponsors</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sponsor</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Sponsor Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                           value="{{ old('name', $sponsor->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="logo">Current Logo</label><br>
                                        @if ($sponsor->logo)
                                            <img src="{{ asset($sponsor?->logo) }}" width="120" height="60" alt="Sponsor Logo">
                                        @else
                                            <p class="text-muted">No logo uploaded.</p>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="logo">Change Logo</label>
                                        <input type="file" class="form-control-file {{ hasError($errors, 'logo') }}" name="logo">
                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url">Sponsor URL</label>
                                    <input type="url" name="url" id="url" class="form-control"
                                           placeholder="https://example.com"
                                           value="{{ old('url', $sponsor->url) }}">
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Update Sponsor</button>
                                    <a href="{{ route('admin.sponsors.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
