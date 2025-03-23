@extends ('layouts.app')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Transaction</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
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
                <div class="card">
                        <div class="card-header">
                        <div class="card-title">Add Transaction</div>

                        </div>
                        <form method="post" action="{{ route('transaction.list_add_store') }}">
                        {{csrf_field()}}
                        <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                            <input type="number" name="amount" class="form-control"
                            placeholder="Enter Amount" required value="{{old('amount')}}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Submit</button>
                    <a href="{{url('user/transaction_list')}}" class="btn btn-primary float-end">Back</a>
                    </div>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>


@endsection