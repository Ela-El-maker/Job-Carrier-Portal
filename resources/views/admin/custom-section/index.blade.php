@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Custom Setting Section</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Update Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.custom-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control {{ hasError($errors, 'title') }}"
                            name="title"
                            value="{{ old('title', $section?->title) }}">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="sub_title">Sub Title</label>
                        <textarea
                            class="form-control {{ hasError($errors, 'sub_title') }}"
                            id="editor"
                            name="sub_title">{{ old('sub_title', $section?->sub_title) }}</textarea>
                        <x-input-error :messages="$errors->get('sub_title')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="button_label">Button Label</label>
                        <input type="text"
                               class="form-control {{ hasError($errors, 'button_label') }}"
                               name="button_label"
                               value="{{ old('button_label', $section?->button_label) }}"
                               placeholder="Learn More">
                        <x-input-error :messages="$errors->get('button_label')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="button">Button URL</label>
                        <input type="url"
                               class="form-control {{ hasError($errors, 'button') }}"
                               name="button"
                               value="{{ old('button', $section?->button) }}"
                               placeholder="https://example.com">
                        <x-input-error :messages="$errors->get('button')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="media_type">Media Type</label>
                        <select class="form-control select2 {{ hasError($errors, 'media_type') }}" name="media_type" required>
                            <option value="image" {{ old('media_type', $section?->media_type) == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('media_type', $section?->media_type) == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                        <x-input-error :messages="$errors->get('media_type')" class="mt-2" />
                    </div>

                    @if($section?->media_path)
                        <div class="form-group mb-3">
                            <label>Current Media Preview:</label>
                            @if($section?->media_type === 'image')
                                <div>
                                    <img src="{{ asset($section->media_path) }}" alt="Image Preview" class="img-fluid rounded shadow" style="max-height: 200px;">
                                </div>
                            @elseif($section?->media_type === 'video')
                                <div>
                                    <video controls class="rounded shadow" style="max-height: 200px;">
                                        <source src="{{ asset($section->media_path) }}" type="video/mp4">
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
@endsection
