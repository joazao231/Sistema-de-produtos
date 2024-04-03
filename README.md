# Sistema de Gestão de Produtos - README

Este é o Sistema de Gestão de Produtos, um sistema web desenvolvido para gerenciar produtos, fornecedores e usuários. Abaixo estão detalhadas as informações sobre a equipe, o design do sistema, o modelo de banco de dados, e a estrutura dos arquivos.

---

## Equipe

- **Desenvolvedores**:
  - João Antônio de Souza - RA: 226859-1
  - Eduardo Elias - RA: 223629-1
  - Kayo Souza - RA: 227278-1
  - Muriel Iuri Branco - RA: 239833-1
  - Gabriel Cantarelli - RA: 229921-1

## Links

- [Figma](https://www.figma.com/file/YnI6HVL5fgLrcJisGAVL8Z/Untitled?type=design&node-id=0%3A1&mode=design&t=bAq7bPsHS43w1oxN-1)
- ![Diagrama Entidade Relacionamento](https://github.com/joazao231/Sistema-de-produtos/blob/b17fd802a4ce898b8f6c154f301431d00487d93e/DER.png): 

O Diagrama de Entidade-Relacionamento (DER) representa a estrutura do banco de dados do sistema, incluindo as entidades, seus atributos e os relacionamentos entre elas.

## Arquivos

1. **cadastro_fornecedor.html**: Página HTML para cadastrar um novo fornecedor.
2. **cadastro_produto.html**: Página HTML para cadastrar um novo produto.
3. **cadastro_usuario.html**: Página HTML para cadastrar um novo usuário.
4. **create_database.php**: Script PHP para criar o banco de dados se não existir.
5. **criar_tabelas.php**: Script PHP para criar as tabelas do banco de dados.
6. **db.php**: Script PHP contendo as configurações de conexão com o banco de dados.
7. **index.php**: Página inicial do sistema. Redireciona para a página de login ou para a lista de produtos.
8. **lista_fornecedores.php**: Página para exibir a lista de fornecedores cadastrados.
9. **lista_produtos.php**: Página para exibir a lista de produtos cadastrados e adicionar produtos à cesta de compras.
10. **login.html**: Página HTML para o formulário de login.
11. **login.php**: Script PHP para autenticar o usuário.
12. **logout.php**: Script PHP para fazer logout do sistema.
13. **remover_cesta.php**: Script PHP para remover um produto da cesta de compras.
14. **remover_fornecedor.php**: Script PHP para remover um fornecedor do banco de dados.
15. **remover_produto.php**: Script PHP para remover um produto do banco de dados.
16. **buscar_fornecedores.php**: Script PHP para buscar todos os fornecedores cadastrados.
17. **buscar_produtos.php**: Script PHP para buscar todos os produtos cadastrados.
18. **adicionar_cesta.php**: Script PHP para adicionar produtos à cesta de compras.
19. **cadastro_fornecedor.php**: Script PHP para cadastrar um novo fornecedor no banco de dados.
20. **cadastro_produto.php**: Script PHP para cadastrar um novo produto no banco de dados.
21. **cadastro_usuario.php**: Script PHP para cadastrar um novo usuário no banco de dados.
22. **lista_fornecedores.css**: Arquivo CSS para estilizar a página de lista de fornecedores.
23. **lista_produtos.css**: Arquivo CSS para estilizar a página de lista de produtos.
24. **buscar_cesta.php**: Script PHP para buscar os produtos na cesta de compras.
25. **cesta_compras.html**: Página HTML para exibir a cesta de compras.
26. **cesta_compras.js**: Script JavaScript para manipulação da cesta de compras.

## Como usar

1. Faça o download de todos os arquivos do repositório.
2. Configure as credenciais do banco de dados no arquivo `db.php`.
3. Abra o sistema em um servidor web (ex: Apache) e acesse a página inicial `index.php`.
4. Faça login com um usuário existente ou cadastre um novo usuário.
5. Após o login, você será redirecionado para a lista de produtos ou fornecedores, dependendo do número de produtos cadastrados.
6. Explore as diferentes funcionalidades do sistema, como cadastrar novos produtos, fornecedores, visualizar a lista de produtos disponíveis, adicionar produtos à cesta de compras, entre outros.

## Funcionalidades

- Cadastro de produtos, fornecedores e usuários.
- Login e logout de usuários.
- Visualização da lista de produtos e fornecedores.
- Adição e remoção de produtos à cesta de compras.
