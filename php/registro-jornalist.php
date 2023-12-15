<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono - Criar conta VIP</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
</head>

<header>
        <a href="login-jornalist.php">
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
                <h1>Crie sua Conta Raciono</h1>
                <hr>
                <div class="input">
                <label for="email-jornalist">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-jornalist">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist']) || isset($_POST['nome-jornalist'])) {
                                 if(strlen($_POST['email-jornalist']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="nome-jornalist">Nome Completo</label>
                <input type="text" placeholder="Informe o seu Nome Completo" maxlength="80" name="nome-jornalist">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O NOME -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist']) || isset($_POST['nome-jornalist'])) {
                                 if(strlen($_POST['nome-jornalist']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu nome.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="senha-jornalist">Criar Senha</label>
                <input type="password" placeholder="Crie sua senha" maxlength="16" name="senha-jornalist">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU A SENHA -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-jornalist']) || isset($_POST['senha-jornalist']) || isset($_POST['nome-jornalist'])) {
                                 if(strlen($_POST['senha-jornalist']) == 0) {
                                     echo '<div class="error">*Por favor, crie uma senha.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>
                <input type="submit" value="Criar Conta" id="submit">

            </form>
            </div>
            </div>

          <?php 
                include('../connection/conexao.php');

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $emailJornalist = $_POST["email-jornalist"];
                            $nomeJornalist = $_POST["nome-jornalist"];
                            $senhaJornalist = $_POST["senha-jornalist"];

                                if (strlen($emailJornalist) && strlen($nomeJornalist) && strlen($senhaJornalist) != 0) {
                                    $query = "INSERT INTO jornalist (nome_jornalist, email_jornalist, senha_jornalist, liberado_jornalist) VALUES ('$nomeJornalist', '$emailJornalist', '$senhaJornalist', 'NAO')";
                                        if (mysqli_query($mysqli, $query)) {
                                            echo '<div class="sucesso">Cadastro realizado com sucesso (requer liberação do adm)</div>';
                                        } 
                                    }
                            $id_jornalist = mysqli_insert_id($mysqli);
                            mysqli_close($mysqli);
                        }
        ?> 
        
    </main>
</body>
</html>
    
</body>
</html>