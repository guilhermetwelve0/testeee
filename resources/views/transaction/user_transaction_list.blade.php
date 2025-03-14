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
                                        <th>Amount</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </main>

        

@endsection