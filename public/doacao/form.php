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
        <label for="doador_nome">Doador:</label>
        <input type="text" name="doador_nome" id="doador_nome" value="<?php echo $doacao['doador_nome'] ?? ''; ?>" placeholder="Digite o nome do doador"><br>
        <label for="instituicao_id">Instituição:</label>
        <select name="instituicao_id" id="instituicao_id">
            <option value="">-- Selecione uma instituição (opcional) --</option>
            <?php foreach ($instituicoes as $instituicao): ?>
                <option value="<?php echo $instituicao['id']; ?>" <?php if ($doacao && $doacao['instituicao_id'] == $instituicao['id']) echo 'selected'; ?>><?php echo $instituicao['nome']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="alimento">Alimento:</label>
        <select name="alimento" id="alimento">
            <option value="arroz" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'arroz') echo 'selected'; ?>>Arroz</option>
            <option value="feijao" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'feijao') echo 'selected'; ?>>Feijão</option>
            <option value="macarrao" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'macarrao') echo 'selected'; ?>>Macarrão</option>
            <option value="oleo" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'oleo') echo 'selected'; ?>>Óleo</option>
            <option value="acucar" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'acucar') echo 'selected'; ?>>Açúcar</option>
            <option value="outros" <?php if ($doacao && ($doacao['alimento'] ?? '') == 'outros') echo 'selected'; ?>>Outros</option>
        </select><br>
        <label for="quantidade">Quantidade (kg):</label>
        <input type="number" name="quantidade" id="quantidade" value="<?php echo $doacao['quantidade'] ?? ''; ?>" min="0" step="0.1"><br>
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
