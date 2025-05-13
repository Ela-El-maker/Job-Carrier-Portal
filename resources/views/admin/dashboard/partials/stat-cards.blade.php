<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Users</h4>
                </div>
                <div class="card-body">
                    {{ $allUsers }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Earnings -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Earnings</h4>
                </div>
                <div class="card-body">
                    {{ config('settings.site_currency_icon') }} {{ $totalEarnings }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Candidates -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Candidates</h4>
                </div>
                <div class="card-body">
                    {{ $totalCandidates }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Visible Candidates -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Visible Candidates</h4>
                </div>
                <div class="card-body">
                    {{ $totalVisibleCandidates }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Companies -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
                <i class="fas fa-building"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Companies</h4>
                </div>
                <div class="card-body">
                    {{ $totalCompanies }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-building"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Visible Companies</h4>
                </div>
                <div class="card-body">
                    {{ $totalVisibleCompanies }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Orders</h4>
                </div>
                <div class="card-body">
                    {{ $totalOrders }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Jobs -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-dark">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jobs</h4>
                </div>
                <div class="card-body">
                    {{ $totalJobs }}
                </div>
            </div>
        </div>
    </div>

    <!-- Total Active Jobs -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Active Jobs</h4>
                </div>
                <div class="card-body">
                    {{ $totalActiveJobs }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pending Jobs</h4>
                </div>
                <div class="card-body">
                    {{ $totalPendingJobs }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
                <i class="fas fa-calendar-times"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Expired Jobs</h4>
                </div>
                <div class="card-body">
                    {{ $totalExpiredJobs }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Blog Posts</h4>
                </div>
                <div class="card-body">
                    {{ $totalBlogs }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h4>User Registrations & Earnings (Monthly)</h4>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h4>System Overview</h4>
            </div>
            <div class="card-body">
                <canvas id="systemOverviewChart" height="150"></canvas>
            </div>
        </div>
    </div>
</div>
