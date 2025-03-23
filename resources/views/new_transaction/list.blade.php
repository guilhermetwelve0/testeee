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
                    <h3 class="mb-0">User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                            <h3 class="card-title">User List</h3>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Wallets</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>{{$getRecord->id}}</td>
                                <td>{{$getRecord->name}}</td>
                                <td>{{$getRecord->email}}</td>
                                <td>{{$getRecord->wallets}}</td>
                                <td>{{date('d-m-Y H:i:s', strtotime($getRecord->created_at))}}</td>
                                <td>{{date('d-m-Y H:i:s', strtotime($getRecord->updated_at))}}</td>
                                <td>
                                <a href="{{url('user/new_transaction/add_wallets/'.$getRecord->id)}}" class="btn btn-sm btn-warning">Wallets</a>
                                <a href ="{{url('user/new_transaction_pdf_wallets/'.$getRecord->id)}}" class="btn btn-sm btn-primary">PDF</a>
                                </td>
                                </tr>
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