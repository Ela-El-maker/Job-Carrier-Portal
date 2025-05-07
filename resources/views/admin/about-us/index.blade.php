@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Edit About Us</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update About Us Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about-us.update',1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control {{ hasError($errors, 'title') }}"
                                       value="{{ old('title', $about?->title) }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" id="editor"
                                          class="form-control {{ hasError($errors, 'description') }}">{{ old('description', $about?->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="media_type">Media Type</label>
                                <select class="form-control select2 {{ hasError($errors, 'media_type') }}" name="media_type" required>
                                    <option value="image" {{ old('media_type', $about?->media_type) == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ old('media_type', $about?->media_type) == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                                <x-input-error :messages="$errors->get('media_type')" class="mt-2" />
                            </div>

                            @if($about?->media_path)
                                <div class="form-group mb-3">
                                    <label>Current Media Preview:</label>
                                    @if($about?->media_type === 'image')
                                        <div>
                                            <img src="{{ asset($about->media_path) }}" alt="Image Preview" class="img-fluid rounded shadow" style="max-height: 200px;">
                                        </div>
                                    @elseif($about?->media_type === 'video')
                                        <div>
                                            <video controls class="rounded shadow" style="max-height: 200px;">
                                                <source src="{{ asset($about->media_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="form-group mb-4">
                                <label for="media_path">Upload Media</label>
                                <input type="file"
                                       class="form-control {{ hasError($errors, 'media_path') }}"
                                       name="media_path"
                                       accept="image/*,video/*">
                                <x-input-error :messages="$errors->get('media_path')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
