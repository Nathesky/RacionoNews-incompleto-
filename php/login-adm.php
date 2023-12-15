<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono - Log in | Administrador </title>
    <link rel="stylesheet" href="../css/login-adm.css">
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
                <label for="email-adm">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-adm">
                
                <!-- VERIFICA SE O ADM INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-adm']) || isset($_POST['senha-adm'])) {
                                 if(strlen($_POST['email-adm']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>


                <div class="input">
                <label for="senha-adm">Senha</label>
                <input type="password" placeholder="Informe sua senha" maxlength="16" name="senha-adm">
                 <!-- VERIFICA SE O ADM INFORMOU A SENHA -->
                 <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-adm']) || isset($_POST['senha-adm'])) {
                                 if(strlen($_POST['senha-adm']) == 0) {
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
                    if (isset($_POST['email-adm']) || isset($_POST['senha-adm'])) {
                        if (strlen($_POST['email-adm']) != 0 && strlen($_POST['senha-adm']) != 0) {
                                $emailAdm = $mysqli->real_escape_string($_POST['email-adm']);
                                $senhaAdm = $mysqli->real_escape_string($_POST['senha-adm']);


                                $res = "SELECT * FROM adm WHERE email_adm = '$emailAdm' AND senha_adm = '$senhaAdm'";
                                $res1 = $mysqli->query($res) or die("Falha na execução do código SQL: " . $mysqli->error);
                                $quantidade = $res1->num_rows;

                                    if ($quantidade == 1) {
                                            $adm = $res1->fetch_assoc();
                                                if (!isset($_SESSION)) {
                                                    session_start();
                                                }
                                        $_SESSION['id'] = $adm['id_adm'];
                                        $_SESSION['email'] = $adm['email_adm'];
                                        $_SESSION['nome_adm'] = $adm['nome_adm'];

                                    header("Location: page-adm.php");

                        } if ($quantidade == 0) {
                            echo '<div class="falha">Falha ao logar, email ou senha incorretos!</div>';
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