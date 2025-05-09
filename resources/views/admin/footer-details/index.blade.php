@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Footer Section</h1>
        </div>

        <div class="section-body"></div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Update Footer</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        {{-- Logo Preview + Input --}}
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="logo">Current Logo</label>
                                <x-image-preview :height="150" :width="300" :source="$footer?->logo" />
                            </div>
                            <div class="form-group">
                                <label for="logo">Upload Logo</label>
                                <input type="file" class="form-control-file {{ hasError($errors, 'logo') }}"
                                    name="logo">
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Background Footer Preview + Input --}}
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="background_footer">Current Background Footer</label>
                                <x-image-preview :height="150" :width="300" :source="$footer?->background_footer" />
                            </div>
                            <div class="form-group">
                                <label for="background_footer">Upload Background Footer</label>
                                <input type="file" class="form-control-file {{ hasError($errors, 'background_footer') }}"
                                    name="background_footer">
                                <x-input-error :messages="$errors->get('background_footer')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control {{ hasError($errors, 'email') }}"
                                    value="{{ old('email', $footer?->email) }}" name="email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control {{ hasError($errors, 'phone') }}"
                                    value="{{ old('phone', $footer?->phone) }}" name="phone">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control {{ hasError($errors, 'address') }}" name="address" rows="3">{{ old('address', $footer?->address) }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    {{-- Details --}}
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control {{ hasError($errors, 'details') }}" name="details" rows="5">{{ old('details', $footer?->details) }}</textarea>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    {{-- Copyright --}}
                    <div class="form-group">
                        <label for="copyright">Copyright</label>
                        <input type="text" class="form-control {{ hasError($errors, 'copyright') }}"
                            value="{{ old('copyright', $footer?->copyright) }}" name="copyright">
                        <x-input-error :messages="$errors->get('copyright')" class="mt-2" />
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
