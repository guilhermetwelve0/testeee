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
        <!-- Search Sales Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Sales</h3>
                    </div>
                    <form method="get">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" name="id" value="{{ Request()->id }}" id="id" placeholder="Enter ID" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="member_id">Member Name</label>
                                        <input type="text" name="member_id" value="{{ Request()->member_id }}" id="member_id" placeholder="Enter Member Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_item">Total Item</label>
                                        <input type="text" name="total_item" value="{{ Request()->total_item }}" id="total_item" placeholder="Enter Total Item" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">Username</label>
                                        <input type="text" name="user_id" value="{{ Request()->user_id }}" id="user_id" placeholder="Enter Username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accepted">Accepted</label>
                                        <select class="form-control" name="accepted" id="accepted">
                                            <option value="">Select Accepted</option>
                                            <option value="Yes" {{ Request()->accepted == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ Request()->accepted == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-12" style="margin-top: 15px;">
                            <button class="btn btn-primary" type="submit">Search</button>
                            <a href="{{ url('admin/sales') }}" class="btn btn-success">Reset</a>
                        
                            </div>
                                              
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Purchase List Section -->
<div class="app-content">
    <div class="container-fluid">
        @include('_message')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Purchase List</h3>
                        <div class="card-tools">
                            <a href="{{url('admin/sales/all_delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this option item?')">Truncate</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{ url('admin/sales/add') }}" class="btn btn-sm btn-primary">Add Sales</a>
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
                                @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name_member }}</td>
                                        <td>{{ $value->total_item }}</td>
                                        <td>{{ $value->total_price }}</td>
                                        <td>{{ $value->discount }}</td>
                                        <td>{{ $value->accepted }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url('admin/sales/edit/' . $value->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('admin/sales/delete/' . $value->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end" style="padding: 10px;">
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