<?php
namespace template;

class InstituicaoTemp implements ITemplate {

    public function renderList(array $items): string {
        ob_start();
        ?>
        <h1>Instituições</h1>
        <p><a href="index.php?controller=Instituicao&action=form">Nova Instituição</a> | <a href="index.php?controller=Doador&action=listar">Doadores</a> | <a href="index.php?controller=Doacao&action=listar">Doações</a></p>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Ações</th></tr>
            </thead>
            <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $i): ?>
                    <tr>
                        <td><?= htmlspecialchars($i['id']) ?></td>
                        <td><?= htmlspecialchars($i['nome']) ?></td>
                        <td><?= htmlspecialchars($i['endereco']) ?></td>
                        <td>
                            <a href="index.php?controller=Instituicao&action=form&id=<?= htmlspecialchars($i['id']) ?>">Editar</a> |
                            <a href="index.php?controller=Instituicao&action=deletar&id=<?= htmlspecialchars($i['id']) ?>" onclick="return confirm('Deseja excluir esta instituição?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Nenhuma instituição cadastrada.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }

    public function renderForm(array $item = []): string {
        ob_start();
        $id = $item['id'] ?? '';
        $nome = $item['nome'] ?? '';
        $endereco = $item['endereco'] ?? '';
        ?>
        <h1><?= $id ? 'Editar Instituição' : 'Nova Instituição' ?></h1>
        <form method="post" action="index.php?controller=Instituicao&action=salvar">
            <?php if ($id): ?><input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"><?php endif; ?>
            <label>Nome:<br><input type="text" name="nome" required value="<?= htmlspecialchars($nome) ?>"></label><br><br>
            <label>Endereço:<br><input type="text" name="endereco" required value="<?= htmlspecialchars($endereco) ?>"></label><br><br>
            <button type="submit">Salvar</button>
            <a href="index.php?controller=Instituicao&action=listar">Voltar</a>
        </form>
        <?php
        return ob_get_clean();
    }
}
