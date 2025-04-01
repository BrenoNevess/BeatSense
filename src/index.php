<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Breno Neves Nascimento">
    <!--Completar dps-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="../src/styles/paginicial.css">
    <title>BeatSense - Ensino de Música</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: url('https://source.unsplash.com/1600x900/?music,notes') center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007FFF;">
        <div class="container">
            <a class="navbar-brand titulo" href="#"><h1>BeatSense</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#teoria">Teoria Musical</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#sobre">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#contato">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="hero-section" style="background-color: rgba(0, 87, 158, 0.205); height: 400px; display: flex; align-items: center; justify-content: center; text-align: center;">
        <h2 style="color: #007FFF; font-family: 'Quantum', sans-serif; font-size: 42px;">Aprenda Teoria Musical de Forma Simples</h2>
    </div>
    
    <div class="container mt-5" id="teoria">
        <h2 class="text-center mb-4">Fundamentos da Teoria Musical</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://source.unsplash.com/400x300/?music,notes" class="card-img-top" alt="Notas Musicais">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #007FFF;">Notas Musicais</h5>
                        <p class="card-text">Entenda as notas musicais, sua formação e aplicação na música.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://source.unsplash.com/400x300/?music,scale" class="card-img-top" alt="Escalas Musicais">
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