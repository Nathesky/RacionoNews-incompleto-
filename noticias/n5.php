<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <link rel="stylesheet" href="../css/noticia.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
    <script src="../javascript/javascript.js" defer></script>
</head>
<body>
    <header>

        <div class="menu">
            <button id="butaomenu"></button>
        </div>

        <a href="../index.php" class="href">
        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
            <div class="ranew">
            <p id="ranews"> Raciono </p>
            <p id="ranews">News</p>
            </div></div>
            </a>
            <div class="welcome">
                <p>Olá, <?php echo $_SESSION['nome_do_usuario']; ?> </p>
            </div>   
    </header>

    <div class="content">

    <?php
include('../connection/conexao.php');

// Consulta para obter os dados da matéria
$query_materia = "SELECT manchete, previa, imagem FROM materias WHERE id_materia = SEU_ID_AQUI";
$result_materia = mysqli_query($mysqli, $query_materia);

if ($result_materia && mysqli_num_rows($result_materia) > 0) {
    $row_materia = mysqli_fetch_assoc($result_materia);

    $manchete = $row_materia['manchete'];
    $previa = $row_materia['previa'];
    $imagem = $row_materia['imagem'];
}
?>

<main>
    <div class="container">
        <h1 class="titulo"><?php echo $manchete; ?></h1>
        <p class="first-letter-multiple-lines"><?php echo $previa; ?></p>

        <section>
            <img src="<?php echo $imagem; ?>" alt="Imagem Principal" id="imagem-principal">
        </section>

        <hr id="hr1">

        <?php
        // Consulta para obter os dados dos parágrafos
        $query_paragrafos = "SELECT texto FROM paragrafos WHERE id_materia = SEU_ID_AQUI ORDER BY ordem";
        $result_paragrafos = mysqli_query($mysqli, $query_paragrafos);

        if ($result_paragrafos && mysqli_num_rows($result_paragrafos) > 0) {
            while ($row_paragrafo = mysqli_fetch_assoc($result_paragrafos)) {
                $texto_paragrafo = $row_paragrafo['texto'];
                echo "<p class='paragrafos'>$texto_paragrafo</p>";
            }
        }
        ?>
    </div>
</main>
<?php
mysqli_close($mysqli);
?>


        <aside class="sidebar" >
            <div id="menuSidebar">
            <nav class="menuNav">
                <ul id="menuOptions">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../php/escrever.php">Escrever Matéria</a></li>
                    <li><a href="#">Página Gerente</a></li>
                    <li><a href="#">Página Administrador</a></li>
                </ul>
            </nav>
        </div>
        </aside>


        <aside class="ads">

        </aside>
    </div>
    
    <footer>
        <ul>
            <li>@ 2023 Raciono News Company RNCo</li>
        </ul>
    </footer>

</body>
</html>