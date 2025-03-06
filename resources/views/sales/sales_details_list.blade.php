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
                    <h3 class="mb-0">Sales Details List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin/purchase">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales Details List</li>
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
                        <h3 class="card-title">Search Sales Details</h3>
                    </div>
                    <form method="get">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_id">Product Name</label>
                                        <input type="text" name="product_id" value="{{ Request()->product_id }}" id="product_id" placeholder="Enter Product Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" name="selling_price" value="{{ Request()->selling_price }}" id="selling_price" placeholder="Enter Selling Price" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" value="{{ Request()->amount }}" id="amount" placeholder="Enter Amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="disount" value="{{ Request()->discount }}" id="disount" placeholder="Enter Discount" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="col-md-12" style="margin-top: 15px;">
                            <button class="btn btn-primary" type="submit">Search</button>
                            <a href="{{ url('admin/sales/sales_details_list/'.$sales_id) }}" class="btn btn-success">Reset</a>
                        
                            </div>
                                              
                        </div>
    
                    </form>
                </div>

                


                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Sales Details List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Selling Price</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
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
                                  <td>{{$value->selling_price}}</td>
                                  <td>{{$value->amount}}</td>
                                  <td>{{$value->discount}}</td>
                                  <td>{{$value->subtotal}}</td>
                                  <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                  <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                </tr>

                                @empty
                                <tr>
                                   <td colspan="100%">No Record Found...</td>
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