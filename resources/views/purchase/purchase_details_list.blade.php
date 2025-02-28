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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                               
                                <tr>

                                    
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                               
                            </div>

                        </div>




                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection