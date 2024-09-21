<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <br>

    <form action="{{ route('candidate.profile.profile-info.update') }}" method="post">
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
                                name="gender" type="text" value="{{ $candidate?->gender }}">
                                <option value="">Select One</option>
                                <option @selected($candidate?->gender === 'male') value="male">Male</option>
                                <option @selected($candidate?->gender === 'female') value="female">Female</option>
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
                                name="marital_status" type="text" value="{{ $candidate?->marital_status }}">
                                <option value="">Select One</option>
                                <option @selected($candidate?->marital_status === 'single') value="single">Single</option>
                                <option @selected($candidate?->marital_status === 'married') value="married">Married</option>
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
                                class="form-control form-icons selectpicker {{ $errors->has('availability') ? 'is-invalid' : '' }}"
                                name="availability" value="">
                                <option value="">Select One</option>
                                <option @selected($candidate?->status === 'available') value="available">Available</option>
                                <option @selected($candidate?->status === 'not_available') value="not_available">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                        </div>
                    </div>


                    <div class="col-md-12">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Skills You Have *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('skill_you_have') ? 'is-invalid' : '' }}"
                                name="skill_you_have[]" multiple data-live-search="true">
                                @foreach ($skills as $skill)
                                    @php
                                        $candidateSkills = $candidate?->skills->pluck('skill_id')->toArray() ?? [];
                                    @endphp

                                    <option @selected(in_array($skill->id, $candidateSkills)) value="{{ $skill->id }}">
                                        {{ $skill->name }}</option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('skill_you_have')" class="mt-2" />
                        </div>
                    </div>



                    <div class="col-md-12">
                        <!-- Title Input Section -->
                        <div class="form-group">
                            <label>Languages you know *</label>
                            <select
                                class="form-control form-icons selectpicker {{ $errors->has('language_you_know') ? 'is-invalid' : '' }}"
                                name="language_you_know[]" multiple data-live-search="true">
                                <option value="">Select One</option>
                                @foreach ($languages as $language)

                                    @php

                                        $candidateLanguages = $candidate?->languages->pluck('language_id')->toArray() ?? [];

                                    @endphp

                                    <option @selected(in_array($language->id, $candidateLanguages)) value="{{ $language->id }}">
                                        {{ $language->name }}</option>

                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('language_you_know')" class="mt-2" />
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Biography *</label>
                            <textarea name="biography" class=" {{ $errors->has('biography') ? 'is-invalid' : '' }}" id="editor">{!! $candidate?->bio !!}</textarea>
                            <x-input-error :messages="$errors->get('biography')" class="mt-2" />

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
