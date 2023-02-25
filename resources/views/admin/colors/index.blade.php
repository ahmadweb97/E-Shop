@extends('layouts.admin')


@section('content')







<div class="row">
    <div class="col-md-12">

        @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
        @endif



        <div class="card">
        <div class="card-header">
            <h3>Colors List
                <a href="{{ url('admin/colors/create-color') }}" class="btn btn-success text-white btn-sm  float-end">Add Color</a>
            </h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                   @foreach ($colors as $col )


                    <tr>
                        <td>{{ $col->id }}</td>
                        <td>{{ $col->name }}</td>
                        <td>{{ $col->code }}</td>
                        <td>{{ $col->status ? 'Hidden':'Visible' }}</td>
                        <td>

                            <a href="{{ url('admin/colors/'.$col->id.'/edit') }}" class="btn btn-outline-info btn-sm" title="Edit">

                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/colors/'.$col->id.'/delete') }}" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this color?')">

                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        </div>
    </div>
</div>


  @endsection
