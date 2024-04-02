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
<script>
document.addEventListener('DOMContentLoaded', function() {
    function carregarListaFornecedores() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'buscar_fornecedores.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var listaFornecedores = document.getElementById('lista-fornecedores');
                    listaFornecedores.innerHTML = '';
                    data.forEach(function(fornecedor) {
                        var listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.textContent = fornecedor.nome;
                        var removeButton = document.createElement('button');
                        removeButton.className = 'btn btn-danger btn-sm float-right';
                        removeButton.textContent = 'Remover';
                        removeButton.setAttribute('data-fornecedor-id', fornecedor.id);
                        listItem.appendChild(removeButton);
                        listaFornecedores.appendChild(listItem);
                    });
                }
            }
        };
        xhr.send();
    }

    carregarListaFornecedores();

    document.addEventListener('click', function(event) {
        if (event.target && event.target.matches('#lista-fornecedores button')) {
            var fornecedorId = event.target.getAttribute('data-fornecedor-id');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'remover_fornecedor.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                        carregarListaFornecedores();
                    } else {
                        alert('Erro ao remover fornecedor: ' + xhr.responseText);
                    }
                }
            };
            xhr.send('fornecedor_id=' + encodeURIComponent(fornecedorId));
        }
    });
});
</script>
</body>
</html>
