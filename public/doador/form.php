<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Doador</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Formulário de Doador</h1>
    <form method="POST" action="index.php?controller=Doador&action=salvar">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php?controller=Doador&action=listar">Voltar</a>
</body>
</html>
