<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <meta name="description" content="Cadastrar seu e-mail no site">
    <meta name="keywords" content="cadastro, entrar, iniciar sessão">
    <link rel="stylesheet" type="text/css" href="../styles/cadastro.css">
    <title>Cadastrar-se no BeatSense</title>
    <style>
        #erro_senha{
            opacity: 1;
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

        #erro_login{
            opacity: 1;
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

        #erro_accExiste{
            opacity: 1;
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

    <?php if (isset($_SESSION['erro_senha'])): ?>
        <div id="erro_senha">
            <?= $_SESSION['erro_senha']; ?>
        </div>
        <?php unset($_SESSION['erro_senha']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['erro_accExiste'])): ?>
        <div id="erro_accExiste">
            <?= $_SESSION['erro_accExiste']; ?>
        </div>
        <?php unset($_SESSION['erro_accExiste']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['erro_login'])): ?>
        <div id="erro_login">
            <?= $_SESSION['erro_login']; ?>
        </div>
        <?php unset($_SESSION['erro_login']); ?>
    <?php endif; ?>

        <div class="caixa-cadastro">
            <div class="cadastro">
                
                    <div class="mensagem">    
                        <h2>Bem-Vindo(a)</h2>
                        <h2>ao BeatSense</h2>
                    </div>

                    <form action="../Controller/cadastrar-control.php" method="POST">

                    <div class="input-group">
                        <div class="wrapper">
                            <input type="text" class="input" id="text" name="nome" required>
                            <label class="label" for="text">Digite seu nome</label>
                            <span class="top-line"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="wrapper">
                            <input type="email" class="input" id="email" name="email" required>
                            <label class="label" for="email">Digite seu e-mail</label>
                            <span class="top-line"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>

                    <div class="input-group">  
                        <div class="wrapper">
                            <input type="password" class="input" id="idpassword" name="senha" required>
                            <label class="label" for="idpassword">Digite sua senha</label>
                            <span class="topline"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="wrapper">
                            <input type="password" class="input" id="confirmpassword" name="senha_confirmar" required>
                            <label class="label" for="confirmpassword">Confirme sua senha</label>
                            <span class="top--line"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>

                    <button type="submit" class="botao-cadastro">Cadastrar</button>
                        
                    <p>Já possui uma conta? <a class="link" href="loginpage.php">Faça Login</a></p>
                
                </form>
            </div>
        </div>
        <script src="../bootstrap/js/alert.js"></script>
<?php include('../includes/accessibility-widget.php'); ?>
</body>
</html>