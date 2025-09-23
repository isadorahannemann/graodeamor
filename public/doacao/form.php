<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Doação</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1><?php echo $doacao ? 'Editar Doação' : 'Adicionar Doação'; ?></h1>
    <form method="POST" action="index.php?controller=Doacao&action=salvar">
        <label for="doador_id">Doador:</label>
        <select name="doador_id" id="doador_id">
            <?php foreach ($doadores as $doador): ?>
                <option value="<?php echo $doador['id']; ?>" <?php if ($doacao && $doacao['doador_id'] == $doador['id']) echo 'selected'; ?>><?php echo $doador['nome']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="instituicao_id">Instituição:</label>
        <select name="instituicao_id" id="instituicao_id">
            <?php foreach ($instituicoes as $instituicao): ?>
                <option value="<?php echo $instituicao['id']; ?>" <?php if ($doacao && $doacao['instituicao_id'] == $instituicao['id']) echo 'selected'; ?>><?php echo $instituicao['nome']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $doacao['descricao'] ?? ''; ?>"><br>
        <label for="data_doacao">Data:</label>
        <input type="date" name="data_doacao" id="data_doacao" value="<?php echo $doacao['data_doacao'] ?? date('Y-m-d'); ?>"><br>
        <label for="status">Status:</label>
        <input type="text" name="status" id="status" value="<?php echo $doacao['status'] ?? ''; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $doacao['id'] ?? ''; ?>">
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php?controller=Doacao&action=listar">Voltar</a>
</body>
</html>
