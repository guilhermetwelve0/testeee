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
                    <h3 class="mb-0">Member</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Member</li>
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
                            <h3 class="card-title">Search Member</h3>
                        </div>
                        <form mehod="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-1">
                                        <label>ID</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    @include('_message')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Member List</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    <a href="{{ url('admin/member/add') }}" class="btn btn-sm btn-primary">Add
                                        Member</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code Member</th>
                                        <th>Name Member</th>
                                        <th>Address</th>
                                        <th>Telefone</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->code_member}}</td>
                                        <td>{{$value->name_member}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->telefone}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>{{date('d-m-Y', strtotime($value->updated_at))}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url('admin/member/edit/' . $value->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('admin/member/delete/' . $value->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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