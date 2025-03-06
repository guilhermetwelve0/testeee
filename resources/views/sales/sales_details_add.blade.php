@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Sales Details</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sales Details</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-warning card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add Sales Details</div>
                        </div>
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                            <input type="hidden" name="" value="">
                                
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Product Name
                                    </label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="product_id" required>
                                        <option value="">Select Product</option>
                                        @foreach($getProduct as $value)
                                        <option value="{{$value->id}}">{{$value->name_product}}</option>
                                        @endforeach
                                        
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Selling Price</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="selling_price" class="form-control" placeholder="Enter Selling Price" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Amount</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Discount</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="discount" class="form-control" placeholder="Enter Discount" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Subtotal</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="subtotal" class="form-control" placeholder="Enter Subtotal" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <a href="{{url('admin/sales')}}" class="btn btn-danger float-end">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection