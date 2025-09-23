<?php
namespace template;

class DoadorTemp implements ITemplate {

    public function renderList(array $items): string {
        ob_start();
        ?>
        <h1>Doadores</h1>
        <p><a href="index.php?controller=Doador&action=form">Novo Doador</a> | <a href="index.php?controller=Instituicao&action=listar">Instituições</a> | <a href="index.php?controller=Doacao&action=listar">Doações</a></p>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
            </thead>
            <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $d): ?>
                    <tr>
                        <td><?= htmlspecialchars($d['id']) ?></td>
                        <td><?= htmlspecialchars($d['nome']) ?></td>
                        <td><?= htmlspecialchars($d['email']) ?></td>
                        <td>
                            <a href="index.php?controller=Doador&action=form&id=<?= htmlspecialchars($d['id']) ?>">Editar</a> |
                            <a href="index.php?controller=Doador&action=deletar&id=<?= htmlspecialchars($d['id']) ?>" onclick="return confirm('Deseja excluir este doador?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Nenhum doador cadastrado.</td></tr>
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
        $email = $item['email'] ?? '';
        ?>
        <h1><?= $id ? 'Editar Doador' : 'Novo Doador' ?></h1>
        <form method="post" action="index.php?controller=Doador&action=salvar">
            <?php if ($id): ?><input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"><?php endif; ?>
            <label>Nome:<br><input type="text" name="nome" required value="<?= htmlspecialchars($nome) ?>"></label><br><br>
            <label>Email:<br><input type="email" name="email" required value="<?= htmlspecialchars($email) ?>"></label><br><br>
            <button type="submit">Salvar</button>
            <a href="index.php?controller=Doador&action=listar">Voltar</a>
        </form>
        <?php
        return ob_get_clean();
    }
}
