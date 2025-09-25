<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Cadastro</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="/graodeamor/graodeamor/app/index.php?controller=Auth&action=register">
        <label for="type">Tipo:</label>
        <select name="type" id="type" required>
            <option value="doador">Doador</option>
            <option value="instituicao">Instituição</option>
        </select><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="endereco">Endereço (apenas para instituição):</label>
        <input type="text" name="endereco" id="endereco"><br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="/graodeamor/graodeamor/app/index.php?controller=Auth&action=login">Login</a>
</body>
</html>
