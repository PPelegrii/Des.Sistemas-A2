<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <?php include("header.html"); ?>

    <div class="conteudo"> 
        <form action="" method="post">
            Usuario: <input type="text" name="usuario">
            Senha: <input type="text" name="senha">
            <input type="submit" value="Fazer Login">
        </form>  
    </div>

<?php
    session_start();
    $usuario = $_SESSION["usuario"] ?? null;
    if(!is_null($usuario)){
        header("Location: index.php");
    }

    $usuario = $_POST["usuario"] ?? null;
    $senha = $_POST["senha"] ?? null;

    if(!is_null($usuario) && !is_null($senha)){
        if($usuario === "admin" && $senha === "123"){
            $_SESSION["usuario"] = $usuario;
            header("Location: protected.php");

        }else{
            header("Location: index.php");
        }
    }else{
        echo "Fazer Login";
    }
?>
</div>

</body>
</html>