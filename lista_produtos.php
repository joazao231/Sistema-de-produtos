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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    function carregarListaProdutos() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'buscar_produtos.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var listaProdutos = document.getElementById('lista-produtos');
                listaProdutos.innerHTML = '';
                data.forEach(function(produto) {
                    var listItem = document.createElement('li');
                    listItem.className = 'list-group-item';
                    var checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.className = 'mr-2 produto-checkbox';
                    checkbox.name = 'produtos[]';
                    checkbox.value = produto.id;
                    var textoProduto = document.createElement('span');
                    textoProduto.textContent = produto.nome + ' - R$ ' + produto.preco;
                    listItem.appendChild(checkbox);
                    listItem.appendChild(textoProduto);
                    listaProdutos.appendChild(listItem);
                });
            }
        };
        xhr.send();
    }

    carregarListaProdutos();

    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('produto-checkbox')) {
            var peloMenosUmSelecionado = document.querySelectorAll('.produto-checkbox:checked').length > 0;
            document.getElementById('btn-adicionar-cesta').disabled = !peloMenosUmSelecionado;
        }
    });

    document.getElementById('form-adicionar-cesta').addEventListener('submit', function(event) {
        event.preventDefault();

        var produtosSelecionados = Array.from(document.querySelectorAll('input[name="produtos[]"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'adicionar_cesta.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                } else {
                    alert('Erro ao adicionar produtos à cesta: ' + xhr.responseText);
                }
            }
        };
        xhr.send(JSON.stringify({ id: produtosSelecionados }));
    });
});
</script>
</body>
</html>
