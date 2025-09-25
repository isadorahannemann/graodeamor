# Grão de Amor - Sistema de Gerenciamento de Doações

Este projeto é uma aplicação web em PHP para gerenciar doações, doadores e instituições. Segue o padrão MVC e utiliza autenticação baseada em sessão e mensagens.

---

## Componentes Principais

### 1. Controladores

- **Doacao.php** (Controlador de Doação)
  - Lida com ações relacionadas a doações.
  - Métodos principais:
    - `listar()`: Recupera a lista de doações e inclui a visualização de listagem.
    - `form()`: Carrega o formulário para criar ou editar uma doação.
    - `salvar()`: Salva uma nova ou atualizada doação.
    - `receber()`: Marca uma doação como recebida por uma instituição e define uma mensagem de sucesso na sessão.

- **Auth.php** (Controlador de Autenticação)
  - Gerencia login, registro e logout do usuário.
  - Usa sessão para armazenar ID e tipo do usuário (`doador` ou `instituicao`).

---

### 2. Serviços

- **DoacaoService.php**
  - Atua como camada de lógica de negócio para doações.
  - Usa `DoacaoDAO` para operações de banco de dados.
  - Métodos:
    - `listar()`: Retorna todas as doações.
    - `obterPorId($id)`: Obtém uma doação por ID.
    - `salvar(array $dados)`: Salva ou atualiza uma doação.
    - `deletar($id)`: Exclui uma doação.
    - `receber($id)`: Marca uma doação como recebida.

---

### 3. Objetos de Acesso a Dados (DAO)

- **DoacaoDAO.php**
  - Lida com interações diretas com o banco de dados para doações.
  - Usa uma conexão PDO singleton (`MysqlSingleton`).
  - Métodos:
    - `listar()`: Busca doações com nomes de instituições relacionadas.
    - `salvar(array $dados)`: Insere uma nova doação.
    - `obterPorId(int $id)`: Busca uma doação por ID.
    - `atualizar(array $dados)`: Atualiza uma doação.
    - `deletar(int $id)`: Exclui uma doação.
    - `receber(int $id)`: Atualiza o status da doação para 'recebido'.

---

### 4. Utilitários Genéricos

- **MysqlSingleton.php**
  - Fornece uma instância singleton PDO para conexão com o banco de dados.
  - Configurado para MySQL com codificação UTF-8.

- **Acao.php**
  - Executa ações de controlador dinamicamente com base em nomes de controlador e ação.

- **Controller.php**
  - Classe base de controlador com método `render()` para incluir visualizações com variáveis.

- **MysqlFactory.php**
  - Classe fábrica para criar instâncias PDO com parâmetros configuráveis.

- **Autoload.php**
  - Carregador automático no estilo PSR-4 para arquivos de classe.

---

### 5. Visualizações

- **public/doacao/listar.php**
  - Exibe uma tabela de doações.
  - Mostra uma mensagem de sucesso se definida na sessão (ex.: após receber uma doação).

- **public/doacao/form.php**
  - Formulário para criar ou editar doações.

- **app/template/DoacaoTemp.php**
  - Classe de template implementando interface `ITemplate`.
  - Fornece métodos para renderizar listas e formulários de doação com HTML.

---

## Como Funciona a Mensagem de Sucesso

- Quando uma instituição clica em "Receber" em uma doação, o método `receber()` no controlador `Doacao`:
  - Chama o serviço para marcar a doação como recebida.
  - Define uma variável de sessão `success_message` com o texto "Doação recebida com sucesso".
  - Redireciona para a página de lista de doações.

- O método `listar()` no mesmo controlador:
  - Recupera e limpa o `success_message` da sessão.
  - Passa para a visualização.

- A visualização `listar.php`:
  - Verifica se uma mensagem de sucesso existe.
  - Exibe em texto verde acima da tabela de doações.

---

## Como Executar

1. Certifique-se de que um banco de dados MySQL chamado `graodeamor` existe e é acessível com usuário `root` e sem senha.
2. Coloque o projeto na raiz de um servidor web habilitado para PHP (ex.: XAMPP `htdocs`).
3. Acesse a aplicação via navegador.
4. Use a página de login para autenticar como doador ou instituição.
5. Gerencie doações via a interface fornecida.

---

## Notas

- Reescrita de URL é habilitada via `.htaccess` para rotear solicitações para `app/index.php`.
- Gerenciamento de sessão é usado para autenticação e mensagens flash.
- O projeto segue uma arquitetura MVC simples com separação de responsabilidades.
