@extends('layouts.app')

@section('content')

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card mb-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <h3 class="card-title">Product List</h3>
                            <div class="">
                                <ul class="pagination pagination-sm float-end">
                                    <!-- Correção aqui -->
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addProductModal">Add Product</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Adicione essa div -->
                                <table id="product-table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Product Code</th>
                                            <th>Name Product</th>
                                            <th>Brand</th>
                                            <th>Purchase Price</th>
                                            <th>Selling Price</th>
                                            <th>Discount</th>
                                            <th>Stock</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Modal start -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option value="">Select Category Name</option>
                            @foreach($category as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="text" class="form-control" id="product_code" name="product_code"
                            placeholder="product_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_product" class="form-label">Name Product</label>
                        <input type="text" class="form-control" id="name_product" name="name_product"
                            placeholder="name_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="purchase_price" class="form-label">Purchase Price</label>
                        <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                            placeholder="purchase_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="selling_price" class="form-label">Selling Price</label>
                        <input type="number" class="form-control" id="selling_price" name="selling_price"
                            placeholder="selling_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="discount"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="stock" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<div class="flashMessage alert alert-success" style="display: none;"></div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#productForm').on('submit', function(e) {
        e.preventDefault();
        $('.flashMessage').hide();
        const formData = $(this).serialize();

        $.ajax({
            url: "{{ route('product.store') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                $('.flashMessage')
                    .html(response.message)
                    .fadeIn()
                    .delay(2000)
                    .fadeOut();
                    setTimeout(function() {
                    location.reload();
                }, 2000);
                $('#productForm')[0].reset();
                $('#addProductModal').modal('hide');
                fetchProducts();
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (const key in errors) {
                    errorMessages += `<li>${errors[key]}</li>`;
                }
                $('.flashMessage')
                    .addClass('alert-danger')
                    .html(`<ul>${errorMessages}</ul>`)
                    .fadeIn();
            },
        });
    });
});

function fetchProducts() {
    $.ajax({
        url: "{{route('product.fetch')}}",
        method: "GET",
        success: function(response) {
            const tbody = $('#product-table tbody');
            tbody.empty();
            response.forEach((product, index) => {
                const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${product.category ? product.category.category_name : 'N/A'}</td>
                    <td>${product.product_code}</td>
                    <td>${product.name_product}</td>
                    <td>${product.brand}</td>
                    <td>${product.purchase_price}</td>
                    <td>${product.selling_price}</td>
                    <td>${product.discount}</td>
                    <td>${product.stock}</td>
                    <td>${dayjs(product.created_at).format('YYYY-MM-DD')}</td>
                    <td>${dayjs(product.updated_at).format('YYYY-MM-DD')}</td>
                    <td class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-warning edit-btn" data-id="${product.id}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="${product.id}">Delete</button>
                    </td>

                </tr>
                `;
                tbody.append(row);
                $('.edit-btn').on('click', handleEdit);
            });
        },
        error: function() {
            alert('Failed to fetch products.');
        },

    });
}
 
//edit product
function  handleEdit()
{
    const id = $(this).data('id');
    $.ajax({
        url: `{{url('admin/product/edit')}}/${id}`,
        method: "GET",
        success: function(response){
            $('#category_id').val(response.category_id);
            $('#product_code').val(response.product_code);
            $('#name_product').val(response.product_code);
            $('#brand').val(response.brand);
            $('#purchase_price').val(response.purchase_price);
            $('#selling_price').val(response.selling_price);
            $('#discount').val(response.discount);
            $('#stock').val(response.stock);
            $('#addProductModal').modal('show');
            $('#productForm').off('submit').on('submit', function(e){
                e.preventDefault();
                const formData = $(this).serialize();
                $.ajax({
                    url: `{{url('admin/product/update')}}/${id}`,
                    type: "POST",
                    data: formData,
                    success: function(response){
                        $('.flashMessage').html(response.message).fadeIn().delay(2000).fadeOut();
                        $('#productForm')[0].reset();
                        $('#addProductModal').modal('hide');
                        fetchProducts();
                    },
                    error: function(xhr){
                        alert('Failed to update category.');
                    }
                });
            });
        },
        error: function(){
            alert('Failed to fetch product data.');
        }

    });
}

$(document).on('click', '.delete-btn', function() {
    const id = $(this).data('id');
    if(confirm('Are you sure you want to delete this product?')) {
        $.ajax({
            url: `{{url('admin/product/delete')}}/${id}`,
            method: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.flashMessage').html(response.message).fadeIn().delay(2000).fadeOut();
                fetchProducts();
            },
            error: function() {
                alert('Failed to delete product.');
            }
        });
    }
});


$(document).ready(function() {
    fetchProducts();
});
</script>



@endsection