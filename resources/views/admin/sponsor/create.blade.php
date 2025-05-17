@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Create Sponsor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.sponsors.index') }}">Sponsors</a></div>
                <div class="breadcrumb-item active">Create</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Sponsor</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Sponsor Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-row">


                                    <div class="form-group col-md-6">
                                        <label for="logo">Upload Logo</label>
                                        <input type="file" class="form-control-file {{ hasError($errors, 'logo') }}" name="logo">
                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url">Sponsor URL</label>
                                    <input type="url" name="url" id="url" class="form-control"
                                        placeholder="https://example.com" value="{{ old('url') }}">
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i> Save Sponsor</button>
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
