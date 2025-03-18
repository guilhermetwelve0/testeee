@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">My Account</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update My Account</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                @include('_message')
                    <div class="card card-warning card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Update My Account</div>
                        </div>
                        <form method="post" action="{{url('user/my_account_update')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Name
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="{{$getRecord->name}}" required>
                                    <span style="color: red;">{{$errors->first('name')}}</span></div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Email ID
                                    </label>
                                    <div class="col-sm-10"><input type="email" class="form-control" name="email"
                                    placeholder="Enter Email" value="{{$getRecord->email}}" required>
                                     <span style="color: red;">{{$errors->first('email')}}</span></div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Profile Image
                                    </label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="profile_image">
                                    @if(!empty($getRecord->profile_image))
                                    @if(file_exists('upload/'.$getRecord->profile_image))
                                    <img src="{{url('upload/'.$getRecord->profile_image)}}"
                                    style="height: 100px; width: 100px;">
                                    @endif

                                    @endif
                                    </div>
                                </div>
                                

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection