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
                    <h3 class="mb-0">Sales</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Sales</li>
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
                            <div class="card-title">Add Sales</div>
                        </div>
                        <form method="post" action="{{url('admin/sales/add')}}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Member Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" name="member_id" id="memberSelect" required>
                                                <option value="">Selecione um nome</option>
                                                @foreach($getMember as $value)
                                                    <option value="{{$value->id}}">{{$value->name_member}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Total Item
                                    </label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="total_item"
                                            placeholder="Enter Total Item" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Total Price
                                    </label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="total_price"
                                            placeholder="Enter Total Price" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Discount
                                    </label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="discount"
                                            placeholder="Enter Discount" required>
                                    </div>
                                </div>
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Accepted
                                    </label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="accepted" required>
                                    <option value="Yes">
                                    Yes
                                    </option>
                                    <option value="No">
                                    No
                                    </option>
                                   
                                    </select>
                                    </div>
                                </div>
                                    
                                <div class="row mb-3"><label class="col-sm-2 col-form-label">Username
                                    </label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="user_id" required>
                                    <option value="">
                                    Select Username
                                    </option>
                                   @foreach($getUser as $value)
                                      <option value="{{$value->id}}">
                                          {{$value->name}}
                                          </option>
                                          @endforeach
                                        </select>
                                        </div>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{url('admin/sales')}}" class="btn btn-danger float-end">Cancel</a>
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