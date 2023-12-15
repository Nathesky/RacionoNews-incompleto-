<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono | Log in - Usuários</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../assets/images/raciono-icon.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
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
                <h1>Faça seu Log in </h1>
                <h4>e tenha acesso às matérias</h4>
                <hr>
                <div class="input">
                <label for="email-user">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-user">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-user']) || isset($_POST['senha-user'])) {
                                 if(strlen($_POST['email-user']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>


                <div class="input">
                <label for="senha-user">Senha</label>
                <input type="password" placeholder="Informe sua senha" maxlength="16" name="senha-user">
                 <!-- VERIFICA SE O USUÁRIO INFORMOU A SENHA -->
                 <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-user']) || isset($_POST['senha-user'])) {
                                 if(strlen($_POST['senha-user']) == 0) {
                                     echo '<div class="error">*Por favor, informe sua senha.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                <label id="a">não tem conta raciono?  <a href="registro-user.php"> cadastre-se aqui. </a></label> 
               
                </div>
                <input type="submit" value="Login" id="submit">

            </form>
            </div>
            </div>
            <?php
                include('../connection/conexao.php');
                    if (isset($_POST['email-user']) || isset($_POST['senha-user'])) {
                        if (strlen($_POST['email-user']) != 0 && strlen($_POST['senha-user']) != 0) {
                                $emailUser = $mysqli->real_escape_string($_POST['email-user']);
                                $senhaUser = $mysqli->real_escape_string($_POST['senha-user']);
                                $liberaUser = 'SIM';

                                $res = "SELECT * FROM usuario WHERE email_user = '$emailUser' AND senha_user = '$senhaUser' AND liberado_user = '$liberaUser'";
                                $res1 = $mysqli->query($res) or die("Falha na execução do código SQL: " . $mysqli->error);
                                $quantidade = $res1->num_rows;

                                    if ($quantidade == 1) {
                                            $user = $res1->fetch_assoc();
                                                if (!isset($_SESSION)) {
                                                    session_start();
                                                }
                                        $_SESSION['id'] = $user['id_user'];
                                        $_SESSION['email'] = $user['email_user'];
                                        $_SESSION['nome_do_usuario'] = $user['nome_user'];
                                        $_SESSION['logged_in'] = true;

                                    header("Location: ../index.php");

                        } elseif ($quantidade == 0) {

                            $res_nao_liberado = "SELECT * FROM usuario WHERE email_user = '$emailUser' AND senha_user = '$senhaUser'";
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


</body>
</html>