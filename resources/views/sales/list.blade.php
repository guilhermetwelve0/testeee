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
                    <h3 class="mb-0">Sales</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Sales</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                            <h3 class="card-title">Purchase List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    <a href="{{ url('admin/sales/add') }}" class="btn btn-sm btn-primary">Add
                                        Sales</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Member Name</th>
                                        <th>Total Item</th>
                                        <th>Total Price</th>
                                        <th>Discount</th>
                                        <th>Accepted</th>
                                        <th>Username</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($getRecord as $value)
                                <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name_member}}</td>
                                <td>{{$value->total_item}}</td>
                                <td>{{$value->total_price}}</td>
                                <td>{{$value->discount}}</td>
                                <td>{{$value->accepted}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                <td>{{date('d-m-Y H:i A', strtotime($value->updated_at))}}</td>
                                <td>
                                <div class="d-flex">
                                <a href="{{ url('admin/sales/edit/' . $value->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ url('admin/sales/delete/' . $value->id) }}"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                 </div>
                                </td>
                                </tr>
                                @endforeach

                                    
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