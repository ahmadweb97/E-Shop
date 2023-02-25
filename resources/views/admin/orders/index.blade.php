@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')

<div class="py-3 py-md-5">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">
                        My Orders
                    </h4>
                    <hr>

                    <form action="" method="GET">

                        <div class="row">
                        <div class="col-md-3">
                            <label>Filter by Date</label>

                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>Filter by Status</label>

                            <select name="status" class="form-select">
                                <option value="">Select All Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                                <option value="out-of-delivery" {{ Request::get('status') == 'out-of-delivery' ? 'selected':'' }} >Out of delivery</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                                <br>

                                <button type="submit" class="btn btn-primary text-white">Filter</button>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse ($orders as $ordItem )
                                <tr>
                                    <td>{{ $ordItem->id }}</td>
                                    <td>{{ $ordItem->tracking_no }}</td>
                                    <td>{{ $ordItem->fullname }}</td>
                                    <td>{{ $ordItem->payment_mode }}</td>
                                    <td>{{ $ordItem->created_at->format('d-m-y') }}</td>
                                    <td>{{ $ordItem->status_message }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders/'.$ordItem->id) }}" class="btn btn-outline-primary btn-sm" title="View">

                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">No orders available!</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>

                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


@endsection

