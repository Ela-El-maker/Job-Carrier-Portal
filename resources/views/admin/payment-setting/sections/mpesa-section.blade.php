<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
    <!-- M-Pesa Settings (New) -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">M-Pesa Settings</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <!-- Status (Active/Inactive) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>M-Pesa Status</label>
                            <select name="mpesa_status" class="form-control select2">
                                <option @selected(config('gatewaySettings.mpesa_status') === 'active') value="active">Active</option>
                                <option @selected(config('gatewaySettings.mpesa_status') === 'inactive') value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Environment (Sandbox/Production) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Environment</label>
                            <select name="mpesa_env" class="form-control select2">
                                <option @selected(config('gatewaySettings.mpesa_env') === 'sandbox') value="sandbox">Sandbox</option>
                                <option @selected(config('gatewaySettings.mpesa_env') === 'production') value="production">Production</option>
                            </select>
                        </div>
                    </div>

                    <!-- Business Shortcode -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Shortcode</label>
                            <input type="text" name="mpesa_business_shortcode" class="form-control"
                                value="{{ config('gatewaySettings.mpesa_business_shortcode', '174379') }}">
                            <small class="text-muted">Sandbox: <code>174379</code> | Live: Your Paybill</small>
                        </div>
                    </div>

                    <!-- Passkey -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Passkey</label>
                            <input type="text" name="mpesa_passkey" class="form-control"
                                value="{{ config('gatewaySettings.mpesa_passkey', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919') }}">
                            <small class="text-muted">From Safaricom Portal</small>
                        </div>
                    </div>

                    <!-- Consumer Key -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Consumer Key</label>
                            <input type="text" name="mpesa_consumer_key" class="form-control"
                                value="{{ config('gatewaySettings.mpesa_consumer_key', 'your_test_consumer_key') }}">
                        </div>
                    </div>

                    <!-- Consumer Secret -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Consumer Secret</label>
                            <input type="text" name="mpesa_consumer_secret" class="form-control"
                                value="{{ config('gatewaySettings.mpesa_consumer_secret', 'your_test_consumer_secret') }}">
                        </div>
                    </div>

                    <!-- Callback URL (Read-only) -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Callback URL</label>
                            <input type="text"
                                   name="mpesa_callback_url"
                                   class="form-control {{ $errors->has('mpesa_callback_url') ? 'is-invalid' : '' }}"
                                   value="{{ config('gatewaySettings.mpesa_callback_url', url('/mpesa/callback')) }}">
                            <small class="text-muted">
                                @if(config('gatewaySettings.mpesa_env') === 'sandbox')
                                    For testing: Use your Ngrok HTTPS URL (e.g., https://abc123.ngrok.io/api/mpesa/callback)
                                @else
                                    Production: Must be a live HTTPS endpoint
                                @endif
                            </small>
                            <x-input-error :messages="$errors->get('mpesa_callback_url')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update M-Pesa Settings
                </button>
            </form>
        </div>
    </div>
</div>
