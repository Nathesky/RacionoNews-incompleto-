<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../assets/images/raciono-icon.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
</head>
<body>
<header>
        <a href="login-user.php">
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
                <label for="email-user">E-mail</label>
                <input type="email" placeholder="Informe seu e-mail" maxlength="90" name="email-user">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-user']) || isset($_POST['senha-user']) || isset($_POST['nome-user'])) {
                                 if(strlen($_POST['email-user']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="nome-user">Nome Completo</label>
                <input type="text" placeholder="Informe o seu Nome Completo" maxlength="80" name="nome-user">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O NOME -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-user']) || isset($_POST['senha-user']) || isset($_POST['nome-user'])) {
                                 if(strlen($_POST['nome-user']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu nome.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="senha-user">Criar Senha</label>
                <input type="password" placeholder="Crie sua senha" maxlength="16" name="senha-user">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU A SENHA -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-user']) || isset($_POST['senha-user']) || isset($_POST['nome-user'])) {
                                 if(strlen($_POST['senha-user']) == 0) {
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
                            $emailUser = $_POST["email-user"];
                            $nomeUser = $_POST["nome-user"];
                            $senhaUser = $_POST["senha-user"];

                                if (strlen($emailUser) && strlen($nomeUser) && strlen($senhaUser) != 0) {
                                    $query = "INSERT INTO usuario (nome_user, email_user, senha_user, liberado_user) VALUES ('$nomeUser', '$emailUser', '$senhaUser', 'NAO')";
                                        if (mysqli_query($mysqli, $query)) {
                                            echo '<div class="sucesso">Cadastro realizado com sucesso (requer liberação do adm)</div>';
                                        } 
                                    }
                            $id_user = mysqli_insert_id($mysqli);
                            mysqli_close($mysqli);
                        }
        ?> 
        
    </main>
</body>
</html>