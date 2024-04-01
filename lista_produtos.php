<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
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
        <h2>Produtos Disponíveis</h2>
        <form id="form-adicionar-cesta">
            <ul id="lista-produtos" class="list-group">
            </ul>
            <button type="submit" class="btn btn-primary" id="btn-adicionar-cesta" disabled>Adicionar à Cesta</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function carregarListaProdutos() {
                $.ajax({
                    url: 'buscar_produtos.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#lista-produtos').empty();
                        $.each(data, function(index, produto) {
                            var listItem = $('<li class="list-group-item"></li>');
                            var checkbox = $('<input type="checkbox" class="mr-2 produto-checkbox">').attr('name', 'produtos[]').val(produto.id);
                            var textoProduto = $('<span></span>').text(produto.nome + ' - R$ ' + produto.preco);
                            listItem.append(checkbox).append(textoProduto);
                            $('#lista-produtos').append(listItem);
                        });
                    }
                });
            }

            carregarListaProdutos();

            $(document).on('change', '.produto-checkbox', function() {
                var peloMenosUmSelecionado = $('.produto-checkbox:checked').length > 0;
                $('#btn-adicionar-cesta').prop('disabled', !peloMenosUmSelecionado);
            });

            $('#form-adicionar-cesta').submit(function(event) {
                event.preventDefault();

                var produtosSelecionados = $('input[name="produtos[]"]:checked').map(function() {
                    return this.value;
                }).get();

                $.ajax({
                    url: 'adicionar_cesta.php',
                    type: 'POST',
                    data: { id: produtosSelecionados },
                    success: function(response) {
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao adicionar produtos à cesta: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
