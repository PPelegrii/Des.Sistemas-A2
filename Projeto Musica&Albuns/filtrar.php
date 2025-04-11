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
    <link rel="stylesheet" href="style.css">
    <title>Filtrar</title>
</head>
<body>
<div class="main">
    <?php include("header.php"); ?>

    <div class="conteudo">
        
    </div>
</div>

</body>
</html>