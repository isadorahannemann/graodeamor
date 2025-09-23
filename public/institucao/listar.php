<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Instituições</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Lista de Instituições</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($instituicoes)): ?>
                <?php foreach ($instituicoes as $instituicao): ?>
                    <tr>
                        <td><?php echo $instituicao['id']; ?></td>
                        <td><?php echo $instituicao['nome']; ?></td>
                        <td><?php echo $instituicao['endereco']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhuma instituição encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php?controller=Instituicao&action=form">Adicionar Instituição</a>
</body>
</html>
