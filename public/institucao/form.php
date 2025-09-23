<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Instituição</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Formulário de Instituição</h1>
    <form method="POST" action="index.php?controller=Instituicao&action=salvar">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco"><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php?controller=Instituicao&action=listar">Voltar</a>
</body>
</html>
