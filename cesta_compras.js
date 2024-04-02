document.addEventListener("DOMContentLoaded", function () {
  function carregarCestaCompras() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_cesta.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          exibirCestaCompras(data);
        } else {
          console.error("Erro ao buscar cesta de compras: " + xhr.statusText);
        }
      }
    };
    xhr.send();
  }

  function exibirCestaCompras(produtos) {
    var carrinhoCompras = document.getElementById("carrinho_compras");
    var totalProdutosElement = document.getElementById("totalProdutos");
    var valorTotalElement = document.getElementById("valorTotal");

    if (produtos.length > 0) {
      var carrinhoHtml = '<ul class="list-group">';
      var totalProdutos = 0;
      var valorTotal = 0;

      produtos.forEach(function (produto) {
        carrinhoHtml +=
          '<li class="list-group-item">' +
          produto.nome +
          " - R$" +
          produto.preco +
          ' <button class="btn btn-sm btn-danger float-right remover-produto" data-id="' +
          produto.id +
          '">Remover</button></li>';
        totalProdutos++;
        valorTotal += parseFloat(produto.preco);
      });

      carrinhoHtml += "</ul>";
      carrinhoCompras.innerHTML = carrinhoHtml;

      var removerProdutoButtons = document.querySelectorAll(".remover-produto");
      removerProdutoButtons.forEach(function (button) {
        button.addEventListener("click", function () {
          var produtoId = this.getAttribute("data-id");
          removerProduto(produtoId);
        });
      });

      totalProdutosElement.textContent = "Total de produtos: " + totalProdutos;
      valorTotalElement.textContent = "Valor total: R$" + valorTotal.toFixed(2);
    } else {
      carrinhoCompras.innerHTML = "<p>Nenhum produto na cesta de compras.</p>";
      totalProdutosElement.textContent = "Total de produtos: 0";
      valorTotalElement.textContent = "Valor total: R$0.00";
    }
  }

  function removerProduto(produtoId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remover_cesta.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        carregarCestaCompras();
      }};
    xhr.send("produto_id=" + encodeURIComponent(produtoId));
  }

  carregarCestaCompras();

  var btnFinalizarCompra = document.getElementById("btnFinalizarCompra");
  btnFinalizarCompra.addEventListener("click", function () {
    alert("Compra finalizada!");
  });
});
