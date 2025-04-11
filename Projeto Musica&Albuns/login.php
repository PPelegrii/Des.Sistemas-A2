<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="main">
    <?php include("header.php"); ?>

    <div class="formLogin"> 
        <form action="" method="post">
            Usuario: <input type="text" name="usuario">
            Senha: <input type="text" name="senha">
            <input type="submit" value="Fazer Login">
        </form>  
    </div>

<?php
    session_start();

    $usuarios = [
        "admin" => password_hash("blah", PASSWORD_DEFAULT)
    ];

    if (isset($_SESSION["usuario"])){
        header("Location: index.php");
        exit;
    }

    $usuario = $_POST["usuario"] ?? null;
    $senha = $_POST["senha"] ?? null;

    if(!is_null($usuario) && !is_null($senha) && isset($usuarios[$usuario])){
        if(password_verify($senha, $usuarios[$usuario])){
            $_SESSION["usuario"] = $usuario;
            header("Location: protected.php");
            exit;
        }else{
            die("<h1>Senha incorreta!</h1>");
        }
    }else{
        echo "<h2>Fazer Login</h2>";
    }
?>
</div>

</body>
</html>