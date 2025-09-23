<h1>Lista de Doadores</h1>
<a href="index.php?controller=Doador&action=form">Novo Doador</a>
<table border="1">
    <tr><th>ID</th><th>Nome</th><th>Email</th></tr>
    <?php foreach ($doadores as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['nome'] ?></td>
            <td><?= $d['email'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
