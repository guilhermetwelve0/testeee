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
                    <h3 class="mb-0">Supplier</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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
                            <h3 class="card-title">Supplier List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    {{-- <a href="" class="btn btn-sm btn-primary">Add
                                        Member</a> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Telefone</th>
                                        <th>Supplier Address</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
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
                                </tr>
                                @empty
                                <tr>
                                <td colspan="100%">No Record Found</td>
                                </tr>
                                @endforelse
                                    
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