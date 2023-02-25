@extends('layouts.app')

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
                                        <a href="{{ url('orders/'.$ordItem->id) }}" class="btn btn-primary" title="View">

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

