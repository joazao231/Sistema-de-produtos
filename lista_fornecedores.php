<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sistema de Produtos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_produto.html">Cadastro de Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_produtos.php">Lista de Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_fornecedor.html">Cadastro de Fornecedor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_fornecedores.php">Lista de Fornecedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cesta_compras.html">Cesta de Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<div class="container mt-5">
    <h2>Lista de Fornecedores</h2>
    <ul id="lista-fornecedores" class="list-group">
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    function carregarListaFornecedores() {
        $.ajax({
            url: 'buscar_fornecedores.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#lista-fornecedores').empty(); 
                $.each(data, function(index, fornecedor) {
                    var listItem = $('<li class="list-group-item"></li>').text(fornecedor.nome);
                    var removeButton = $('<button class="btn btn-danger btn-sm float-right">Remover</button>').attr('data-fornecedor-id', fornecedor.id);
                    listItem.append(removeButton); 
                    $('#lista-fornecedores').append(listItem); 
                });
            }
        });
    }

    carregarListaFornecedores();

    $(document).on('click', '#lista-fornecedores button', function() {
        var fornecedorId = $(this).attr('data-fornecedor-id');
        $.ajax({
            url: 'remover_fornecedor.php',
            type: 'POST',
            data: { fornecedor_id: fornecedorId },
            success: function(response) {
                alert(response);
                carregarListaFornecedores();
            },
            error: function(xhr, status, error) {
                alert('Erro ao remover fornecedor: ' + xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>
