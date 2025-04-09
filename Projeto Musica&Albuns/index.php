<?php

session_start();
$arquivo = "catalogo.php";

if (file_exists($arquivo)) {
    include $arquivo;
    $album = $catalogo['Albuns'];
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

            <form method="GET" action="detalhes.php">
                <input type="hidden" name="album" value="<?php echo ($item['Nome']); ?>">
                <button type="submit" class="button">Ver mais</button>
            </form>

        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>