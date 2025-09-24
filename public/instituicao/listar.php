<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações Disponíveis</title>
    <link rel="stylesheet" href="/graodeamor/graodeamor/public/assets/css/style.css">
</head>
<body>
    <h1>Doações Disponíveis para Receber</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Alimento</th>
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Doador</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($doacoes)): ?>
                <?php foreach ($doacoes as $doacao): ?>
                    <tr>
                        <td><?php echo $doacao['id']; ?></td>
                        <td><?php echo $doacao['alimento'] ?? 'Não informado'; ?></td>
                        <td><?php echo isset($doacao['quantidade']) && $doacao['quantidade'] > 0 ? $doacao['quantidade'] . ' kg' : 'Não informado'; ?></td>
                        <td><?php echo $doacao['descricao']; ?></td>
                        <td><?php echo $doacao['data_doacao']; ?></td>
                        <td><?php echo $doacao['doador_nome']; ?></td>
                        <td><?php echo $doacao['status'] ?? 'Disponível'; ?></td>
                        <td><a href="index.php?controller=Doacao&action=receber&id=<?php echo $doacao['id']; ?>">Receber</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Nenhuma doação disponível.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php?controller=Instituicao&action=doacoes">Ver Doações</a>
    <a href="index.php?controller=Auth&action=logout">Logout</a>
</body>
</html>
