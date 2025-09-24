<?php
namespace template;

class DoacaoTemp implements ITemplate {

 
    public function renderList(array $items): string {
        ob_start();
        ?>
        <h1>Doações</h1>
        <p><a href="index.php?controller=Doacao&action=form">Nova Doação</a> | <a href="index.php?controller=Doador&action=listar">Doadores</a> | <a href="index.php?controller=Instituicao&action=listar">Instituições</a></p>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr><th>ID</th><th>Doador</th><th>Instituição</th><th>Descrição</th><th>Data</th><th>Ações</th></tr>
            </thead>
            <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $d): ?>
                    <tr>
                        <td><?= htmlspecialchars($d['id']) ?></td>
                        <td><?= htmlspecialchars($d['doador_nome'] ?? '—') ?></td>
                        <td><?= htmlspecialchars($d['instituicao_nome'] ?? '—') ?></td>
                        <td><?= nl2br(htmlspecialchars($d['descricao'])) ?></td>
                        <td><?= htmlspecialchars($d['data_doacao']) ?></td>
                        <td>
                            <a href="index.php?controller=Doacao&action=form&id=<?= htmlspecialchars($d['id']) ?>">Editar</a> |
                            <a href="index.php?controller=Doacao&action=deletar&id=<?= htmlspecialchars($d['id']) ?>" onclick="return confirm('Deseja excluir esta doação?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Nenhuma doação registrada.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }


    public function renderForm(array $item = []): string {
        ob_start();
        $id = $item['id'] ?? '';
        $descricao = $item['descricao'] ?? '';
        $data_doacao = $item['data_doacao'] ?? date('Y-m-d');
        $doador_id = $item['doador_id'] ?? '';
        $instituicao_id = $item['instituicao_id'] ?? '';
        $doadores = $item['doadores'] ?? [];
        $instituicoes = $item['instituicoes'] ?? [];
        ?>
        <h1><?= $id ? 'Editar Doação' : 'Nova Doação' ?></h1>
        <form method="post" action="index.php?controller=Doacao&action=salvar">
            <?php if ($id): ?><input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"><?php endif; ?>

            <label>Doador:<br>
                <select name="doador_id" required>
                    <option value="">-- selecione --</option>
                    <?php foreach ($doadores as $d): ?>
                        <option value="<?= htmlspecialchars($d['id']) ?>" <?= $doador_id == $d['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($d['nome']) ?> (<?= htmlspecialchars($d['email']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <br><br>

            <label>Instituição:<br>
                <select name="instituicao_id" required>
                    <option value="">-- selecione --</option>
                    <?php foreach ($instituicoes as $i): ?>
                        <option value="<?= htmlspecialchars($i['id']) ?>" <?= $instituicao_id == $i['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($i['nome']) ?> — <?= htmlspecialchars($i['endereco']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <br><br>

            <label>Descrição:<br>
                <textarea name="descricao" rows="4" cols="50" required><?= htmlspecialchars($descricao) ?></textarea>
            </label>
            <br><br>

            <label>Data da Doação:<br>
                <input type="date" name="data_doacao" value="<?= htmlspecialchars($data_doacao) ?>" required>
            </label>
            <br><br>

            <button type="submit">Salvar</button>
            <a href="index.php?controller=Doacao&action=listar">Voltar</a>
        </form>
        <?php
        return ob_get_clean();
    }
}
