<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>

    <?php
    session_start();
    $arquivo = "catalogo.php";
    $usuario = $_SESSION["usuario"] ?? null;

    if(is_null($usuario)){
        header("Location: login.php");
        exit;
    }

    if (file_exists($arquivo)) {
        include $arquivo;
        $album = $catalogo['Albuns'];
    } else {
        $album = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nome'], $_POST['Artista'], $_POST['Genero'], $_POST['Ano'])) {
        $novoAlbum = [
            'Nome' => $_POST['Nome'],
            'CategoriaFiltro' => $_POST['CategoriaFiltro'] ?? 'Outro',
            'Artista' => $_POST['Artista'],
            'Genero' => $_POST['Genero'],
            'Ano' => $_POST['Ano'],
            'CoverAlbum' => $_POST['CoverAlbum'] ?? '',
            'Descricao' => $_POST['Descricao'] ?? '',
            'Faixas' => []
        ];
        $album[] = $novoAlbum;

        $catalogo['Albuns'] = $album;
        $conteudo = "<?php\n\$catalogo = " . var_export($catalogo, true) . ";\n";
        file_put_contents($arquivo, $conteudo);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['N°'], $_POST['Nome'], $_POST['Duracao'], $_POST['AlbumIndex'])) {
        $novaFaixa = [
            'N°' => $_POST['N°'],
            'Nome' => $_POST['Nome'],
            'Duracao' => $_POST['Duracao'],
            'Cover' => $_POST['Cover'] ?? ''
        ];
    
        $albumIndex = (int)$_POST['AlbumIndex'];
        if (isset($album[$albumIndex])) {
            array_push($album[$albumIndex]['Faixas'], $novaFaixa);
    
            $catalogo['Albuns'] = $album;
            $conteudo = "<?php\n\$catalogo = " . var_export($catalogo, true) . ";\n";
            file_put_contents($arquivo, $conteudo);
        }
    }
    ?>

</head>
<body>
<div class="main">
    <?php include("header.php");
    
    $novoAlbum = $_POST["nomeAlbum"] ?? null;
    if(!is_null($novoAlbum) && !empty($novoAlbum)){
        $_SESSION['Albuns'][] = $novoAlbum;
    }
    ?>
    <div class="adminConteudo">
        <div class="formAdminAlbum">
            <form action="" method="post">
                Nome: <input type="text" name="Nome" required>
                Artista: <input type="text" name="Artista" required>
                Gênero: <input type="text" name="Genero" required>
                Ano: <input type="number" name="Ano" required>
                Categoria: Album | Single | EPs  <input type="text" name="CategoriaFiltro" required>
                Capa do Album/Single/EP: <input type="file" name="CoverAlbum" accept="image/*" required>
                Descrição: <textarea name="Descricao"></textarea>
            </form>
        </div>
        <div class="formAdminFaixas">
            <form action="" method="post">
                Index do álbum<input type="number" name="AlbumIndex" value="0">
                N°: <input type="number" name="N°" required>
                Nome: <input type="text" name="Nome" required>
                Duração: <input type="time" name="Duracao" required>
                Capa da Faixa: <input type="file" name="Cover" accept="image/*" required>
            <input type="submit" value="Adicionar Álbum e/ou Faixa">
            </form>
        </div>

        <?php foreach ($album as $album): ?>
            <div class="adminAlbum">
                <h1><?php echo $album['Nome']; ?></h1>
                <p>Artista: <?php echo $album['Artista']; ?></p>
                <p>Gênero: <?php echo $album['Genero']; ?></p>
                <p>Ano: <?php echo $album['Ano']; ?></p>
                <img src="<?php echo $album['CoverAlbum']; ?>" alt="<?php echo $album['Nome']; ?>">
                
                <div class="adminFaixas">
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
</div>
</body>
</html>