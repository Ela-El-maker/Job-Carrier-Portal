@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Hero Section</h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Hero</h4>
            </div>
            <div class="card-body ">
                <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <x-image-preview :height="200" :width="400" :source="$hero->image" name="image"
                                    label="Current Image" class="mb-3" />
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file {{ hasError($errors, 'image') }}"
                                    name="image">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <x-image-preview :height="200" :width="400" :source="$hero->background_image"
                                    name="background_image" label="Background Image" class="mb-3" />
                                <label for="background_image">Background Image</label>
                                <input type="file" class="form-control-file {{ hasError($errors, 'background_image') }}"
                                    name="background_image">
                                <x-input-error :messages="$errors->get('background_image')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                            value="{{ old('title', $hero->title) }}" name="title">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="sub_title">Sub Title</label>
                        <textarea class="form-control {{ hasError($errors, 'sub_title') }}" id="editor" name="sub_title">{{ old('sub_title', $hero->sub_title) }}</textarea>
                        <x-input-error :messages="$errors->get('sub_title')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="show_at_home">Show At Home</label>
                        <select name="show_at_home" class="form-control select2 {{ hasError($errors, 'show_at_home') }}"
                            id="show_at_home">
                            <option value="1" {{ old('show_at_home', $hero->show_at_home) == '1' ? 'selected' : '' }}>
                                Yes</option>
                            <option value="0" {{ old('show_at_home', $hero->show_at_home) == '0' ? 'selected' : '' }}>
                                No</option>
                        </select>
                        <x-input-error :messages="$errors->get('show_at_home')" class="mt-2" />
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
