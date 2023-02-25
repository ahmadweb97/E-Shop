@extends('layouts.admin')


@section('content')







<div class="row">
    <div class="col-md-12">

        @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
        @endif



        <div class="card">
        <div class="card-header">
            <h3>Edit Color
                <a href="{{ url('admin/colors') }}" class="btn btn-warning btn-sm  float-end">Back</a>
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/colors/'.$col->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Color Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $col->name }}">

                </div>
                <div class="mb-3">
                    <label>Color Code</label>
                    <input type="text" name="code" class="form-control" value="{{ $col->code }}">

                </div>
                <div class="mb-3">
                    <label>Status</label> <br>
                    <input type="checkbox" name="status" {{ $col->status ? 'checked':'' }} /> Checked=Hidden, Un-Checked=Visible

                </div>

                <div class="mb-3">

                    <button type="submit" class="btn btn-primary text-white">Update</button>

                </div>

            </form>

        </div>
        </div>
    </div>
</div>


  @endsection
