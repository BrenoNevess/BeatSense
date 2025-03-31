<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <meta name="description" content="Cadastrar seu e-mail no site">
    <meta name="keywords" content="cadastro, entrar, iniciar sessão">
    <link rel="stylesheet" type="text/css" href="../src/styles/cadastro.css">
    <title>Cadastrar-se no BeatSense</title>
</head>
<body>
    <div class="container">
        <a class="titulo" href="index.php"><h1>BeatSense</h1></a>
    </div>
        <div class="caixa-cadastro">
            <div class="cadastro">
                
                    <div class="mensagem">    
                        <h2>Bem-Vindo(a)</h2>
                        <h2>ao BeatSense</h2>
                    </div>
                    
                    <form action="/BeatSense/src/servers/cadastrar.php" method="POST">

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
                            <input type="password" class="input" id="idpassword" name="senha_hash" required>
                            <label class="label" for="idpassword">Senha (+8 caracteres)</label>
                            <span class="topline"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="wrapper">
                            <input type="password" class="input" id="confirmpassword" name="senha_hash" required>
                            <label class="label" for="confirmpassword">Confirme sua senha</label>
                            <span class="top--line"></span>
                            <span class="bottom-line"></span>
                        </div>
                    </div>     

                    <button type="submit" class="botao-cadastro">Cadastrar</button>
                        
                    <p>Já possui uma conta? <a class="link" href="index.php">Faça Login</a></p>
                
                </form>
            </div>
        </div>
            
</body>
</html>