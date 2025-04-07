<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php
    session_start();
    $arquivo = "catalogo.json";
    $usuario = $_SESSION["usuario"] ?? null;

    if(is_null($usuario)){
        header("Location: login.php");
    }

    if (file_exists($arquivo)) {
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
        $album = $dados['Albuns'];
    } else {
        $album = [];
    }
    ?>

</head>
<body>
    <div class="main">
        <?php include("header.html")?>

        <div class="adminAlbum">
            <form action="" method="post">
                Nome <input type="text" name="Nome">
                Artista <input type="text" name="Artista">
                Genero <input type="text" name="Genero">
                Ano <input type="number" name="Ano">
                <input type="submit" value="Enviar">
            </form>
        </div>
        <div class="adminFaixas">
            <form action="" method="post">
                N° <input type="number" name="N°">
                Nome <input type="text" name="Nome">
                Duração <input type="time" name="Duracao">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    <?php
    $novoAlbum = $_POST["nomeAlbum"] ?? null;
    if(!is_null($novoAlbum) && !empty($novoAlbum)){
        $_SESSION['Albuns'][] = $novoAlbum;
    }
    ?>
    <div class="conteudo">
        <?php foreach ($album as $album): ?>
        <div class="album">
            <h1><?php echo $album['Nome']; ?></h1>
            <p>Artista: <?php echo $album['Artista']; ?></p>
            <p>Gênero: <?php echo $album['Genero']; ?></p>
            <p>Ano: <?php echo $album['Ano']; ?></p>
            <img src="<?php echo $album['CoverAlbum']; ?>" alt="<?php echo $album['Nome']; ?>">

            <div class="faixas">
                <?php foreach ($album['Faixas'] as $faixa): ?>
                    <div class="item">
                        <p>Faixa <?php echo $faixa['N°']; ?></p>
                        <h2><?php echo $faixa['Nome']; ?></h2>
                        <p>Duração: <?php echo $faixa['Duracao']; ?> minutos</p>
                        <img src="<?php echo $faixa['Cover']; ?>" alt="<?php echo $faixa['Nome']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

</body>
</html>