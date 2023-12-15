<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raciono News - Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/images/raciono-icon.png" type="image/x-icon">
    <script src="javascript/javascript.js" defer></script>
</head>
<body>
    <header>
        <div class="menu">
            <button id="butaomenu"></button>
        </div>
        <a href="index.php">
            <div class="logo"><img src="assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
                <div class="ranew">
                    <p id="ranews"> Raciono </p>
                    <p id="ranews">News</p>
                </div>
            </div>
        </a>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <div class="welcome">
                <p>Olá, <?php echo $_SESSION['nome_do_usuario']; ?> </p>
            </div>
        <?php else: ?>
            <div class="login">
                <a href="php/login-user.php"> <button id="butaologin">LOG IN</button> </a>
            </div>
        <?php endif; ?>   
    </header>

    <div class="content">

        <main>
        <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'noticias/newsprincipal.php' : 'php/login-user.php'; ?>">
                        <div class="principal">
                    <h1 id="h1principal">Agora sim! Cientistas finalizam sequenciamento do último cromossomo humano</h1>
                </div>
            </a>

             <div class="ultimasnews">
                <h3>ÚLTIMAS NOTÍCIAS</h3>
            </div>

            <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'noticias/n1.php' : 'php/login-user.php'; ?>">
             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="assets/images/fossilMorcego.webp" alt="fossil do Morcego" title="Fósseis de morcegos de 52 milhões de anos revelam nova espécie">  </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Fósseis de morcegos de 52 milhões de anos revelam nova espécie</h1>
                    <p class="first-letter-multiple-lines">Dois esqueletos de morcegos de 52 milhões de anos
                         descobertos em um antigo leito de lago em Wyoming, nos EUA...
                    </p>
                </div>
             </div>
        </a>
            

             <hr id="hr1">
             <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'noticias/n2.php' : 'php/login-user.php'; ?>">
             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="assets/images/tlou.webp" alt="the last of us pic" title="Fungo de The Last of Us não é perigoso na vida real e pode ser usado em remédios"> </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Fungo de The Last of Us não é perigoso na vida real e pode ser usado em remédios</h1>
                    <p class="first-letter-multiple-lines">A destruição da civilização moderna devido a uma pandemia causada
                         por um fungo ilustra o cenário da série de sucesso The Last of Us, do HBO Max...
                    </p>
                </div>
             </div>
        </a>

             <hr id="hr1">

             <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'noticias/n3.php' : 'php/login-user.php'; ?>">
             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="assets/images/atvdfisica.webp" alt="atividade física imagem" title="Como a prática de exercícios preserva a aptidão física no envelhecimento em nível celular"> </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Como a prática de exercícios preserva a aptidão física no envelhecimento em nível celular</h1>
                    <p class="first-letter-multiple-lines">É consenso entre os especialistas que a prática regular de exercício físico é
                         fundamental para garantir qualidade de vida e longevidade. No entanto... 
                    </p>
                </div>
             </div>
        </a>

             <hr id="hr1">
             <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'noticias/n4.php' : 'php/login-user.php'; ?>">
             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="assets/images/chimpas.webp" alt="Chimpanzés" title="Chimpanzés aplicam ‘remédio’ uns nos outros em possível demonstração de empatia">  </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Chimpanzés aplicam ‘remédio’ uns nos outros em possível demonstração de empatia</h1>
                    <p class="first-letter-multiple-lines">Pela primeira vez, chimpanzés foram vistos capturando insetos e os colocando 
                        em suas próprias feridas, bem como nas feridas dos outros, possivelmente como forma de medicação...
                    </p>
                </div>
             </div>
        </a>
                
        </main>


        <aside class="sidebar" >
            <div id="menuSidebar">
            <nav class="menuNav">
                <ul id="menuOptions">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="php/login-jornalist.php">Escrever Matéria</a></li>
                    <li><a href="php/login-gerente.php">Página Gerente</a></li>
                    <li><a href="php/login-adm.php">Página Administrador</a></li>
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