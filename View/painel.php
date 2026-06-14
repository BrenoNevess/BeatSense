<?php
session_start();
include('../Controller/protect_adm.php');
include('../Model/CRUD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['excluir_id'])) {
        $idExcluir = intval($_POST['excluir_id']);
        Usuario::deletarUsuario($idExcluir);
        header("Location: painel.php");
        exit;
    }

    $dados = [
        "id" => $_POST["id"] ?? null,
        "nome" => $_POST["nome"] ?? '',
        "email" => $_POST["email"] ?? '',
        "senha" => $_POST["senha"] ?? ''
    ];

    if (!empty($dados['id'])) {
        Usuario::atualizarUsuario($dados);
    } else {
        Usuario::adicionarUsuario($dados);
    }

    header("Location: painel.php");
    exit;
}

$termo = $_GET['pesquisar'] ?? null;
$procurar = Usuario::buscar($termo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatSense - PAINEL ADM</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #erro_accExiste{
            position: fixed;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f8d1d4;
            color: #5c1518;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-weight: 500;
            animation: aparecer 0.5s ease-out;
        }
        
        #message_error{
            position: fixed;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f8d1d4;
            color: #5c1518;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-weight: 500;
            animation: aparecer 0.5s ease-out;
        }

        #message-success{
            position: fixed;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #d1e6f8;
            color: #15345c;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-weight: 500;
            animation: aparecer 0.5s ease-out;
        }

        #message-update{
            position: fixed;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #d1f8e3;
            color: #155c34;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-weight: 500;
            animation: aparecer 0.5s ease-out;
        }

        #message-delete{
            position: fixed;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #5c1518;
            color: #f8d1d4;
            padding: 15px 20px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 9999;
            font-weight: 500;
            animation: aparecer 0.5s ease-out;
        }

        @keyframes aparecer {
            from {
                opacity: 0;
                top: 20px;
            }
            to {
                opacity: 1;
                top: 35px;
            }
        }

        .botoes{
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container mt-4">
<?php
// Mensagem de erro
if (isset($_SESSION['erro_accExiste'])) {
    echo '<div id="erro_accExiste">' . $_SESSION['erro_accExiste'] . '</div>';
    unset($_SESSION['erro_accExiste']);

// Mensagem de cadastro
} elseif (isset($_SESSION['message-user-success'])) {
    echo '<div id="message-success">' . $_SESSION['message-user-success'] . '</div>';
    unset($_SESSION['message-user-success']);

// Mensagem de atualização
} elseif (isset($_SESSION['message-update'])) {
    echo '<div id="message-update">' . $_SESSION['message-update'] . '</div>';
    unset($_SESSION['message-update']);

// Mensagem de exclusão
} elseif (isset($_SESSION['message-delete'])) {
    echo '<div id="message-delete">' . $_SESSION['message-delete'] . '</div>';
    unset($_SESSION['message-delete']);
}
?>

    <h2 class="mb-4">Gerenciamento de Usuários</h2>

    
    <form action="" method="POST" class="mb-4">
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

    <div class="botoes">
        <a href="../index.php"><button id="button" class="btn btn-primary">Voltar</button></a>
        <a href="../Controller/logout.php"><button class="btn btn-primary">Encerrar Sessão</button></a>
    </div>

    <form method="GET" class="mb-3" id="search">
        <label for="search-user">Pesquisar Usuário:</label>
        <input type="text" name="pesquisar" id="search-user" class="form-control" value="<?= htmlspecialchars($termo) ?>">
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
            <?php foreach ($procurar as $row) : ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm editar" data-id="<?= $row["id"] ?>" data-nome="<?= $row["nome"] ?>" data-email="<?= $row["email"] ?>">Editar</button>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="excluir_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <script src="../bootstrap/js/painel.js"></script>
    <script src="../bootstrap/js/alert.js"></script>
    <script src="../bootstrap/js/WindowConfirm.js"></script>
<?php include('../includes/accessibility-widget.php'); ?>
</body>
</html>