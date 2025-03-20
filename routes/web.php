<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, DashboardController, CategoryController, ProductController, 
    MyAccountController, MemberController, SupplierController, UsersController, 
    ExpenseController, NewTransactionController, TransactionController, 
    PurchaseController, SalesController
};

// Token CSRF
Route::get('/refresh-csrf', function () {
    return response()->json(['token' => csrf_token()]);
})->name('csrf.refresh');

// Rotas públicas
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post']);

// Rotas protegidas para admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Categorias
    Route::prefix('admin/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('data', [CategoryController::class, 'getCategories'])->name('category.data');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    });

    // Produtos
    Route::prefix('admin/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('fetch', [ProductController::class, 'fetchProducts'])->name('product.fetch');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    });

    // Membros
    Route::prefix('admin/member')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('member.index');
        Route::get('add', [MemberController::class, 'add'])->name('member.add');
        Route::post('add', [MemberController::class, 'store'])->name('member.store');
        Route::get('edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
        Route::post('edit/{id}', [MemberController::class, 'update'])->name('member.update');
        Route::get('delete/{id}', [MemberController::class, 'delete'])->name('member.delete');
        Route::get('pdf', [MemberController::class, 'member_pdf'])->name('member.pdf');
        Route::get('member_pdf_row/{id}', [MemberController::class, 'member_pdf_row'])->name('member.pdf_row'); // Ajuste aqui
    });

    // Fornecedores
    Route::prefix('admin/supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
        Route::get('add', [SupplierController::class, 'add'])->name('supplier.add');
        Route::post('add', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('edit/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    });

    // Despesas
    Route::prefix('admin/expense')->group(function () {
        Route::get('/', [ExpenseController::class, 'list'])->name('expense.list');
        Route::get('add', [ExpenseController::class, 'add'])->name('expense.add');
        Route::post('add', [ExpenseController::class, 'store'])->name('expense.store');
        Route::get('edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
        Route::post('edit/{id}', [ExpenseController::class, 'update'])->name('expense.update');
        Route::get('delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
    });

    // Compras e Vendas
    Route::prefix('admin/purchase')->group(function () {
        Route::get('/', [PurchaseController::class, 'purchase'])->name('purchase.index');
        Route::get('add', [PurchaseController::class, 'purchase_add'])->name('purchase.add');
        Route::post('add', [PurchaseController::class, 'purchase_store'])->name('purchase.store');
        Route::get('edit/{id}', [PurchaseController::class, 'purchase_edit'])->name('purchase.edit');
        Route::post('edit/{id}', [PurchaseController::class, 'purchase_update'])->name('purchase.update');
        Route::get('delete/{id}', [PurchaseController::class, 'purchase_delete'])->name('purchase.delete');
    });

    Route::prefix('admin/sales')->group(function () {
        Route::get('/', [SalesController::class, 'sales_index'])->name('sales.index');
        Route::get('add', [SalesController::class, 'sales_add'])->name('sales.add');
        Route::post('add', [SalesController::class, 'sales_post'])->name('sales.store');
        Route::get('edit/{id}', [SalesController::class, 'sales_edit'])->name('sales.edit');
        Route::post('edit/{id}', [SalesController::class, 'sales_edit_update'])->name('sales.update');
        Route::get('delete/{id}', [SalesController::class, 'sales_delete'])->name('sales.delete');
        Route::get('all_delete', [SalesController::class, 'all_delete'])->name('sales.all_delete');
    });

    // Usuários
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UsersController::class, 'users_list'])->name('users.index');
        Route::get('delete/{id}', [UsersController::class, 'users_delete'])->name('users.delete');
    });

    // Conta do Administrador
    Route::prefix('admin/my_account')->group(function () {
        Route::get('/', [MyAccountController::class, 'admin_my_account'])->name('admin.my_account');
        Route::post('update', [MyAccountController::class, 'admin_my_account_update'])->name('admin.my_account.update');
    });
});

// Rotas protegidas para usuários comuns
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('user/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');

    // Transações
    Route::prefix('user/new_transaction')->group(function () {
        Route::get('/', [NewTransactionController::class, 'new_transaction'])->name('transaction.new');
        Route::get('add_wallets/{id}', [NewTransactionController::class, 'add_wallets'])->name('transaction.add_wallets');
        Route::post('add_wallets/{id}', [NewTransactionController::class, 'add_wallets_update'])->name('transaction.add_wallets_update');
    });

    // Conta do Usuário
    Route::prefix('user/my_account')->group(function () {
        Route::get('/', [MyAccountController::class, 'my_account'])->name('user.my_account');
        Route::post('update', [MyAccountController::class, 'my_account_update'])->name('user.my_account.update');
    });
});

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
