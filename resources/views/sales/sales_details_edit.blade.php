@extends('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Detalhes da Venda</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Detalhes da Venda</li>
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
                            <div class="card-title">Editar Detalhes da Venda</div>
                        </div>
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                            <input type="hidden" name="sales_id" value="{{$getRecord->sales_id}}">
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nome do Produto</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="product_id" required>
                                            <option value="">Selecione o Produto</option>
                                            @foreach($getProduct as $value)
                                            <option {{($getRecord->product_id == $value->id) ? 'selected' : ''}} value="{{$value->id}}">
                                                {{$value->name_product}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Preço de Venda</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="selling_price" class="form-control" placeholder="Digite o Preço de Venda" value="{{$getRecord->selling_price}}" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quantidade</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="amount" class="form-control" placeholder="Digite a Quantidade" value="{{$getRecord->amount}}" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Desconto</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="discount" class="form-control" placeholder="Digite o Desconto" value="{{$getRecord->discount}}" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Subtotal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subtotal" class="form-control" placeholder="Digite o Subtotal" value="{{$getRecord->subtotal}}" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Atualizar</button>
                                <a href="{{url('admin/sales')}}" class="btn btn-danger float-end">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
