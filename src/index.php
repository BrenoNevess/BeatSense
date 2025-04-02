<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <meta name="description" content="">
    <meta name="keywords" content="">
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
            background: url('https://images.pexels.com/photos/3120109/pexels-photo-3120109.jpeg?cs=srgb&dl=pexels-fotograf-jylland-1557004-3120109.jpg&fm=jpg') center/cover;
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
            transform: translateY(3px) translateX(-40px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007FFF;">
        <div class="container">
            <a class="navbar-brand titulo" href="index.php"><h1 class="titulo" style="font-family: 'Quantum'; ">BeatSense</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="login.php">Iniciar Sessão</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#teoria">Teoria Musical</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#sobre">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#contato">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="hero-section">
        <h2>Aprenda Teoria Musical de Forma Simples</h2>
    </div>
    
    <div class="container mt-5" id="teoria">
        <h2 class="text-center mb-4">Fundamentos da Teoria Musical</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <a href=""><img src="https://static.todamateria.com.br/upload/no/ta/notas-musicais-og.jpg" class="card-img-top" alt="Notas Musicais"></a>
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Notas Musicais</h5>
                        <p class="card-text">Entenda as notas musicais, sua formação e aplicação na música.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://akamai.sscdn.co/gcs/cifra-blog/pt/wp-content/uploads/2021/11/c4a022f-teoria-musical.jpg" class="card-img-top" alt="Escalas Musicais">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Escalas e Tons</h5>
                        <p class="card-text">Conheça as escalas maiores e menores e como elas são utilizadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://source.unsplash.com/400x300/?music,rhythm" class="card-img-top" alt="Ritmo e Compassos">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Ritmo e Compassos</h5>
                        <p class="card-text">Aprenda sobre tempos, compassos e como contar corretamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="text-light text-center p-3 mt-5" style="background-color: #007FFF;">
        <p>&copy; 2025 BeatSense. Todos os direitos reservados.</p>
    </footer>
</body> 
</html>