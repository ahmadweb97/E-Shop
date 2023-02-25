@extends('layouts.admin')


@section('content')



<div class="row">
    <div class="col-md-12">

        @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
        @endif



        <div class="card">
        <div class="card-header">
            <h3>Slider List
                <a href="{{ url('admin/sliders/create-slider') }}" class="btn btn-success text-white btn-sm  float-end">Add Slider</a>
            </h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($sliders as $slider )
                    <tr>

                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>
                            <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px " alt="" >
                        </td>
                        <td>{{ $slider->status == '0' ? 'Visible':'Hidden'}}</td>
                        <td>
                            <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-outline-info btn-sm" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this slider ?')">
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
