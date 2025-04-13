@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Registrar Transação</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registrar Transação</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card card-warning card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Registrar Nova Transação</div>
                        </div>
                        <form method="post" action="{{ route('admin.transaction.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Usuário</label>
                                    <div class="col-sm-10">
                                        <select name="user_id" class="form-control" required>
                                            <option value="">Selecione um usuário</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Produto</label>
                                    <div class="col-sm-10">
                                        <select name="product_id" class="form-control" required>
                                            <option value="">Selecione um produto</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name_product }} - R$ {{ number_format($product->selling_price, 2, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quantidade</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" class="form-control" placeholder="Digite a quantidade" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" placeholder="Digite a descrição" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Registrar</button>
                                <a href="{{url('admin/transaction')}}" class="btn btn-danger float-end">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection