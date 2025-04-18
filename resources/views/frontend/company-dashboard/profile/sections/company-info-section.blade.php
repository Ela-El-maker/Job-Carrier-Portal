<div class="tab-pane fade in active" id="company" role="tabpanel" aria-labelledby="company-tab">
    <form action="{{ route('company.profile.company-info') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-image-preview :height="85" :width="200"
                :source="$companyInfo?->logo" />
            <!-- Use % for height and px for width -->
            {{-- @if ($companyInfo?->logo)
                <div>
                    <img style="height: 100%; width: 200px; object-fit: cover;"
                        src="{{ $companyInfo->logo }}" alt="">
                </div>
            @endif --}}
            <!-- Form Group -->
            <label>Logo *</label>

            <div class="form-group">

                <!-- Upload Button -->
                <div class="upload-file-btn">
                    <span><i class="fa fa-upload"></i> Upload</span>
                    <input type="file"
                        class="{{ $errors->has('logo') ? 'is-invalid' : '' }}"
                        name="logo">
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <x-image-preview :height="85" :width="400"
                :source="$companyInfo?->banner" />

            <!-- Form Group -->
            <label>Banner *</label>

            <div class="form-group">

                <!-- Upload Button -->
                <div class="upload-file-btn">
                    <span><i class="fa fa-upload"></i> Upload</span>
                    <input type="file"
                        class="{{ $errors->has('banner') ? 'is-invalid' : '' }}"
                        name="banner">
                    <x-input-error :messages="$errors->get('banner')" class="mt-2" />

                </div>
            </div>
        </div>
    </div>
    <!-- Form Group -->
    <div class="form-group">
        <label>Company Name *</label>
        <input
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            type="text" name="name" value="{{ $companyInfo?->name }}">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

    </div>
    <!-- Form Group -->
    <div class="form-group">
        <label>Company Bio *</label>
        <textarea name="bio" id="editor" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}">{{ $companyInfo?->bio }}</textarea>
        <x-input-error :messages="$errors->get('bio')" class="mt-2" />

    </div>
    <!-- Form Group -->
    <div class="form-group">
        <label>Company Vision *</label>
        <textarea name="vision"  class="tinymce form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}">{{ $companyInfo?->vision }}</textarea>
        <x-input-error :messages="$errors->get('vision')" class="mt-2" />

    </div>

    <div class="form-group pt30 nomargin" id="last">
        <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
    </div>
</form>
</div>
