<?php
include('protect_adm.php');
include('CRUD.php');
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'adm') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatSense - PAINEL ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #button{
            margin-right: 15px;
        }
    </style>
</head>
<body class="container mt-4">

    <h2 class="mb-4">Gerenciamento de Usuários</h2>

    
    <form method="POST" class="mb-4">
        <input type="hidden" name="id" id="id">

        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>

        <button type="submit" name="adicionar" id="btnSalvar" class="btn btn-primary">Adicionar</button>
    </form>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $row) : ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm editar" data-id="<?= $row["id"] ?>" data-nome="<?= $row["nome"] ?>" data-email="<?= $row["email"] ?>">Editar</button>
                        <a href="?deletar=<?= $row["id"] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php"><button id="button" class="btn btn-primary">Voltar</button></a>
    <a href="../servers/logout.php"><button class="btn btn-primary">Encerrar Sessão</button></a>
    
    <script src="../bootstrap-5.3.0-dist/bootstrap/js/painel.js"></script>

</body>
</html>