
@extends('layouts.admin')

@section('title', 'Users List')

@section('content')



<div>

    <!-- Modal for Delete -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="destroyUser">

            <div class="modal-body">
              <h6>Are you sure you want to delete this user ?</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-danger text-white">



                Delete</button>
            </div>
        </form>

          </div>
        </div>
      </div>




    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif



            <div class="card">
            <div class="card-header">
                <h3>Ratings & Reviews
                    <a href="{{ url('admin/users/create-user') }}" class="btn btn-success text-white btn-sm  float-end">Add User</a>
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>User Email</th>
                            <th>Review</th>
                            <th>Rating</th>

                          {{--   <th>Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($ratings as $rating )

                        <tr>
                            <td>{{ $rating['id'] }}</td>
                            <td>{{ $rating['product']['id']}}</td>
                            <td>{{ $rating['user_id'] }}</td>
                            <td>{{ $rating['review'] }}</td>
                            <td>{{ $rating['rating'] }}</td>


                      {{--       <td>
                                <a href="{{ url('admin/users/'.$rating->id.'/edit') }}" class="btn btn-outline-info btn-sm" title="Edit">
                                    <i class="fa fa-edit  "></i>
                                </a>
                                <a href="" wire:click="deleteUser({{ $rating->id }})" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
 --}}
                        </tr>
                        @empty

                        <tr>
                            <td colspan="5">No Users Available!</td>
                        </tr>

                        @endforelse


                    </tbody>

                </table>

                <div>

                  {{--   {{ $ratings->links() }} --}}
                </div>

            </div>
            </div>
        </div>
    </div>
    </div>


    @push('script')


    <script>

        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });

    </script>

    @endpush


    @endsection
