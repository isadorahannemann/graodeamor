<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Doações</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Lista de Doações</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Doador</th>
                <th>Instituição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($doacoes)): ?>
                <?php foreach ($doacoes as $doacao): ?>
                    <tr>
                        <td><?php echo $doacao['id']; ?></td>
                        <td><?php echo $doacao['descricao']; ?></td>
                        <td><?php echo $doacao['data_doacao']; ?></td>
                        <td><?php echo $doacao['doador_nome']; ?></td>
                        <td><?php echo $doacao['instituicao_nome']; ?></td>
                        <td><?php echo $doacao['status'] ?? 'Disponível'; ?></td>
                        <td><a href="index.php?controller=Doacao&action=form&id=<?php echo $doacao['id']; ?>">Editar</a></td>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'instituicao'): ?>
                            <td><a href="index.php?controller=Doacao&action=retirar&id=<?php echo $doacao['id']; ?>">Retirar</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Nenhuma doação encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php?controller=Doacao&action=form">Adicionar Doação</a>
    <a href="index.php?controller=Auth&action=logout">Logout</a>
</body>
</html>
