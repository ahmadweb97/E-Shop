<div>


@include('livewire.admin.brand.modal_form')



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
                        <h4>
                            Brands List
                            <a href="#" class="btn btn-success text-white btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @forelse ($brands as $brand )

                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)

                                        {{ $brand->category->name }}

                                        @else
                                        <h6>No category!</h6>
                                        @endif

                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'hidden':'visible' }}</td>

                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})" class="btn btn-outline-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#updateBrandModal">
                                            <i class="fa fa-edit" ></i>
                                             </a>

                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                    </td>
                                </tr>

                                @empty

                                <tr>
                                    <td colspan="5">No brands found</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>

                        <div>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>

@push('script')


<script>

    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });

</script>

@endpush


