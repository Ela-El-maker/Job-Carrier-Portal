<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <br>

    <form action="{{ route('candidate.profile.basic-info.update') }}" method="post">
        @csrf
        <div class="col-md-12">
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Full Name Input Section -->
                        <div class="form-group">
                            <label>Gender *</label>
                            <select
                                class="form-control form-icons  selectpicker {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                name="gender" type="text" value="">
                                <option value="">Select One</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Marital Status *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                                name="marital_status" type="text" value="">
                                <option value="">Select One</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                        </div>

                    </div>

                    <div class="col-md-6">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Profession *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                name="profession" value="" data-live-search="true">
                                <option value="">Select One</option>
                                @foreach ($professions as $profession)
                                    <option @selected($profession->id === $candidate?->profession_id) value="{{ $profession->id }}">
                                        {{ $profession->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Your Availability *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                name="profession" value="">
                                <option value="">Select One</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>


                    <div class="col-md-12">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Skills You Have *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                name="profession[]" multiple data-live-search="true">
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>

                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>



                    <div class="col-md-12">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Languages you know *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                name="profession[]" multiple data-live-search="true">
                                <option value="">Select One</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>

                    </div>




                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Biography *</label>
                            <textarea name="" class=" {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" id="editor"></textarea>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />

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
