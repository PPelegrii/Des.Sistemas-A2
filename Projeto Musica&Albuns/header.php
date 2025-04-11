<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>
<style>
    body{
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    header{
        display: flex;
        width: 100%;
        flex-direction: row;
        background-color: rgb(48, 20, 66);
        justify-content: center;
    }
    nav{
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        width: 100%;
    }
    a{
        font-size: 20px;
        color: white;
        padding-right: 15px;
        text-decoration: none;
    }
</style>
<body>
    <header>
        <nav>
            <a href="http://localhost/Des.Sistemas-A2/Projeto%20Musica&Albuns/index.php">Index</a>
            <a href="http://localhost/Des.Sistemas-A2/Projeto%20Musica&Albuns/login.php">Login</a>
            <a href="http://localhost/Des.Sistemas-A2/Projeto%20Musica&Albuns/logout.php" class="logout">Logout</a>
        </nav>
    </header>
</body>
</html>
