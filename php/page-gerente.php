<?php
session_start();
if (!isset($_SESSION['nome_gerente'])) {
    header("Location: index.php"); 
    exit();
}

$nome_gerente = $_SESSION['nome_gerente'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raciono News - Página Administrador</title>
    <link rel="stylesheet" href="../css/pageGerente.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
    <script src="../javascript/javascript.js" defer></script>
</head>
<body>
    <header>

        <div class="menu">
            <button id="butaomenu"></button>
        </div>

        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
            <div class="ranew">
            <p id="ranews"> Raciono </p>
            <p id="ranews">News</p>
            </div>
        </div>

        <div class="welcome">
            <p>Olá, <?php echo $nome_gerente; ?> </p>
        </div>
  
    </header>
    <div class="content">
        <main>

            <div class="principal">
                
                <h1 id="h1principal">Agora sim! Cientistas finalizam sequenciamento do último cromossomo humano</h1>

            </div>

             <div class="ultimasnews">
                <h3>ÚLTIMAS NOTÍCIAS</h3>
            </div>

             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="../assets/images/fossilMorcego.webp" alt="fossil do Morcego" title="Fósseis de morcegos de 52 milhões de anos revelam nova espécie">  </div>

                <div class="mancheterandola">
                    <h1 id="h1randola">Fósseis de morcegos de 52 milhões de anos revelam nova espécie</h1>
                    <p class="first-letter-multiple-lines">Dois esqueletos de morcegos de 52 milhões de anos
                         descobertos em um antigo leito de lago em Wyoming, nos EUA...
                    </p>
                </div>
             </div>

             <hr id="hr1">

             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="../assets/images/tlou.webp" alt="the last of us pic" title="Fungo de The Last of Us não é perigoso na vida real e pode ser usado em remédios"> </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Fungo de The Last of Us não é perigoso na vida real e pode ser usado em remédios</h1>
                    <p class="first-letter-multiple-lines">A destruição da civilização moderna devido a uma pandemia causada
                         por um fungo ilustra o cenário da série de sucesso The Last of Us, do HBO Max...
                    </p>
                </div>
             </div>

             <hr id="hr1">

             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="../assets/images/atvdfisica.webp" alt="atividade física imagem" title="Como a prática de exercícios preserva a aptidão física no envelhecimento em nível celular"> </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Como a prática de exercícios preserva a aptidão física no envelhecimento em nível celular</h1>
                    <p class="first-letter-multiple-lines">É consenso entre os especialistas que a prática regular de exercício físico é
                         fundamental para garantir qualidade de vida e longevidade. No entanto... 
                    </p>
                </div>
             </div>

             <hr id="hr1">

             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="../assets/images/chimpas.webp" alt="Chimpanzés" title="Chimpanzés aplicam ‘remédio’ uns nos outros em possível demonstração de empatia">  </div>
                <div class="mancheterandola">
                    <h1 id="h1randola">Chimpanzés aplicam ‘remédio’ uns nos outros em possível demonstração de empatia</h1>
                    <p class="first-letter-multiple-lines">Pela primeira vez, chimpanzés foram vistos capturando insetos e os colocando 
                        em suas próprias feridas, bem como nas feridas dos outros, possivelmente como forma de medicação...
                    </p>
                </div>
             </div>

            <?php
                $imagem = "../assets/images".$_FILES["imagem"]["name"];
                move_uploaded_file($_FILES["imagem"]["name"]);
            ?>

             <div class="noticiasrandolas">
                <div class="imagemrandola"> <img src="<?php echo $imagem["imagem"]; ?>"></div>
                <div class="mancheterandola">
                    <h1 id="h1randola">
                        <?php
                            echo "manchete";
                        ?>
                    </h1>
                    <p class="first-letter-multiple-lines">
                        <?php
                            echo "previa";
                        ?>
                    </p>
                </div>
             </div>
                
        </main>


        <aside class="sidebar" >
            <div id="menuSidebar">
            <nav class="menuNav">
                <ul id="menuOptions">
                    <li><a href="../index.php">Home</a></li>
                    
                </ul>
            </nav>
        </div>
        </aside>


        <aside class="ads">
        </aside>
    </div>
    <footer>FOOTER</footer>
</body>
</html>