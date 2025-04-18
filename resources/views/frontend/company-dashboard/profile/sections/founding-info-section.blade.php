<div class="tab-pane fade" id="founding" role="tabpanel" aria-labelledby="founding-tab">
    <form action="{{ route('company.profile.founding-info') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-md-4">

                <!-- Form Group -->
                <!-- Form Group -->
                <div class="form-group">
                    <label for="industry_type">Industry Type *</label>

                    <!-- Industry Type Dropdown with Error Handling -->
                    <select name="industry_type"
                        class="form-control form-icons selectpicker {{ $errors->has('industry_type') ? 'is-invalid' : '' }}"
                        data-live-search="true" data-size="5" data-container="body"
                        value="{{ $companyInfo?->industry_type }}" id="">
                        <option value="">Select</option>
                        @foreach ($industryTypes as $industryType)
                            <option value="{{ $industryType->id }}"
                                @selected($industryType->id === $companyInfo?->industry_type_id)>
                                {{ $industryType->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Error Message -->
                    <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                </div>

            </div>


            <div class="col-md-4">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Organization Type *</label>

                    <select name="organization_type"
                        class="form-control form-icons selectpicker {{ $errors->has('organization_type') ? 'is-invalid' : '' }}"
                        data-live-search="true" data-size="5"
                        data-container="body"
                        value="{{ $companyInfo?->organization_type }}"
                        id="">
                        <option value="">Select</option>
                        @foreach ($organizationTypes as $organizationType)
                            <option value="{{ $organizationType->id }}"
                                @selected($organizationType->id === $companyInfo?->organization_type_id)>
                                {{ $organizationType->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('organization_type')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-4">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Team Size *</label>

                    <select name="team_size"
                        class="form-control form-icons selectpicker {{ $errors->has('team_size') ? 'is-invalid' : '' }}"
                        data-live-search="true" data-size="5"
                        data-container="body"
                        value="{{ $companyInfo?->team_size }}">
                        <option value="">Select</option>
                        @foreach ($teamSizes as $teamSize)
                            <option @selected($teamSize->id === $companyInfo?->team_size_id)
                                value="{{ $teamSize->id }}">
                                {{ $teamSize->name }}</option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('team_size')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Establishment Date *</label>
                    <input
                        class="form-control datepicker {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                        value="{{ $companyInfo?->establishment_date }}"
                        name="establishment_date" type="text">
                    <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Website</label>
                    <input
                        class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                        value="{{ $companyInfo?->website }}" name="website"
                        type="text">
                    <x-input-error :messages="$errors->get('website')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Email Address *</label>
                    <input
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} "
                        value="{{ $companyInfo?->email }}" name="email"
                        type="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Contact Number *</label>
                    <input
                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        value="{{ $companyInfo?->phone }}" name="phone"
                        type="text">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-4">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Country</label>
                    <select name="country"
                        class="form-control selectpicker country {{ $errors->has('country') ? 'is-invalid' : '' }}"
                        data-live-search="true" data-size="5"
                        data-container="body"
                        value="{{ $companyInfo?->country }}">
                        <option value="">Select</option>
                        @foreach ($countries as $country)
                            <option @selected($country->id === $companyInfo?->country)
                                value="{{ $country->id }}">
                                {{ $country->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-4">
                <!-- Form Group -->
                <div class="form-group">
                    <label>State </label>
                    <select name="state"
                        class="form-control form-icons state {{ $errors->has('state') ? 'is-invalid' : '' }}"
                        data-live-search="true" data-size="5"
                        data-container="body" value="{{ $companyInfo?->state }}">
                        <option value="">Select</option>
                        @foreach ($states as $state)
                            <option @selected($state->id === $companyInfo?->state)
                                value="{{ $state->id }}">
                                {{ $state->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-4">
                <!-- Form Group -->
                <div class="form-group">
                    <label>City</label>
                    <select name="city"
                        class="form-control form-icons city {{ $errors->has('city') ? 'is-invalid' : '' }}"
                        value="{{ $companyInfo?->city }}" id="">
                        @foreach ($cities as $city)
                            <option @selected($city->id === $companyInfo?->city)
                                value="{{ $city->id }}">
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />

                </div>
            </div>

            <div class="col-md-12">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3">{{ old('address', $companyInfo?->address) }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
            </div>

            <div class="col-md-12">
                <!-- Form Group -->
                <div class="form-group">
                    <label>Map Link</label>
                    <textarea class="form-control {{ $errors->has('map_link') ? 'is-invalid' : '' }}" name="map_link" rows="3">{{ old('map_link', $companyInfo?->map_link) }}</textarea>
                    <x-input-error :messages="$errors->get('map_link')" class="mt-2" />
                </div>
            </div>


        </div>


        <div class="form-group pt30 nomargin" id="last">
            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
        </div>
    </form>
</div>
