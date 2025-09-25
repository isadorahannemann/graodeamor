<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="/graodeamor/graodeamor/app/index.php?controller=Auth&action=login">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="type">Tipo:</label>
        <select name="type" id="type" required>
            <option value="doador">Doador</option>
            <option value="instituicao">Instituição</option>
        </select><br>
        <button type="submit">Login</button>
    </form>
    <a href="/graodeamor/graodeamor/app/index.php?controller=Auth&action=register">Cadastrar</a>
</body>
</html>
