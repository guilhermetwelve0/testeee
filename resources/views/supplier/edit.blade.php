@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Supplier</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-warning card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Edit Supplier</div>
                        </div>
                        <form method="post" action="{{url('admin/supplier/edit/'.$getRecord->id)}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Supplier Name
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="supplier_name"
                                    placeholder="Enter Supplier Name" value="{{$getRecord->supplier_name}}" required></div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Telefone
                                    </label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="supplier_telephone"
                                            placeholder="Enter Supplier Telefone" value="{{$getRecord->supplier_telephone}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 
                                    col-form-label">Supplier Address
                                    </label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" name="supplier_address"  placeholder="Enter Supplier Address" required>{{$getRecord->supplier_address}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{url('admin/supplier')}}" class="btn btn-danger float-end">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection