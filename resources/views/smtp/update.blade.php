@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">SMTP</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update SMTP</li>
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
                            <div class="card-title">Update SMTP</div>
                        </div>
                        <form method="post" action="{{url('admin/smtp/update')}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">App Name<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="app_name"
                                            placeholder="Enter App Name" value="{{$getRecord->app_name}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Mailer<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_mailer"
                                            placeholder="Enter Mail Mailer" value="{{$getRecord->mail_mailer}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Host<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_host"
                                            placeholder="Enter Mail Host" value="{{$getRecord->mail_host}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Port<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_port"
                                            placeholder="Enter Mail Port" value="{{$getRecord->mail_port}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Username<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_username"
                                            placeholder="Enter Mail Username" value="{{$getRecord->mail_username}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Password<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_password"
                                            placeholder="Enter Mail Password" value="{{$getRecord->mail_password}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail Encryption<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_encryption"
                                            placeholder="Enter Mail Encryption" value="{{$getRecord->mail_encryption}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Mail From Address<span style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="mail_from_address"
                                            placeholder="Enter Mail From Address" value="{{$getRecord->mail_from_address}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{url('admin/smtp')}}" class="btn btn-success float-end">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    $('#memberSelect').select2({
        placeholder: "Digite para buscar ou selecione",
        allowClear: true,
        width: '100%',
        

    });
});
</script>

@endsection 