<?php
$dados = null;
$erro = "";

if(isset($_GET['artista']) && !empty($_GET['artista'])){

    $artista = urlencode($_GET['artista']);

    $url = "https://www.theaudiodb.com/api/v1/json/2/search.php?s=$artista";

    $resposta = @file_get_contents($url);

    if($resposta !== false){

        $dados = json_decode($resposta, true);

        if(empty($dados['artists'])){
            $erro = "Artista não encontrado.";
        }

    }else{
        $erro = "Erro ao conectar com a API.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Explorador Musical - BeatSense</title>

<?php $themeBase = ''; include __DIR__ . '/View/partials/theme-head.php'; ?>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

<style>

body{
    background-color: var(--bs-bg-page);
    color: var(--bs-text-primary);
    font-family: Arial;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.container-box{
    background: var(--bs-surface);
    padding: 30px;
    border-radius: 15px;
    margin-top: 40px;
    box-shadow: 0px 0px 15px var(--bs-shadow-color);
    transition: background-color 0.3s ease;
}

img{
    border-radius: 10px;
}

</style>

</head>
<body>

<?php $themeToggleClass = 'theme-toggle--fixed'; include __DIR__ . '/View/partials/theme-toggle.php'; ?>

<div class="container">

    <div class="container-box">

        <h1 class="mb-4 text-center">🎼 Explorador Musical</h1>

        <form method="GET">

            <div class="input-group mb-4">

                <input 
                    type="text" 
                    name="artista" 
                    class="form-control"
                    placeholder="Digite o nome do artista"
                    required
                >

                <button class="btn btn-success">
                    Pesquisar
                </button>

            </div>

        </form>

        <?php if($erro != ""): ?>

            <div class="alert alert-danger">
                <?= $erro ?>
            </div>

        <?php endif; ?>

        <?php
        if($dados && !empty($dados['artists'])):

            $artista = $dados['artists'][0];
        ?>

            <div class="row">

                <div class="col-md-4 text-center">

                    <img 
                        src="<?= $artista['strArtistThumb'] ?>"
                        class="img-fluid"
                    >

                </div>

                <div class="col-md-8">

                    <h2><?= $artista['strArtist'] ?></h2>

                    <p>
                        <strong>Gênero:</strong>
                        <?= $artista['strGenre'] ?>
                    </p>

                    <p>
                        <strong>País:</strong>
                        <?= $artista['strCountry'] ?>
                    </p>

                    <p>
                        <strong>Estilo:</strong>
                        <?= $artista['strStyle'] ?>
                    </p>

                    <hr>

                    <p>

                    <?=
                    !empty($artista['strBiographyPT'])
                    ?
                    $artista['strBiographyPT']
                    :
                    $artista['strBiographyEN']
                    ?>

                    </p>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php include __DIR__ . '/View/partials/theme-scripts.php'; ?>
</body>
</html>