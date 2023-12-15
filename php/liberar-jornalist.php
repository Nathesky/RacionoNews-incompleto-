<?php
session_start();
if (!isset($_SESSION['nome_adm'])) {
    header("Location: index.php"); 
    exit();
}

$nome_adm = $_SESSION['nome_adm'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liberar Jornalistas | Administrador </title>
    <link rel="stylesheet" href="../css/liberar.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
</head>

<body>
    <header>

    <a href="page-adm.php">
        <div class="voltar">
            <h6>ᐸ</h6>
            <h6>Voltar</h6>
        </div>
        </a>

        <a href="../index.php">
        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono">
            <div class="ranew">
                <p id="ranews"> Raciono </p>
                <p id="ranews">News</p>
            </div>
        </div>
        </a>
        <div class="welcome">
            <p>Olá, <?php echo $nome_adm; ?> </p>
        </div>

    </header>

    <main>
        <div class="content">
            <div class="tabela">
                <div class="coluna">Email</div>
                <div class="id-user">Id Jornalista</div> 
                <div class="situacao">Situação</div>
        
                    <?php
                        include('../connection/conexao.php');
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['liberar'])) {
                                 $idJornalist = $_POST['id_jornalist'];
        
                                $query = "UPDATE jornalist SET liberado_jornalist = 'SIM' WHERE id_jornalist = $idJornalist";
                                mysqli_query($mysqli, $query);
                                }
                            }
        
                        $res = mysqli_query($mysqli, "SELECT * FROM jornalist");
        
                            while ($escrever = mysqli_fetch_array($res)) {
                                echo '<div>' . $escrever['nome_jornalist'] . '</div>';
                                echo '<div>' . $escrever['id_jornalist'] . '</div>';
            
                                if ($escrever['liberado_jornalist'] == 'NAO') {
                                     echo '<form method="POST">';
                                     echo '<input type="hidden" name="id_jornalist" value="' . $escrever['id_jornalist'] . '">';
                                     echo '<div class="liberar">
                                           <button type="submit" name="liberar" id="liberar">Liberar acesso</button>
                                           </div>';
                                     echo '</form>';
                                } else {
                                echo '<div class="liberado-mensagem">Acesso já liberado</div>';
                            }
                        }
                    mysqli_close($mysqli);
                    ?>
            </div>
        </div>
        
    </main>
</body>

</html>