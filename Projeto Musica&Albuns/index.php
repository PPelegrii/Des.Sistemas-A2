<?php 

session_start();
$arquivo = "catalogo.json";

if (file_exists($arquivo)) {
    $json = file_get_contents($arquivo);
    $dados = json_decode($json, true);
    $album = $dados['Albuns'];
} else {
    $album = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <?php include("header.html"); ?>

    <div class="conteudo">
        <?php foreach ($album as $item): ?>
        <div class="album">
            <h1><?php echo $item['Nome']; ?></h1>
            <p>Artista: <?php echo $item['Artista']; ?></p>
            <p>Gênero: <?php echo $item['Genero']; ?></p>
            <p>Ano: <?php echo $item['Ano']; ?></p>
            <img src="<?php echo $item['CoverAlbum']; ?>" alt="<?php echo $item['Nome']; ?>">

            <div class="faixas">
                <?php foreach ($item['Faixas'] as $faixa): ?>
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
</div>
</body>
</html>