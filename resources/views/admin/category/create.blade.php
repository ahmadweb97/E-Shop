@extends('layouts.admin')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3>Add Category
                <a href="{{ url('admin/category') }}" class="btn btn-warning btn-sm  float-end">Back</a>
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
            <div class="col col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
                @error('slug')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col col-md-12 mb-3">
                <label for="">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col col-md-6 mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="col col-md-6 mb-3">
                <label for="">Status</label> <br>
                <input type="checkbox" name="status">
            </div>

            <div class="col-md-12">
                <h4>SEO Tags</h4>
            </div>
            <div class="col col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
                @error('meta_title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col col-md-12 mb-3">
                <label for="">Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                @error('meta_keyword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
                @error('meta_description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col col-md-12 mb-3">
                <button type="submit" class="btn btn-primary text-white float-end">Save</button>
            </div>

        </div>
    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
