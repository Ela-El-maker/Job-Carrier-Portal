<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">


    <br>
    <form action="{{ route('candidate.profile.account-info.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h4>Location</h4>
                <br>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <!-- Form Group -->
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country"
                                class="form-control selectpicker country {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                data-live-search="true" data-size="5" data-container="body"
                                value="{{ $candidate?->country }}">
                                <option value="">Select</option>
                                @foreach ($countries as $country)
                                    <option @selected($country->id === $candidate?->country) value="{{ $country->id }}">
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
                                data-live-search="true" data-size="5" data-container="body"
                                value="{{ $candidate?->state }}">
                                <option value="">Select</option>
                                @foreach ($states as $state)
                                    <option @selected($state->id === $candidate?->state) value="{{ $state->id }}">
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
                                value="{{ $candidate?->city }}" id="">
                                @foreach ($cities as $city)
                                    <option @selected($city->id === $candidate?->city) value="{{ $city->id }}">
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />

                        </div>
                    </div>


                    <div class="col-md-12">
                        <!-- Full Name Input Section -->
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                type="text" name="address" value="{{ $candidate?->address }}">
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-4">
            <div class="col-md-12">
                <br>
                <hr>
                <h4>Your Contact Info</h4>
                <br>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <!-- Full Name Input Section -->
                        <div class="form-group">
                            <label>Phone *</label>
                            <input class="form-control  {{ $errors->has('phone_one') ? 'is-invalid' : '' }}"
                                type="text" name="phone_one" value="{{ $candidate?->phone_one }}">
                            <x-input-error :messages="$errors->get('phone_one')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Full Name Input Section -->
                        <div class="form-group">
                            <label>Home Phone</label>
                            <input class="form-control  {{ $errors->has('phone_two') ? 'is-invalid' : '' }}"
                                type="text" name="phone_two" value="{{ $candidate?->phone_two }}">
                            <x-input-error :messages="$errors->get('phone_two')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- Full Name Input Section -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                name="email" value="{{ $candidate?->email }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group pt30 nomargin" id="last">
            <button class="btn btn-blue">Save All Changes</button>
        </div>
    </form>
    <br>
    <hr><br>
    <div class="mt-4">
        <form action="{{ route('candidate.profile.account-email.update') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h4>Change Account Email Address</h4>
                    <br>
                    <div class="row mt-3">

                        <div class="col-md-12">
                            <!-- Full Name Input Section -->
                            <div class="form-group">

                                <label>Email Address</label>
                                <input class="form-control {{ hasError($errors, 'account_email') }}"
                                    name="account_email" type="email" value="{{ auth()->user()->email }}">
                                <x-input-error :messages="$errors->get('account_email')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group pt30 nomargin" id="last">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
        <br>
        <hr><br>
        <div class="mt-4">
            <form action="{{ route('candidate.profile.account-password.update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h4>Change Account Password</h4>
                        <br>
                        <div class="row mt-3">

                            <div class="col-md-6">
                                <!-- Full Name Input Section -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" value="">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Full Name Input Section -->
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input
                                        class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                        type="password" name="password_confirmation" value="">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group pt30 nomargin" id="last">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>




    @push('scripts')
        <script>
            $(document).ready(function() {
                // Handle country change event to load states
                $('.country').on('change', function() {
                    let country_id = $(this).val();

                    // Clear state and city dropdowns before loading new data
                    $('.state').html('<option value="">Select</option>');
                    $('.city').html('<option value="">Select</option>');

                    if (country_id) {
                        $.ajax({
                            method: 'GET',
                            url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                            success: function(response) {
                                let html = '<option value="">Select</option>';
                                if (response.length > 0) {
                                    $.each(response, function(index, value) {
                                        html +=
                                            `<option value="${value.id}">${value.name}</option>`;
                                    });
                                } else {
                                    html = '<option value="">No states available</option>';
                                }
                                $('.state').html(html);
                            },
                            error: function(xhr, status, error) {
                                console.error("An error occurred while fetching states.");
                            }
                        });
                    }
                });

                // Handle state change event to load cities
                $('.state').on('change', function() {
                    let state_id = $(this).val();

                    // Clear city dropdown before loading new data
                    $('.city').html('<option value="">Select</option>');

                    if (state_id) {
                        $.ajax({
                            method: 'GET',
                            url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
                            success: function(response) {
                                let html = '<option value="">Select</option>';
                                if (response.length > 0) {
                                    $.each(response, function(index, value) {
                                        html +=
                                            `<option value="${value.id}">${value.name}</option>`;
                                    });
                                } else {
                                    html = '<option value="">No cities available</option>';
                                }
                                $('.city').html(html);
                            },
                            error: function(xhr, status, error) {
                                console.error("An error occurred while fetching cities.");
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
