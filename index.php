<?php 
session_start();
include('Controller/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <meta name="description" content="BeatSense é um site voltado para ensinar a teoria musical, com ele o músico aprenderá os os fundamentos musicais">
    <meta name="keywords" content="BeatSense, teoria musical, música, ritmo, figuras musicais, som, timbre, altura, intensidade, duração, aprendizado musical, educação musical, leitura musical, notas musicais, pausas musicais, fundamentos da música, ensino de música, conteúdo musical interativo, site educativo, acessibilidade na música, música para iniciantes, teoria musical para iniciantes, Congregação Cristã no Brasil, música CCB, jovens músicos, leitura de partituras, símbolos musicais, curso de teoria musical gratuito">
    <title>BeatSense - Ensino de Música</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        @font-face {
            font-family: 'Quantum';
            src: url('fonts/quantum/quantrnd.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #f8f9fa;
        }

        .hero-section {
            position: relative;
            background: url('img/violino.jpg') center/cover;
            object-fit: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            height: 400px;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(1px);
            z-index: 1;
        }

        .hero-section h2 {
            text-align: center;
            z-index: 2;
            color: #ffffff;
            font-family: 'Quantum', sans-serif;
            font-size: 42px;
        }

        .titulo {
            display: flex;
            transform: translateY(3px) translateX(-10px);
            font-size: 42px;
            font-family:'Quantum', Times, serif;
            font-weight: 500; 
        }

        #sessao{
            border: 1px solid #fff;
            border-radius: 10px;
            background-color: #0056b3;
            font-weight: 600;
        }

        #sessao:hover{
            background-color: #0c66c5;
        }

        #excluir-conta{
            border: 1px solid #fff;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .nav-item{
            font-weight: 600;
            margin-left: 15px;
        }

        .card{
            transition: 0.3s;
        }

        .card:hover{
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.34) !important;
        }

        .card-text{
            text-align: left;
        }

        .card-img-top{
            max-width: 415px;
            width: 100%;
            height: 240px;
        }

        .col-md-4{
            margin-top: 20px;
        }

        .msg-confirm{
            display: flex;

        }
        
        .box-confirm {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px; 
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 250px;
            height: 155px;
            background-color: #dedede;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
            border-radius: 8px;
            z-index: 999;
            color: #000;
        }

        .content-confirm{
            text-align: center;
            padding: 10px;
            color: #000;
        }

        .content-confirm button {
            border-radius: 7px;
            max-width: 70px;
            width: 100%;
            border: none;
            margin-top: 10px;
        }


        .button-no{
            background-color: #6fa7e2;
            color: #000;
            font-weight: 500;
            margin-left: 25px;
        }

        .button-yes{
            background-color: #c46666;
            color: #000;
            font-weight: 500;
        }

        #AccExclude{
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

        @media(max-width: 768px){
            .card-img-top{
                max-width: 515px;
                width: 100%;
                height: 240px;
            }

            .col-md-4{
                display: flex;
                max-width: 475px;
                margin: auto;
            }

            .row{
                display: grid;
                gap:20px;
            }
        }
    </style>
</head>
<body id="Behind">
    <?php if (isset($_SESSION['mensagem_erro'])): ?>
        <div id="mensagem-login" class="alert alert-danger text-center position-fixed start-50 translate-middle-x shadow" style="top: 40px; z-index: 9999; width: 100%; max-width: 450px;">
            <?= $_SESSION['mensagem_erro']; ?>
        </div>
        <?php unset($_SESSION['mensagem_erro']); ?>
    <?php endif; ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007FFF;">
        <div class="container">
            <a class="navbar-brand titulo" href="index.php"><h1 class="titulo">BeatSense</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="#teoria">Teoria Musical</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#sobre">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="https://www.linkedin.com/in/breno-neves-2b30a5360/">Contato</a></li>
                    <?php if(isset($_SESSION['user_type'])):?>
                        <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="Controller/logout.php">Encerrar Sessão</a></li>
                        <li class="nav-item mt-2 mt-lg-0"><a id="excluir-conta" class="btn btn-primary text-light w-100" onclick="OpenConfirm()">Excluir Conta</a></li>
                    <?php else: ?>
                        <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="loginpage.php">Iniciar Sessão</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'adm'):?>
                    <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="painel.php">Painel ADM</a></li>
                    <?php endif;?>
            </div>
        </div>
    </nav>
    
    <div class="hero-section">
        <h2>Aprenda Teoria Musical de Forma Simples</h2>
    </div>

    <div class="container mt-5 text-center" id="sobre">
        <h2 class="mb-3">Sobre o BeatSense</h2>
        <p class="lead">O <strong>BeatSense</strong> é um site dedicado ao ensino de teoria musical de forma acessível e prática. 
        Criado para auxiliar músicos iniciantes e membros da Congregação Cristã no Brasil, 
        oferecendo materiais educativos que simplificam o aprendizado e ajudam você a desenvolver seus conhecimentos musicais.</p>
    </div>

    <div id="overlay" style="
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.5);
        z-index: 998;">
    </div>

    <div class="box-confirm" id="Open">
        <div class="content-confirm">
            <p>Tem certeza de que deseja excluir sua conta? Esta ação não poderá ser desfeita.</p>
            <button type="submit" class="button-yes" id="deletar"  onclick="ConfirmConfirm()">Sim</button>
            <button class="button-no" onclick="CloseConfirm()">Não</button>
        </div>
    </div>

    <div class="container mt-5" id="teoria">
        <h2 class="text-center mb-4">Fundamentos da Teoria Musical</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="modulo1.php" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/Módulo 1 2.0.webp" class="card-img-top" alt="Módulo 1">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Módulo 1</h5>
                        <p class="card-text">Entenda o que é música, como funciona o ritmo, conheça as propridades do som e as figuras musicais.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="modulo2.php" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/Módulo 2.webp" class="card-img-top" alt="Módulo 2">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2ecc71; ">Módulo 2</h5>
                        <p class="card-text">Explore compassos, fórmulas, claves, notas e a estrutura do pentagrama.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="modulo3.php" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/modulo 3.jpg" class="card-img-top" alt="Ritmo e Compassos">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #f39c12;">Módulo 3</h5>
                        <p class="card-text">Intervalos, melodia, harmonia, vozes e sinais musicais, entenda a base da expressão musical.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/manutenção.jpg" class="card-img-top" alt="Em Manutenção">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #acacac;">Módulo 4</h5>
                        <p class="card-text">Em breve, em novas atualizações.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/manutenção.jpg" class="card-img-top" alt="Em Manutenção">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #acacac;">Módulo 5</h5>
                        <p class="card-text">Em breve, em novas atualizações.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="img/manutenção.jpg" class="card-img-top" alt="Em Manutenção">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #acacac;">Módulo 6</h5>
                        <p class="card-text">Em breve, em novas atualizações.</p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <footer class="text-light py-4 mt-5" style="background-color: #007FFF;">
        <div class="container text-center">
            <h5 class="mb-3">BeatSense</h5>
            <p class="mb-2">Aprenda teoria musical de forma fácil e acessível.</p>
            
            <div class="d-flex justify-content-center mb-3">
                <a href="#teoria" class="text-light text-decoration-none mx-3">Teoria Musical</a>
                <a href="#sobre" class="text-light text-decoration-none mx-3">Sobre</a>
                <a href="https://www.linkedin.com/in/breno-neves-2b30a5360/" class="text-light text-decoration-none mx-3">Contato</a>
            </div>

            <p class="mb-0">&copy; 2025 BeatSense. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="bootstrap/js/alert.js"></script>
    <script src="bootstrap/js/WindowConfirm.js"></script>
</body> 
</html>