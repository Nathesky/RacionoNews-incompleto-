<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono - Log in VIP</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
    <link rel="shortcut icon">
</head>
    <body> 
        <header>
        <a href="../index.php">
        <div class="voltar">
            <h6>ᐸ</h6>
            <h6>Voltar</h6>
        </div>
        </a>
        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
            <div class="ranew">
            <p id="ranews"> Raciono </p>
            <p id="ranews">News</p>
            </div>
        </div>
    
        <div></div>
    </header>

    <main>
        <div class="container">
            <div class="cadastro">
            <form method="POST">
                <h1>Faça seu Log in</h1>
                <h4>e escreva suas matérias</h4>
                <hr>
                <div class="input">
                <label for="email-jornalist">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-jornalist">
                
                <!-- VERIFICA SE O JORNALISTA INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist'])) {
                                 if(strlen($_POST['email-jornalist']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>


                <div class="input">
                <label for="senha-jornalist">Senha</label>
                <input type="password" placeholder="Informe sua senha" maxlength="16" name="senha-jornalist">
                 <!-- VERIFICA SE O JORNALISTA INFORMOU A SENHA -->
                 <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist'])) {
                                 if(strlen($_POST['senha-jornalist']) == 0) {
                                     echo '<div class="error">*Por favor, informe sua senha.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                <label id="a">não tem conta raciono?  <a href="registro-jornalist.php"> cadastre-se aqui. </a></label> 
               
                </div>
                <input type="submit" value="Login" id="submit">

            </form>
            </div>
            </div>
            <?php
                include('../connection/conexao.php');
                    if (isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist'])) {
                        if (strlen($_POST['email-jornalist']) != 0 && strlen($_POST['senha-jornalist']) != 0) {
                                $emailJornalist = $mysqli->real_escape_string($_POST['email-jornalist']);
                                $senhaJornalist = $mysqli->real_escape_string($_POST['senha-jornalist']);
                                $liberaJornalist = 'SIM';

                                $res = "SELECT * FROM jornalist WHERE email_jornalist = '$emailJornalist' AND senha_jornalist = '$senhaJornalist' AND liberado_jornalist = '$liberaJornalist'";
                                $res1 = $mysqli->query($res) or die("Falha na execução do código SQL: " . $mysqli->error);
                                $quantidade = $res1->num_rows;

                                    if ($quantidade == 1) {
                                            $jornalist = $res1->fetch_assoc();
                                                if (!isset($_SESSION)) {
                                                    session_start();
                                                }
                                        $_SESSION['id'] = $jornalist['id_jornalist'];
                                        $_SESSION['email'] = $jornalist['email_jornalist'];
                                        $_SESSION['nome_jornalist'] = $jornalist['nome_jornalist'];

                                    header("Location: escrever.php");

                        } elseif ($quantidade == 0) {

                            $res_nao_liberado = "SELECT * FROM jornalist WHERE email_jornalist = '$emailJornalist' AND senha_jornalist = '$senhaJornalist'";
                            $res1_nao_liberado = $mysqli->query($res_nao_liberado) or die("Falha na execução do código SQL: " . $mysqli->error);
                            $quantidade_nao_liberado = $res1_nao_liberado->num_rows;
            
                        if ($quantidade_nao_liberado == 1) {
                            echo '<div class="falha-lib">Liberação de acesso pendente</div>';
                        } else{
                            echo '<div class="falha">Falha ao logar, nick ou senha incorretos!</div>';
                            }
                        }
                    }
                }
            mysqli_close($mysqli);
        ?>

    </main>


</>
</head>
<body>
    
</body>
</html>