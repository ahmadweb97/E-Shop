
<div>


<!-- Modal for Delete -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="destroyCategory">

        <div class="modal-body">
          <h6>Are you sure you want to delete this category ?</h6>
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


        @if(session('msg'))

            <div class="alert alert-success">
                <h5>
                {{ session('msg') }}
                </h5>
            </div>
        @endif
        <div class="card">
        <div class="card-header">
            <h3>Category
                <a href="{{ url('admin/category/create-category') }}" class="btn btn-success text-white btn-sm float-end">Add Category</a>
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @foreach ($categories as $cat )


                <tbody>
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->status == '1' ? 'Hidden':'Visible' }}</td>
                        <td>
                            <a href="{{ url('admin/category/'.$cat->id.'/edit') }}" class="btn btn-outline-info btn-sm" title="Edit">
                                <i class="fa fa-edit" ></i>
                                 </a>

                            <a href="" wire:click="deleteCategory({{ $cat->id }})" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>

            <div>

                {{ $categories->links() }}
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

