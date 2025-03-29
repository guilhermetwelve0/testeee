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
                    <h3 class="mb-0">Expense</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expense</li>
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
                            <h3 class="card-title">Search Expense</h3>
                        </div>
                        <form method="get">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" value="{{Request()->id}}" placeholder="Enter ID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">DESCRIPTION</label>
                                            <input type="text" value="{{Request()->description}}" name="description" id="description" placeholder="Enter Description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount" value="{{Request()->amount}}" placeholder="Enter Amount" id="amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                            <input type="date" name="created_at" value="{{Request()->created_at}}" id="created_at" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="updated_at">Updated At</label>
                                            <input type="date" name="updated_at" value="{{Request()->updated_at}}" id="updated_at" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{url('admin/expense')}}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>

                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Expense List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    <a href="{{ url('admin/expense/add') }}" class="btn btn-sm btn-primary">Add Expense</a>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0;
                                        @endphp
                                        @forelse($getRecord as $value)
                                            @php
                                                $totalAmount = $totalAmount + $value->amount;
                                            @endphp
                                            <tr>
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->description}}</td>
                                                <td>{{number_format($value->amount, 2)}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->updated_at))}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ url('admin/expense/edit/' . $value->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ url('admin/expense/delete/' . $value->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No Record Found</td>
                                            </tr>
                                        @endforelse
                                        @if(!empty($totalAmount))
                                            <tr>
                                                <th colspan="2">Total Amount</th>
                                                <td>{{number_format($totalAmount, 2)}}</td>
                                                <th colspan="3"></th>
                                            </tr>
                                        @endif
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
    </div>
</main>

@endsection
