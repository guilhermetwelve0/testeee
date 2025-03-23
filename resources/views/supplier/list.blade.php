@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Supplier</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Supplier</h3>
                        </div>
                        <form method="get">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" value="{{Request()->id}}" id="id" placeholder="Enter ID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="supplier_name">Supplier Name</label>
                                            <input type="text" value="{{Request()->supplier_name}}" name="supplier_name" id="supplier_name" placeholder="Enter Supplier Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="supplier_telephone">Supplier Telephone</label>
                                            <input type="text" value="{{Request()->supplier_telephone}}" name="supplier_telephone" id="supplier_telephone" placeholder="Enter Supplier Telephone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="supplier_address">Supplier Address</label>
                                            <input type="text" value="{{Request()->supplier_address}}" name="supplier_address" id="supplier_address" placeholder="Enter Supplier Address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                            <input type="date" value="{{Request()->created_at}}" name="created_at" id="created_at" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="updated_at">Updated At</label>
                                            <input type="date" value="{{Request()->updated_at}}" name="updated_at" id="updated_at" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 15px;">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{url('admin/supplier')}}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('_message')
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Supplier List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                <a href="{{url('admin/supplier/supplier_pdf')}}" class="btn btn-sm btn-success">Supplier PDF</a> &nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('admin/supplier/add') }}" class="btn btn-sm btn-primary">Add
                                    New Supplier</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Telephone</th>
                                        <th>Supplier Address</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($getRecord as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->supplier_name}}</td>
                                    <td>{{$value->supplier_telephone}}</td>
                                    <td>{{$value->supplier_address}}</td>
                                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                    <td>{{date('d-m-Y',strtotime($value->updated_at))}}</td>
                                   <td>
                                            <div class="d-flex">
                                                <a href="{{ url('admin/supplier/supplier_pdf_row/' . $value->id) }}"
                                                    class="btn btn-sm btn-success">PDF</a>
                                                <a href="{{ url('admin/supplier/edit/' . $value->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('admin/supplier/delete/' . $value->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                            </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Record Found</td>
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