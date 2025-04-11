<?php 

session_start();
$arquivo = "catalogo.php";

if (file_exists($arquivo)) {
    include $arquivo;
    $album = $catalogo['Albuns'];
} else {
    die("Erro: O arquivo catalogo.php não foi encontrado.");
}

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$albunsFiltrados = [];

if ($categoria) {
    foreach ($album as $item) {
        if ($item['CategoriaFiltro'] === $categoria) {
            $albunsFiltrados[] = $item;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Filtrar</title>
</head>
<body>
    
<div class="main">
    <?php include("header.php"); ?>
    <h1>Filtrando por: <?php echo $categoria; ?></h1>

    <div class="conteudo">

        <?php if (!empty($albunsFiltrados)): ?>
            <?php foreach ($albunsFiltrados as $item): ?>
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
        <?php else: ?>
            <p>Nenhum álbum encontrado para a categoria selecionada.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>