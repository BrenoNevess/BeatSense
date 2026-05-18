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

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background-color: #121212;
    color: white;
    font-family: Arial;
}

.container-box{
    background: #1f1f1f;
    padding: 30px;
    border-radius: 15px;
    margin-top: 40px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.5);
}

img{
    border-radius: 10px;
}

</style>

</head>
<body>

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

</body>
</html>