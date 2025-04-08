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
    <title>Filtrar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <?php include("header.html"); ?>

    <div class="conteudo">
        
    </div>
</div>

</body>
</html>