<div class="row">
    <!-- User Registration Trends -->
    <div class="col-lg-6 col-md-12 mb-4">
        {{-- <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>User Registration Trends</h4>

                        <select class="form-control form-control-sm w-auto" id="userTrendsTimeRange">
                            <option value="7">Last 7 Days</option>
                            <option value="30" selected>Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="365">Last Year</option>
                        </select>
                        <button class="btn btn-sm btn-outline-secondary export-chart" data-chart="userRegistrationChart">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                    <div class="card-body">
                        <canvas id="userRegistrationChart" height="250"></canvas>
                    </div>
                </div> --}}
        <div class="card">
            <div class="card-header">
                <h4>User Registration Trends</h4>
                <div class="spinner-border spinner-border-sm d-none" id="userRegistrationsSpinner"></div>
            </div>
            <div class="card-body">
                <canvas id="userRegistrationChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <!-- Earnings Overview -->
    {{-- <div class="col-lg-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Earnings Overview</h4>
                        <select class="form-control form-control-sm w-auto" id="earningsTimeRange">
                            <option value="monthly">Monthly</option>
                            <option value="weekly" selected>Weekly</option>
                            <option value="daily">Daily</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <canvas id="earningsChart" height="250"></canvas>
                    </div>
                </div>
            </div> --}}

    <!-- Job Status Distribution -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h4>Job Status Distribution</h4>
            </div>
            <div class="card-body">
                <canvas id="jobStatusChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <!-- Candidate vs Company Growth -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Candidate vs Company Growth</h4>
                <select class="form-control form-control-sm w-auto" id="growthTimeRange">
                    <option value="monthly">Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="yearly" selected>Yearly</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="growthComparisonChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>
