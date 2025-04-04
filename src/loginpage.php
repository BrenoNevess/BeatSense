<?php 
include('servers/login.php');
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
    <link rel="stylesheet" href="styles/login.css">
    <title>BeatSense - Login</title>
    <style>
        #mensagem-login{
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ffdddd;
            color: #a94442;
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
        <a class="titulo" href="index.php"><h1>BeatSense</h1></a>
    </div>

    <?php if (isset($_SESSION['mensagem_erro'])): ?>
        <div id="mensagem-login">
            <?= $_SESSION['mensagem_erro']; ?>
        </div>
        <?php unset($_SESSION['mensagem_erro']); ?>
    <?php endif; ?>

    <div class="caixa-login">
        <div class="login">
            <div class="h2">
                <h2>Acesse sua conta</h2>
                <h2> no BeatSense</h2>
            </div>

            <form action="/BeatSense/src/servers/login.php" method="POST">

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
        <script src="bootstrap-5.3.0-dist/bootstrap/js/alert.js"></script>
</body>
</html>