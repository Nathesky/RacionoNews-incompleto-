<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono - Log in | Gerente de Comunicação</title>
    <link rel="stylesheet" href="../css/login-gerente.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
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
                <hr>
                <div class="input">
                <label for="email-gerente">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-gerente">
                
                <!-- VERIFICA SE O GERENTE INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-gerente']) || isset($_POST['senha-gerente'])) {
                                 if(strlen($_POST['email-gerente']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>


                <div class="input">
                <label for="senha-gerente">Senha</label>
                <input type="password" placeholder="Informe sua senha" maxlength="16" name="senha-gerente">
                 <!-- VERIFICA SE O GERENTE INFORMOU A SENHA -->
                 <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-gerente']) || isset($_POST['senha-gerente'])) {
                                 if(strlen($_POST['senha-gerente']) == 0) {
                                     echo '<div class="error">*Por favor, informe sua senha.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
         
               
                </div>
                <input type="submit" value="Login" id="submit">

            </form>
            </div>
            </div>
            <?php
                include('../connection/conexao.php');
                    if (isset($_POST['email-gerente']) || isset($_POST['senha-gerente'])) {
                        if (strlen($_POST['email-gerente']) != 0 && strlen($_POST['senha-gerente']) != 0) {
                                $emailGerente = $mysqli->real_escape_string($_POST['email-gerente']);
                                $senhaGerente = $mysqli->real_escape_string($_POST['senha-gerente']);

                                $res = "SELECT * FROM gerente WHERE email_gerente = '$emailGerente' AND senha_gerente = '$senhaGerente' ";
                                $res1 = $mysqli->query($res) or die("Falha na execução do código SQL: " . $mysqli->error);
                                $quantidade = $res1->num_rows;

                                    if ($quantidade == 1) {
                                            $gerente = $res1->fetch_assoc();
                                                if (!isset($_SESSION)) {
                                                    session_start();
                                                }
                                        $_SESSION['id'] = $gerente['id_gerente'];
                                        $_SESSION['email'] = $gerente['email_gerente'];
                                        $_SESSION['nome_gerente'] = $gerente['nome_gerente'];

                                    header("Location: page-gerente.php");

                        } elseif ($quantidade == 0) {

                            $res_nao_liberado = "SELECT * FROM gerente WHERE email_gerente = '$emailGerente' AND senha_gerente = '$senhaGerente'";
                            $res1_nao_liberado = $mysqli->query($res_nao_liberado) or die("Falha na execução do código SQL: " . $mysqli->error);
                            $quantidade_nao_liberado = $res1_nao_liberado->num_rows;
            
                        if ($quantidade_nao_liberado == 1) {
                            echo '<div class="falha">Falha ao logar, nick ou senha incorretos!</div>';
                            }
                        }
                    }
                }
            mysqli_close($mysqli);
        ?>

    </main>


</body>
</head>
<body>
    
</body>
</html>
</html>