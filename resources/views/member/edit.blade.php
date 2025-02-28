@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Member</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
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
                            <div class="card-title">Edit Member</div>
                        </div>
                        <form method="post"action="{{url('admin/member/edit/'.$getRecord->id)}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Name Member
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="name_member" 
                                    value="{{$getRecord->name_member}}" placeholder="Enter Name Member" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address" placeholder="Enter Address" required>{{$getRecord->address}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Telefone
                                    </label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="telefone"
                                            placeholder="Enter Telefone" required value="{{$getRecord->telefone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{url('admin/member')}}" class="btn btn-danger float-end">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection