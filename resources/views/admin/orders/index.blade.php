@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Orders</h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Orders</h4>
                <div class="card-header-form">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                value="{{ request('search') }}">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 42px" class="btn btn-primary"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create New</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Order & Transaction</th>
                            <th>Company</th>
                            <th>Plan</th>
                            <th>Payment Method</th>
                            <th>Paid Amount</th>
                            <th>Main Price</th>
                            <th>Payment Status</th>

                            <th>Transaction Date</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td># {{ $order?->order_id }}
                                        Transaction : {{ $order?->transaction_id }}
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <!-- Company Logo -->
                                            <img style="width: 30px; height: 30px; margin-right: 10px;"
                                                src="{{ asset($order?->company->logo) }}" alt="Company Logo">

                                            <!-- Company Info -->
                                            <div>
                                                <span style="font-size: 14px; font-weight: bold; color: #333;">
                                                    {{ $order?->company->name }}
                                                </span><br>
                                                <span style="font-size: 12px; color: #666;">
                                                    {{ $order?->company->email }}
                                                </span><br>
                                                <span style="font-size: 12px; color: #666;">
                                                    {{ $order?->company->phone }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $order?->package_name }}</td>
                                    <td>{{ $order?->payment_provider }}</td>

                                    <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}</td>
                                    <td>{{ $order?->default_amount }}</td>

                                    <td>
                                        <div class="badge badge-info">
                                            {{ $order?->payment_status }}
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size: 14px; font-weight: bold; color: #333;">
                                            {{ $order?->created_at->format('M d, Y') }}
                                        </span>
                                        <br>
                                        <span style="font-size: 12px; color: #666;">
                                            {{ $order?->created_at->format('h:i A') }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.orders.show', $order?->id) }}"
                                            class="btn-sm btn btn-primary"><i class="fas fa-eye"></i> View Info </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center"> No Results Found! </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($orders->hasPages())
                        {{ $orders->withQueryString()->links() }}
                    @endif
                </nav>

            </div>
        </div>
    </div>
@endsection
