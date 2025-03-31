<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <!--Completar dps-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="../src/styles/index.css">
    <title>Fazer login no BeatSense</title>
</head>
<body>
    <div class="container">
        <a class="titulo" href="/src/paginicial.html"><h1>BeatSense</h1></a>
    </div>
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
                        <input type="password" class="input" id="idpassword" name="senha_hash" required>
                        <label class="label" for="idpassword">Digite sua senha</label>
                        <span class="top-line"></span>
                        <span class="bottom-line"></span>   
                    </div>
                </div>

                <button class="enviar" type="submit">Entrar</button>

                <p>Não possui uma conta? <a class="link" href="cadastro.php">Cadastrar-se</a></p>     

            </form>                               
        </div> 
    </div> 
</body>
</html>