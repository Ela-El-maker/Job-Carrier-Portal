<div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
    <form action="{{ route('candidate.profile.basic-info.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">

            <div class="row align-items-start">
                <div class="row">

                    <div class="col-md-3">
                        <!-- Profile Picture Upload Section -->
                        <label>Profile Picture *</label>
                        <x-image-preview :height="200" :width="200" :source="$candidate?->image" />
                        <div class="form-group">
                            <div class="upload-file-btn">
                                <span><i class="fa fa-upload"></i> Upload</span>
                                <input type="file" class="{{ $errors->has('profile_picture') ? 'is-invalid' : '' }}"
                                    name="profile_picture">
                                <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                            </div>
                        </div>

                        <!-- CV Upload Section -->
                        <label>CV <span class="text-primary">(
                                {{ $candidate?->cv ? 'Have Attached CV.' : '' }} )</span> </label>
                        <div class="form-group">
                            <div class="upload-file-btn">
                                <span><i class="fa fa-upload"></i> Upload</span>
                                <input type="file" class="{{ $errors->has('cv') ? 'is-invalid' : '' }}"
                                    name="cv">
                                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
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
                                        type="text" name="full_name" value="{{ $candidate?->full_name }}">
                                    <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Title Input Section -->
                                <div class="form-group">
                                    <label>Title / Tagline *</label>
                                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        type="text" name="title" value="{{ $candidate?->title }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <!-- Form Group -->
                        <div class="form-group">
                            <label>Experience Level *</label>


                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('experience_level') ? 'is-invalid' : '' }}"
                                name="experience_level" value="">
                                <option value="">Select One</option>
                                @foreach ($experiences as $experience)
                                    <option @selected($experience->id === $candidate?->experience_id) value="{{ $experience->id }}">
                                        {{ $experience->name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label>Website</label>
                                    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                        type="text" name="website" value="{{ $candidate?->website }}">
                                    <x-input-error :messages="$errors->get('website')" class="mt-2" />

                                </div>

                            </div>

                            <div class="col-md-6">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label>Date of Birth *</label>
                                    <input
                                        class="form-control datepicker {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                                        type="text" name="date_of_birth" value="{{ $candidate?->birth_date }}">
                                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />

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
