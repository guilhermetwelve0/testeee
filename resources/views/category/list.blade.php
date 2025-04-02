@extends('layouts.app')

@section('content')

<main class="app-main">
    <!--início::Cabeçalho do Conteúdo do App-->
    <div class="app-content-header">
        <!--início::Container-->
        <div class="container-fluid">
            <!--início::Linha-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Categoria</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categoria</li>
                    </ol>
                </div>
            </div>
            <!--fim::Linha-->
        </div>
        <!--fim::Container-->
    </div>

    <div class="app-content">
        <!--início::Container-->
        <div class="container-fluid">
            <!--início::Linha-->
            <div class="row">
                <div class="col-md-12">
                    <!--início::Card-->
                    <div class="card mb-4">
                        <!--início::Cabeçalho do Card-->
                        <div class="card-header">
                            <!--início::Título do Card-->
                            <h3 class="card-title">Lista de Categorias</h3>
                            <div class="">
                                <ul class="pagination pagination-sm float-end">
                                    <!-- Correção aqui -->
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addCategoryModal">Adicionar Categoria</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="category-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome da Categoria</th>
                                        <th>Criado Em</th>
                                        <th>Atualizado Em</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Modal início -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Adicionar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="categoryForm">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Nome da Categoria</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal fim -->

<div class="flashMessage alert alert-success" style="display: none;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    fetchCategories();

    function fetchCategories() {
        $.ajax({
            url: "{{ url('admin/category/data') }}",
            type: "GET",
            success: function(response) {
                let tableBody = '';
                $.each(response, function(index, category) {
                    let createdAt = dayjs(category.created_at)
                        .format('DD-MM-YYYY h:mm A');
                    let updatedAt = dayjs(category.updated_at)
                        .format('DD MMM,YYYY h:mm A');
                    tableBody += `
                  <tr>
                  <td>${index + 1}</td>
                  <td>${category.category_name}</td>
                  <td>${createdAt}</td>
                  <td>${updatedAt}</td>
                  <td>
                  <button class="btn btn-warning btn-sm edit-btn" data-id="${category.id}">Editar</button>
                  <button class="btn btn-danger btn-sm delete-btn" data-id="${category.id}">Excluir</button>
                  </td>
                  </tr>
                  `;
                });
                $('#category-table tbody').html(tableBody);
                $('.edit-btn').on('click', handleEdit);
                $('.delete-btn').on('click', handleDelete);
            },
            error: function(xhr) {
                console.log('Falha ao buscar categorias:', xhr
                    .responseText);
            }
        });
    }
    // Editar
    function handleEdit() {
    const id = $(this).data('id');
    $.ajax({
        url: `{{ url('admin/category/edit') }}/${id}`,
        type: 'GET',
        success: function(category) {
            $('#category_name').val(category.category_name); // use .val() em vez de .value()
            $('#addCategoryModal').modal('show');

            // Atualizar Registro
            $('#categoryForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    url: `{{ url('admin/category/update') }}/${id}`,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#addCategoryModal').modal('hide');
                        fetchCategories();
                    $('.flashMessage')
                    .text(response.message)
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();
                setTimeout(function() {
                    location.reload();
                }, 2000);
                    },
                    error: function(xhr) {
                        alert('Falha ao atualizar categoria');
                    }
                });
            });
        },
        error: function(xhr) {
            alert('Falha ao buscar detalhes da categoria.');
        }
    });
}
    //Excluir
function handleDelete() {
    const id = $(this).data('id'); // Obtém o ID do elemento clicado
    if (confirm('Tem certeza de que deseja excluir esta categoria?')) {
        $.ajax({
            url: `{{url('admin/category/delete')}}/${id}`,
            type: "DELETE",
            data: {
                _token: "{{csrf_token()}}" // Token CSRF necessário para segurança
            },
            success: function(response) {
                fetchCategories(); // Atualiza a lista de categorias
                $('.flashMessage')
                    .text(response.message) // Exibe a mensagem de sucesso
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();
                setTimeout(function() {
                    location.reload(); // Recarrega a página após 2 segundos
                }, 2000);
            },
            error: function(xhr) {
                alert('Falha ao excluir categoria.'); // Exibe alerta em caso de erro
            }
        });
    }
} // A chave aqui fecha a função handleDelete corretamente.


});
</script>

<script>
$(document).ready(function() {
    $('#categoryForm').submit(function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            url: "{{ url('admin/category/store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#addCategoryModal').modal('hide');
                $('#categoryForm')[0].reset();
                $('.flashMessage')
                    .text(response.message)
                    .fadeIn()
                    .delay(3000)
                    .fadeOut();
                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });
                alert(errorMessage);
            }
        });
    });
});
</script>

@endsection
