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
                    <h3 class="mb-0">Transaction</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transaction</li>
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
                            <h3 class="card-title">Search Transaction</h3>
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
                                            <label for="name">Username</label>
                                            <input type="text" value="{{Request()->name}}" name="name" id="name" placeholder="Enter Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" value="{{Request()->amount}}" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                            <input type="date" value="{{Request()->created_at}}" name="created_at" id="created_at" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{url('admin/transaction')}}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <br>
                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Transaction List</h3>
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
                                        <th>Username</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($getRecord as $value)
                                <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                
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