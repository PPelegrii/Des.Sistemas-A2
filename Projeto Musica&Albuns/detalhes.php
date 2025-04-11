<?php 

session_start();
$arquivo = "catalogo.php";

if (file_exists($arquivo)) {
    include $arquivo;
    $album = $catalogo['Albuns'];
} else {
    die("Erro: O arquivo catalogo.php não foi encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Detalhes</title>
</head>
<body>
<div class="main">
    <?php include("header.php"); ?>

    <div class="conteudo">
    <?php

    if (isset($_GET['album'])) {
    $nomeAlbum = $_GET['album'];
    $albumEncontrado = null;

    foreach ($catalogo['Albuns'] as $album) {
        if ($album['Nome'] === $nomeAlbum) {
            $albumEncontrado = $album;
            break;
        }
    }
    ?>
    <?php if ($albumEncontrado): ?>
        <div class="albumDetalhes">
            <a href="http://localhost/Des.Sistemas-A2/Projeto%20Musica&Albuns/index.php">--- Voltar ---</a>
            <h1><?php echo $albumEncontrado['Nome']; ?></h1>
            <p>Artista: <?php echo $albumEncontrado['Artista']; ?></p>
            <p>Gênero: <?php echo $albumEncontrado['Genero']; ?></p>
            <p>Ano: <?php echo $albumEncontrado['Ano']; ?></p>
            <img src="<?php echo $albumEncontrado['CoverAlbum']; ?>" alt="<?php echo $albumEncontrado['Nome']; ?>">
            <iframe class="player"width="500" height="280"
                src="https://www.youtube.com/embed/<?php echo $albumEncontrado['Video']; ?>"
                title="YTube video player" frameborder="0" allow="autoplay; gyroscope;">
            </iframe>
            <p>Descrição: <?php echo $albumEncontrado['Descricao']; ?></p>

            <div class="faixas">
                <?php foreach ($albumEncontrado['Faixas'] as $faixa): ?>
                    <div class="item">
                        <p>Faixa <?php echo $faixa['N°']; ?></p>
                        <h2><?php echo $faixa['Nome']; ?></h2>
                        <p>Duração: <?php echo $faixa['Duracao']; ?> minutos</p>
                        <img src="<?php echo $faixa['Cover']; ?>" alt="<?php echo $faixa['Nome']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php else: ?> <p>Álbum não encontrado.</p> <?php  endif; ?>
        <?php } ?>
    </div>
</div>

</body>
</html>