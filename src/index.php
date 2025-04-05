<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    </style>
</head>
<body>
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
                    <li class="nav-item"><a class="nav-link text-light" href="#contato">Contato</a></li>
                    <?php if(isset($_SESSION['user_type'])):?>
                    <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="servers/logout.php">Encerrar Sessão</a></li>
                    <?php else: ?>
                    <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="loginpage.php">Iniciar Sessão</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'adm'):?>
                    <li class="nav-item mt-2 mt-lg-0"><a id="sessao" class="btn btn-primary text-light w-100" href="adm/painel.php">Painel ADM</a></li>
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
                        <h5 class="card-title" style="color: #007FFF;">Módulo 2</h5>
                        <p class="card-text">Conheça as escalas maiores e menores e como elas são utilizadas.</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="modulo3.php" class="text-decoration-none text-dark">
                <div class="card shadow-sm">
                    <img src="https://source.unsplash.com/400x300/?music,rhythm" class="card-img-top" alt="Ritmo e Compassos">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Ritmo e Compassos</h5>
                        <p class="card-text">Aprenda sobre tempos, compassos e como contar corretamente.</p>
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
                <a href="#contato" class="text-light text-decoration-none mx-3">Contato</a>
            </div>
    
            <p class="mb-0">&copy; 2025 BeatSense. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="bootstrap-5.3.0-dist/bootstrap/js/alert.js"></script>
</body> 
</html>