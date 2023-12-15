<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fósseis de morcegos de 52 milhões de anos revelam nova espécie</title>
    <link rel="stylesheet" href="../css/noticia.css">
    <link rel="shortcut icon" href="../assets/images/raciono-icon.png" type="image/x-icon">
    <script src="../javascript/javascript.js" defer></script>
</head>
<body>
    <header>

        <div class="menu">
            <button id="butaomenu"></button>
        </div>

        <a href="../index.php" class="href">
        <div class="logo"><img src="../assets/images/raciono-logo.png" alt="" id="logoRaciono"> 
            <div class="ranew">
            <p id="ranews"> Raciono </p>
            <p id="ranews">News</p>
            </div></div>
            </a>
            <div class="welcome">
                <p>Olá, <?php echo $_SESSION['nome_do_usuario']; ?> </p>
            </div>   
    </header>

    <div class="content">

        <main>
    

            <div class="container">
        
        <h1 class="titulo"> Fósseis de morcegos de 52 milhões de anos revelam nova espécie</h1>

        <p class="first-letter-multiple-lines">Os esqueletos, excepcionalmente bem preservados, auxiliam na compreensão sobre como as mais de 1.400 espécies vivas de morcegos evoluíram para serem os únicos mamíferos capazes de voar</p> 


        <section>
            <img src="../assets/images/fossilMorcego.webp" alt="Fossil de um Morcego" id="imagem-principal">
        </section>

        <hr id="hr1">



    <p class="paragrafos">Dois esqueletos de morcegos de 52 milhões de anos descobertos em um antigo leito de lago em Wyoming, nos EUA, são os fósseis de morcegos mais antigos já encontrados – e revelam uma nova espécie.</p> 

    <p class="paragrafos">Tim Rietbergen, biólogo evolutivo do Centro de Biodiversidade Naturalis em Leiden, na Holanda, identificou as espécies de morcegos até então desconhecidas quando começou a coletar medições e outros dados de espécimes de museus.</p> 

    <p class="paragrafos">Agora, o mesmo grupo de pesquisadores preencheu as informações que faltavam, publicando uma sequência completa do cromossomo Y na quarta-feira (23) na revista Nature.</p> 

    <p class="paragrafos">“Esta nova pesquisa é um passo à frente na compreensão do que aconteceu em termos de evolução e diversidade nos primórdios do morcego”, disse ele.</p>

    <p class="paragrafos">Hoje, existem mais de 1.400 espécies vivas de morcegos encontradas em todo o mundo, com exceção das regiões polares. Mas como as criaturas evoluíram para ser o único mamífero capaz de voar não é bem compreendido.</p>

    <p class="paragrafos">O registro fóssil de morcego é irregular, e os dois fósseis que Rietbergen identificou como uma nova espécie foram achados de sorte – excepcionalmente bem preservados e revelando os esqueletos completos dos animais, incluindo dentes.</p>

    <p class="paragrafos">“Os esqueletos de morcegos são pequenos, leves e frágeis, o que é muito desfavorável para o processo de fossilização. Eles simplesmente não preservam bem”, disse ele.</p>

    <p class="paragrafos">A recém-descoberta espécie extinta de morcego – Icaronycteris gunnelli – não era muito diferente dos morcegos que voam hoje. Seus dentes revelaram que ele vivia de uma dieta de insetos. Era minúsculo, pesando apenas 25 gramas.</p>

    <p class="paragrafos">“Se ele dobrasse as asas ao lado do corpo, caberia facilmente na sua mão. Suas asas eram relativamente curtas e largas, refletindo um estilo de voo mais esvoaçante”, disse Rietbergen.</p>

    <p class="paragrafos">Este morcego em particular viveu quando o clima da Terra era quente e úmido. Os dois esqueletos que Rietbergen estudou sobreviveram provavelmente porque as criaturas caíram em um lago, colocando-as fora do alcance de predadores e em um ambiente mais propício à fossilização. O antigo leito do lago faz parte da Formação Green River de Wyoming e produziu vários fósseis de morcegos.</p>

    <p class="paragrafos">Um dos dois fósseis foi coletado por um colecionador particular em 2017 e adquirido pelo Museu Americano de História Natural. O outro pertencia ao Royal Ontario Museum em Toronto e foi encontrado em 1994.</p>

    <p class="paragrafos">A pesquisa foi publicada na revista científica PLOS One na quarta-feira (12).</p>

        </div>
        </main>

        <aside class="sidebar" >
            <div id="menuSidebar">
            <nav class="menuNav">
                <ul id="menuOptions">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../php/escrever.php">Escrever Matéria</a></li>
                    <li><a href="#">Página Gerente</a></li>
                    <li><a href="#">Página Administrador</a></li>
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