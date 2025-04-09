<div class="tab-pane active" id="heroSection">
    <form action="{{ route('candidate.portfolio.hero.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">

            <div class="row align-items-start">
                <div class="row">

                    <div class="col-md-3">
                        <!-- Profile Picture Upload Section -->
                        <label>Background Image </label>
                        {{-- <x-image-preview :height="180" :width="180" :source="$candidate?->image" /> --}}
                        <div class="form-group" style="padding-top: 10px;">
                            <div class="upload-file-btn">
                                <span><i class="fa fa-upload"></i> Upload</span>
                                <input type="file" class="{{ $errors->has('background_image') ? 'is-invalid' : '' }}"
                                    name="background_image">
                                <x-input-error :messages="$errors->get('background_image')" class="mt-2" />
                            </div>
                        </div>

                        <!-- CV Upload Section -->
                        <label>Resume <span class="text-primary">()</span> </label>
                        <div class="form-group">
                            <div class="upload-file-btn">
                                <span><i class="fa fa-upload"></i> Upload</span>
                                <input type="file" class="{{ $errors->has('resume') ? 'is-invalid' : '' }}"
                                    name="resume">
                                <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Full Name Input Section -->
                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                        type="text" name="full_name" value="{{ $candidate?->full_name }}" readonly>
                                    <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Title Input Section -->
                                <div class="form-group">
                                    <label>Hero Title *</label>
                                    <input class="form-control {{ $errors->has('hero_title') ? 'is-invalid' : '' }}"
                                        type="text" name="hero_title" value="">
                                    <x-input-error :messages="$errors->get('hero_title')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Hero Sub Description *</label>
                                    <textarea class="form-control textarea-box" rows="8" name="sub_description" placeholder="..."></textarea>
                                    <x-input-error :messages="$errors->get('sub_description')" class="mt-2" />
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group pt30 nomargin" id="last">
            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
        </div>
    </form>
</div>
