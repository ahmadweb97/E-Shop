
<div>

<!-- Modal for Delete -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="destroyProduct">

        <div class="modal-body">
          <h6>Are you sure you want to delete this product with all it's images ?</h6>
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

        @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
        @endif



        <div class="card">
        <div class="card-header">
            <h3>Products
                <a href="{{ url('admin/products/create-product') }}" class="btn btn-success text-white btn-sm  float-end">Add Product</a>
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($products as $pro )

                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>

                            @if ($pro->category)
                            {{ $pro->category->name }}

                            @else
                            No Category found!
                            @endif
                        </td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->selling_price }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <td>{{ $pro->status == '1' ? 'Hidden':'Visible' }}</td>
                        <td>
                            <a href="{{ url('admin/products/'.$pro->id.'/edit') }}" class="btn btn-outline-info btn-sm" title="Edit">
                                <i class="fa fa-edit  "></i>
                            </a>
                            <a href="" wire:click="deleteProduct({{ $pro->id }})" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>

                    </tr>
                    @empty

                    <tr>
                        <td colspan="7">No Products Available!</td>
                    </tr>

                    @endforelse


                </tbody>

            </table>

            <div>

                {{ $products->links() }}
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



