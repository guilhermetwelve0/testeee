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
                    <h3 class="mb-0">Purchase</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Purchase</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase</li>
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
                            <h3 class="card-title">Search Purchase</h3>
                        </div>
                        <form method="get">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" value="{{Request()->id}}" id="id" placeholder="Enter ID"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier Name</label>
                                            <input type="text" value="{{Request()->supplier_id}}" name="supplier_id" id="supplier_id"
                                                placeholder="Enter Supplier Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_item">Total Item</label>
                                            <input type="text" value="{{Request()->total_item}}" name="total_item" id="total_item"
                                                placeholder="Enter Total Item" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text">Price</label>
                                            <input type="text" value="{{Request()->total_price}}" name="total_price" id="total_price" placeholder="Enter Total Price"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text">Discount</label>
                                            <input type="text" value="{{Request()->discount}}" name="discount" id="discount"
                                                placeholder="Enter Telefone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                            <input type="date" value="{{Request()->created_at}}" name="created_at" id="created_at" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                    <a href="{{url('admin/purchase')}}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>

                    
                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Purchase List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    <a href="{{ url('admin/purchase/add') }}" class="btn btn-sm btn-primary">Add
                                        Purchase</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier Name</th>
                                        <th>Total Item</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Net Discount</th>
                                        <th>Total Price</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $totalItem = 0;
                                $totalPR = 0;
                                $totalD = 0;
                                $totalNet = 0;
                                $totalP = 0;
                                @endphp
                                @forelse($getRecord as $value)
                                @php
                                $NetDiscount = $value->total_price * $value->discount / 100;
                                $TotalPrice = $value->total_price - $NetDiscount;
                                $totalItem = $totalItem + $value->total_item;
                                $totalPR = $totalPR + $value->total_price;
                                $totalD = $totalD + $value->discount;
                                $totalNet = $totalNet + $NetDiscount;
                                $totalP = $totalP + $TotalPrice;
                                @endphp
                                <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->supplier_name}}</td>
                                <td>{{number_format($value->total_item, 2)}}</td>
                                <td>{{number_format($value->total_price, 2)}}</td>
                                <td>{{number_format($value->discount, 2)}} %</td>
                                <td>{{number_format($NetDiscount, 2)}}</td>
                                <td>{{number_format($TotalPrice, 2)}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->updated_at))}}</td>
                               <td>
                                <div class="d-flex">
                                <a href="{{ url('admin/purchase/edit/' . $value->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ url('admin/purchase/delete/' . $value->id) }}"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                 </div>
                                </td>
                                </tr>
  
                                

                                @empty
                                 <tr>
                                <td colspan="100%">No Recound Found</td>
                                </tr>

                                @endforelse

                                <tr>
                                <th colspan="2">All Total</th>
                                <td>{{number_format($totalItem, 2)}}</td>
                                <td>{{number_format($totalPR, 2)}}</td>
                                <td>{{number_format($totalD, 2)}} %</td>
                                <td>{{number_format($totalNet, 2)}}</td>
                                <td>{{number_format($totalP, 2)}}</td>
                                <th colspan="3"></th>
                                </tr>
                                    
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