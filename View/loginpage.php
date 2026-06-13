<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <!--Completar dps-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="../styles/login.css">
    <title>BeatSense - Login</title>
    <style>
        #mensagem-login{
            position: fixed;
            top: 50px;
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

        #cadastrado-com-sucesso{
            position: fixed;
            top: 50px;
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

        @keyframes aparecer {
            from {
                opacity: 0;
                top: 20px;
            }
            to {
                opacity: 1;
                top: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="titulo" href="../index.php"><h1>BeatSense</h1></a>
    </div>

    <?php if (isset($_SESSION['mensagem_erro'])): ?>
        <div id="mensagem-login">
            <?= $_SESSION['mensagem_erro']; ?>
        </div>
        <?php unset($_SESSION['mensagem_erro']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['mensagem_sucesso'])): ?>
        <div id="cadastrado-com-sucesso">
            <?= $_SESSION['mensagem_sucesso']; ?>
        </div>
        <?php unset($_SESSION['mensagem_sucesso']); ?>
    <?php endif?>

    <div class="caixa-login">
        <div class="login">
            <div class="h2">
                <h2>Acesse sua conta</h2>
                <h2> no BeatSense</h2>
            </div>

            <form action="../Controller/login.php" method="POST">

                <div class="space">
                    <div class="wrapper">
                        <input type="email" class="input" id="email" name="email" required>
                        <label class="label" for="email">Digite seu e-mail</label>
                        <span class="top-line"></span>
                        <span class="bottom-line"></span>
                    </div>
                </div>

                <div class="space">
                    <div class="wrapper">
                        <input type="password" class="input" id="idpassword" name="senha" required>
                        <label class="label" for="idpassword">Digite sua senha</label>
                        <span class="top-line"></span>
                        <span class="bottom-line"></span>   
                    </div>
                </div>

                <button class="enviar" type="submit">Entrar</button>

                <p>Não possui uma conta? <a class="link" href="cadastro.php">Cadastrar-se</a></p>     

            </form>                               
        </div> 
        <script src="../bootstrap/js/alert.js"></script>
</body>
</html>