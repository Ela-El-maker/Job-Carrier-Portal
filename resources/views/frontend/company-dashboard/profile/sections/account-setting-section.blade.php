<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
    <form action="{{ route('company.profile.account-info') }}" method="post">
        @csrf
        <div class="row">
            <!-- Username and Email fields -->
            <div class="col-md-6">
                <!-- Form Group for Username -->
                <div class="form-group">
                    <label>Username *</label>
                    <input name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ auth()->user()->name }}" type="text">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group for Email -->
                <div class="form-group">
                    <label>Email Address *</label>
                    <input name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ auth()->user()->email }}" type="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
            </div>
            <!-- Save Button below Password fields -->
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-shadow">Save</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Divider -->
    <div class="col-md-12">
        <br>
        <hr>
    </div>

    <form action="{{ route('company.profile.password-update') }}" method="post">
        @csrf
        <div class="row">
            <!-- Password and Confirm Password on the same row -->
            <div class="col-md-6">
                <!-- Form Group for Password -->
                <div class="form-group">
                    <label>Password *</label>
                    <input name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        type="password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Group for Confirm Password -->
                <div class="form-group">
                    <label>Confirm Password *</label>
                    <input name="password_confirmation"
                        class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                        type="password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>
            </div>

            <!-- Save Button below Password fields -->
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-shadow">Save</button>
                </div>
            </div>

        </div>
    </form>
</div>
