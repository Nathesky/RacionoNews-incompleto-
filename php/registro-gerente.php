<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Raciono | Nível Gerencial</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../assets/images/raciono-icon.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
</head>
<body>
<header>
        <a href="page-adm.php">
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
                <h1>Criar Conta Raciono Nível Gerencial</h1>
                <hr>
                <div class="input">
                <label for="email-gerente">E-mail</label>
                <input type="email" placeholder="Informe o e-mail" maxlength="90" name="email-gerente">
                
                <!-- VERIFICA SE O ADM INFORMOU O EMAIL -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-gerente']) || isset($_POST['senha-gerente']) || isset($_POST['nome-gerente'])) {
                                 if(strlen($_POST['email-gerente']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu email.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="nome-gerente">Nome Completo</label>
                <input type="text" placeholder="Informe o Nome Completo" maxlength="80" name="nome-gerente">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU O NOME -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-gerente']) || isset($_POST['senha-gerente']) || isset($_POST['nome-gerente'])) {
                                 if(strlen($_POST['nome-gerente']) == 0) {
                                     echo '<div class="error">*Por favor, informe seu nome.</div>';
                              } 
                          } 
                mysqli_close($mysqli);
                ?>
                </div>

                <div class="input">
                <label for="senha-gerente">Criar Senha</label>
                <input type="password" placeholder="Crie a senha" maxlength="16" name="senha-gerente">
                
                <!-- VERIFICA SE O USUÁRIO INFORMOU A SENHA -->
                <?php
                      include('../connection/conexao.php');
                             if(isset($_POST['email-gerente']) || isset($_POST['senha-gerente']) || isset($_POST['nome-gerente'])) {
                                 if(strlen($_POST['senha-gerente']) == 0) {
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
                            $emailGerente = $_POST["email-gerente"];
                            $nomeGerente = $_POST["nome-gerente"];
                            $senhaGerente = $_POST["senha-gerente"];

                                if (strlen($emailGerente) && strlen($nomeGerente) && strlen($senhaGerente) != 0) {
                                    $query = "INSERT INTO gerente (nome_gerente, email_gerente, senha_gerente) VALUES ('$nomeGerente', '$emailGerente', '$senhaGerente')";
                                        if (mysqli_query($mysqli, $query)) {
                                            echo '<div class="sucesso">Cadastro realizado com sucesso</div>';
                                        } 
                                    }
                            $id_gerente = mysqli_insert_id($mysqli);
                            mysqli_close($mysqli);
                        }
        ?> 
        
    </main>
</body>
</html>