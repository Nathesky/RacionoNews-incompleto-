<?php
session_start();
if (!isset($_SESSION['nome_jornalist'])) {
    header("Location: index.php"); 
    exit();
}

$nome_jornalist = $_SESSION['nome_jornalist'];
session_write_close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escrever Nova Matéria | Raciono</title>
    <!-- <link rel="stylesheet" href="../css/escrever.css"> -->
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
    <!-- <script src="../javascript/javascript.js" defer></script> -->
</head>
<body>
    <header>

        <div class="menu">
            <button id="butaomenu"></button>
        </div>

        <a href="../index.php">
        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
            <div class="ranew">
            <p id="ranews"> Raciono </p>
            <p id="ranews">News</p>
            </div></div>
            </a>

        <div class="login">
        <p>Olá, <?php echo $nome_jornalist; ?> </p>
        </div>    
    </header>

    <div class="content">

        <main>
        <div class="container">
            <section class="manchete">
                <form action="escrever.php" method="POST" enctype="multipart/form-data">
                <label for="manchete">Manchete</label>
                <input type="text" maxlength="100" placeholder="Informe a manchete da matéria..." id="manchete" name="input-manchete">
                <!-- VERIFICA SE O JORNALISTA INFORMOU A MANCHETE -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['input-manchete']) || isset($_POST['input-previa'])) {
                                 if(strlen($_POST['input-manchete']) == 0) {
                                     echo '<div class="error">*Por favor, informe a manchete.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                
                <label for="previa">Prévia</label>
                <input type="text" maxlength="200" placeholder="Informe a prévia da matéria..." id="previa" name="input-previa">
                <!-- VERIFICA SE O JORNALISTA INFORMOU A PREVIA -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['input-manchete']) || isset($_POST['input-previa'])) {
                                 if(strlen($_POST['input-previa']) == 0) {
                                     echo '<div class="error">*Por favor, informe a previa.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                <label for="imagem">Selecione a imagem</label>
                <input type="file" name="input-imagem" accept="image/*">
            
                    <div>
                    <textarea name="ordem1" class="paragrafos" cols="30" rows="3"></textarea>
                    </div>
                    <div>
                    <textarea name="ordem2" class="paragrafos" cols="30" rows="3"></textarea>
                    </div>
                    <textarea name="ordem3" class="paragrafos" cols="30" rows="3"></textarea>
                    <div>
                    <textarea name="ordem4" class="paragrafos" cols="30" rows="3"></textarea>
                    </div>
                    <div>
                    <textarea name="ordem5" class="paragrafos" cols="30" rows="3"></textarea>
                    </div>
                    <div>
                    <textarea name="ordem6" class="paragrafos" cols="30" rows="3"></textarea>
                    </div>

                    <input type="submit" value="enviar" id="submit">

                </form>
            </section>

            <?php
session_start();

if (!isset($_SESSION['nome_jornalist'])) {
    header("Location: index.php");
    exit();
}

$nome_jornalist = $_SESSION['nome_jornalist'];
$id_jornalist = $_SESSION['id'];
include('../connection/conexao.php');

if (isset($_FILES["input-imagem"]) && !empty($_FILES["input-imagem"])) {
    $imagem = "../assets/images" . $_FILES["input-imagem"]["name"];
    move_uploaded_file($_FILES["input-imagem"]["tmp_name"], "../assets/images/" . $_FILES["input-imagem"]["name"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manchete = $_POST["input-manchete"];
    $previa = $_POST["input-previa"];

    if (strlen($manchete) && strlen($previa) != 0) {
        $query = "INSERT INTO materias (manchete, previa, id_jornalist, imagem) VALUES ('$manchete', '$previa', '$id_jornalist', '$imagem')";
        if (mysqli_query($mysqli, $query)) {
            $id_materia = mysqli_insert_id($mysqli);
            echo '<div class="sucesso">tudo perfeitinho</div>';
        } else {
            echo '<div class="erro">Erro ao inserir a matéria</div>';
        }
    }

    if (isset($_POST['ordem1']) && isset($_POST['ordem2']) && isset($_POST['ordem3']) && isset($_POST['ordem4']) && isset($_POST['ordem5']) && isset($_POST['ordem6'])) {
        for ($i = 1; $i <= 6; $i++) {
            $texto = $_POST["ordem$i"];
            $query_paragrafo = "INSERT INTO paragrafos (id_materia, ordem, texto) VALUES ('$id_materia', '$i', '$texto')";
            mysqli_query($mysqli, $query_paragrafo);
        }
    }

    mysqli_close($mysqli);
}
?>


        </div>
        </main>

        <aside class="sidebar" >
            <div id="menuSidebar">
            <nav class="menuNav">
                <ul id="menuOptions">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="login-jornalist.php">Escrever Matéria</a></li>
                    <li><a href="login-gerente.php">Página Gerente</a></li>
                    <li><a href="login-adm.php">Página Administrador</a></li>
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