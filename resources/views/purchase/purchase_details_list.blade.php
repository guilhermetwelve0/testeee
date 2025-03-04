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
                    <h3 class="mb-0">Purchase Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin/purchase">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase Details</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Purchase Details</h3>
                        </div>
                        <form method="get">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplier_id">Product Name</label>
                                            <input type="text" value="{{Request()->product_id}}" name="product_id" id="product_id"
                                                placeholder="Enter Product Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_item">Purchase Price</label>
                                            <input type="number" value="{{Request()->purchase_price}}" name="purchase_price" id="purchase_price"
                                                placeholder="Enter Purchase Price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text">Amount</label>
                                            <input type="number" value="{{Request()->amount}}" name="amount" id="amount" placeholder="Enter Amount"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text">Sub Total</label>
                                            <input type="number" value="{{Request()->subtotal}}" name="subtotal" id="subtotal"
                                                placeholder="Enter Sub Total" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                            <input type="date" value="{{Request()->created_at}}" name="created_at" id="created_at" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="updated_at">Updated At</label>
                                            <input type="date" value="{{Request()->updated_at}}" name="updated_at" id="updated_at" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{url('admin/purchase/purchase_details/'.$purchase_id)}}" class="btn btn-success">Reset</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>


                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Purchase Details List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    <a href="{{ url('admin/purchase/purchase_details_add/'.$purchase_id) }}" class="btn btn-sm btn-primary">
                                        Add Purchase Details</a>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Purchase Price</th>
                                        <th>Amount</th>
                                        <th>Sub Total</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                               @forelse($getRecord as $value)
                                <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name_product}}</td>
                                <td>{{$value->purchase_price}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->subtotal}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->updated_at))}}</td>
                                <td>
                                <a href="{{ url('admin/purchase/purchase_details_edit/' . $value->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ url('admin/purchase/purchase_details_delete/' . $value->id) }}"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                </td>

                                </tr>
                                @empty
                                <tr>
                                <td colspan="100%">No Recound Found</td>
                                </tr>
                                @endforelse

                                    
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>

                        </div>




                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection