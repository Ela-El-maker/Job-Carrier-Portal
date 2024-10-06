<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <form action="{{ route('admin.paypal-settings.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Status</label>
                        <select name="paypal_status" class="form-control {{ hasError($errors, 'paypal_status') }}"
                            id="">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_status')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Account Mode</label>
                        <select name="paypal_account_mode"
                            class="form-control {{ hasError($errors, 'paypal_account_mode') }}" id="">
                            <option value="sandbox">Sandbox</option>
                            <option value="live">Live</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_account_mode')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Country Name</label>
                        <select name="paypal_country_name"
                            class="form-control select2 {{ hasError($errors, 'paypal_country_name') }}" id="">
                            <option value="">Select</option>
                            @foreach (config('countries') as $key => $country)
                                <option value="{{ $key }}">{{ $country }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('paypal_country_name')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Currency Name</label>
                        <select name="paypal_currency_name"
                            class="form-control select2 {{ hasError($errors, 'paypal_currency_name') }}" id="">
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option value="{{ $currency }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('paypal_currency_name')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Currency Rate</label>
                        <input type="text" name="paypal_currency_rate" id=""
                            class="form-control {{ hasError($errors, 'paypal_currency_rate') }}">
                        <x-input-error :messages="$errors->get('paypal_currency_rate')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Client ID</label>
                        <input type="text" name="paypal_client_id" id=""
                            class="form-control {{ hasError($errors, 'paypal_client_id') }}">
                        <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Secret Key</label>
                        <input type="text" name="paypal_client_secret" id=""
                            class="form-control {{ hasError($errors, 'paypal_client_secret') }}">
                        <x-input-error :messages="$errors->get('paypal_client_secret')" class="mt-2" />

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal App ID</label>
                        <input type="text" name="paypal_app_id" id=""
                            class="form-control {{ hasError($errors, 'paypal_app_id') }}">
                        <x-input-error :messages="$errors->get('paypal_app_id')" class="mt-2" />

                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
