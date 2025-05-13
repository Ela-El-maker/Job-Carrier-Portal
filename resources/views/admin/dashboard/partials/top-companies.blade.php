<div class="card">
    <div class="card-header">
        <h4>Top Performing Companies</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Jobs Posted</th>
                    <th>Orders</th>
                    <th>Applicants</th>
                </tr>
                @foreach ($topCompanies as $company)
                    <tr>
                        <td>{{ ($topCompanies->currentPage() - 1) * $topCompanies->perPage() + $loop->iteration }}
                        </td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->jobs_count }}</td>
                        <td>{{ $company->orders_count }}</td>
                        <td>{{ $company->applications_count }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
