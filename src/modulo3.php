<?php include('adm/protect.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeatSense - Módulo 3</title>
  <link rel="stylesheet" href="styles/modulo3.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <style>
    @media(max-width:480px){
      .card{
        max-width: 100%;
      }
    }

    @media(max-width: 768px){
      .card{
        max-width: 100%;
      }

      ul img{
        max-width: 400px;
      }
    }

    @media(max-width:1024){
      .card{
        max-width: 100%px;
      }
    }
  </style>
</head>
<body class="modulo-laranja">
  <header class="topo">
    <h1>Módulo 3 - Intervalos, Melodia e Harmonia</h1>
    <p>Entenda os sinais de alteração, intervalos musicais e também sobre a melodia e harmonia!</p>
  </header>

  <main class="conteudo">
    <section class="card">
      <h2>O que são Intervalos Musicais?</h2>
      <p>Intervalo é a distância entre duas notas musicais. Aqui estão os principais tipos de intervalos:</p>
      <ul>
        <li><strong>Semitom:</strong> A menor distância possível entre duas notas. Exemplo: <b>Dó</b> para <b>Dó♯</b> ou <b>Si</b> para <b>Dó</b></li>
        <li><strong>Tom:</strong> A distância que corresponde a dois semitons. Exemplo: <b>Dó</b> para <b>Ré</b>.</li>
        <button class="intervalos" onclick="toggleExemplo()">⬇</button>
        <div class="img-ex" id="exemplo">
        <img src="img/tons e semitons.jpg" alt="Tons e Semitons">
        </div>
        <li><strong>Uníssono:</strong> Quando duas notas são idênticas em altura, tocadas ao mesmo tempo ou em sequência.</li>
        <li><strong>Melódico:</strong> Quando as notas são tocadas em sequência, uma após a outra. Exemplo: <b>Dó</b> seguido de <b>Ré</b>.</li>
        <li><strong>Harmônico:</strong> Quando duas notas são tocadas simultaneamente. Exemplo: <b>Dó</b> e <b>Ré</b> ao mesmo tempo.</li>
        <li><strong>Enarmônico:</strong> Notas que têm nomes diferentes, mas produzem o mesmo som. Exemplo: <b>Dó♯</b> e <b>Ré♭</b>.</li>
      </ul>
    </section>

    <section class="card">
      <h2>🎶 Melodia e Harmonia</h2>
      <p>A <strong>melodia</strong> é a sucessão de sons que formam uma linha musical reconhecível, muitas vezes associada à parte que cantamos ou que tocamos sozinha em uma música. Já a <strong>harmonia</strong> é o acompanhamento que ocorre quando duas ou mais notas soam simultaneamente, criando uma sensação de profundidade e suporte para a melodia, os intrumentos que fazem a parte harmonica, por exemplo, são os VIoloncelos, Tubas, Trombones dentre outros.</p>
    </section>

    <section class="card">
      <h2>🗣️ Vozes e Harmonia</h2>
      <div class="linha-botao-texto">
        <p>Clique no botão para entender como as diferentes vozes se organizam na harmonia musical.</p>
        <button class="info-button" onclick="toggleInfoVozes()">⬇</button>
      </div>
      <ul id="info" class="img-info">
        <img src="img/vozes.jpg" alt="Vozes e Claves">
        <li><strong style="color: #db75db;">🎻 Soprano:</strong> Voz mais aguda. Representa a melodia principal nas partituras. Instrumentos: <strong>violino, flauta, etc.</strong></li>
        <li><strong style="color: #da8921;">🎷 Contralto:</strong> Voz feminina grave. Serve de apoio à melodia principal e adiciona profundidade. Instrumentos: <strong>saxofone alto, viola,</strong> etc.</li>
        <li><strong style="color: #19a83d;">🎺 Tenor:</strong> Voz masculina aguda. Conecta as vozes superiores às graves. Instrumentos: <strong>clarinete, trompete,</strong> etc.</li>
        <li><strong style="color: #1e2583;">🎸 Baixo:</strong> A voz mais grave. Dá sustentação e base para a harmonia. Instrumentos: <strong>contrabaixo, tuba, violoncelo,</strong> etc.</li>
      </ul>
    </section>

    <section class="card">
      <h2>♯♭ Sinais de Alteração</h2>
      <p>Os <strong>acidentes musicais</strong> são símbolos que alteram a altura das notas, podendo elevar ou abaixar a altura original:</p>
      <ul>
        <li><strong>Sustenido (♯):</strong> Eleva a nota a um semitom (\( \frac{1}{2} \) tom), como por exemplo, <b>Sol</b> se torna <b><b>Sol#</b></b>.</li>
        <img class="card-img" src="img/sustenido.jpg" alt="Sol para Sol#">
        <li><strong>Bemol (♭):</strong> Abaixa a nota a um semitom (\( \frac{1}{2} \) tom), como <b>Lá</b> se torna <b><b>Lá♭</b></b>.</li>
        <img class="card-img" src="img/bemol.jpg" alt="Lá para Lá♭">
        <li><strong>Dobrado Sustenido (𝄪):</strong> Eleva a nota a dois semitons (1 tom). Exemplo: <b>Dó</b> se torna <b><b>Dó♯</b>♯</b> (ou <b>Ré</b>).</li>
        <img class="card-img" src="img/dobradosustenido.jpg" alt="Dobrado Sustenido">
        <li><strong>Dobrado Bemol (𝄫):</strong> Abaixa a nota a dois semitons(1 tom). Exemplo: <b>Ré</b> se torna <b><b>Ré♭</b>♭</b> (ou <b>Dó</b>).</li>
        <img class="card-img" src="img/dobradobemol.jpg" alt="Dobrado Bemol">
        <li><strong>Bequadro (♮):</strong> Cancela qualquer alteração anterior, retornando a nota ao seu estado natural. Exemplo: se uma nota foi alterada com um sustenido, o bequadro a devolve ao seu tom original e a alteração vale para toda a nota igual dentro de um compasso.</li>
        <img class="card-img" src="img/bequadro.jpg" alt="Bequadro">
      </ul>
    </section>

    <section class="card">
      <h2>𝄐 Fermata</h2>
      <p>A <strong>fermata</strong> é um símbolo que indica que a nota ou pausa deve ser prolongada além do seu valor original. O tempo de prolongamento é deixado a critério do músico ou regente, criando uma pausa dramática que dá ênfase à nota ou pausa, antes de continuar com a música.</p>
      <button class="info" onclick="toggleInfoFermata()">⬇</button>
      <div id="infos" class="img-info">
        <img class="card-img" src="img/fermata.jpg" alt="fermata">
      </div>
    </section>
  </main>   

  <footer>
    <div class="items">
        <h5 class="items">BeatSense</h5>
        <p class="items">Aprenda teoria musical de forma fácil e acessível.</p>
        
        <div class="items">
            <a href="index.php#teoria">Teoria Musical</a>
            <a href="index.php#sobre">Sobre</a>
            <a href="index.php#contato">Contato</a>
        </div>

        <p class="items">&copy; 2025 BeatSense. Todos os direitos reservados.</p>
    </div>
  </footer>
  <script>
    
    function toggleExemplo() {
      const exemplo = document.getElementById("exemplo");
      exemplo.classList.toggle("ativo");
    }

    function toggleInfoVozes() {
      const infos = document.getElementById("info");
      infos.classList.toggle("ativo");
    }

    function toggleInfoFermata() {
      const infos = document.getElementById("infos");
      infos.classList.toggle("ativo");
    }
  </script>
</body>
</html>