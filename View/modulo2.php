<?php 
include('../Controller/protect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeatSense - Módulo 2</title>
  <link rel="stylesheet" href="../styles/modulo2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body class="modulo-verde">
  <header class="topo">
    <h1>Módulo 2 - Elementos da Escrita Musical</h1>
    <p>Explore compassos, fórmulas, claves, notas e a estrutura do pentagrama!</p>
  </header>

  <main class="conteudo">
    <section class="card">
      <h2>📏 O que é Compasso?</h2>
      <p>O compasso é a divisão do tempo musical em partes iguais, chamadas de tempos. Ele organiza a música e facilita a leitura rítmica, eles podem ser simples ou compostos, mas para não complicar, neste módulo iremos falar sobre o simples.</p>
      <img class="campasso-img" src="img/compasso.jpg" alt="Compasso musical">
    </section>

    <section class="card">
      <h2>🚧 Tipos de Barras de Compasso</h2>
      <ul>
        <li><strong>Barra Simples:</strong> separa compassos normalmente.</li>
        <img src="img/Barras_Simples.jpg" alt="Barra de compasso simples" class="card-img">
        <li><strong>Barra Dupla:</strong> usada para separar periodos ou trechos da música</li>
        <img src="img/Barra_Dupla.jpg" alt="Barra de compasso dupla" class="card-img">
        <li><strong>Barra de Ritornello:</strong> usada para repetir trechos musicais.</li>
        <img src="img/barra de ritornelo.png" alt="Barra de compasso ritornello" class="card-img">
        <li><strong>Barra Final:</strong> indica o fim da música.</li>
        <img src="img/Barra Final.png" alt="Barra de compasso final" class="card-img">
      </ul>
    </section>

    <section class="card">
      <h2>🧮 Fórmula de Compasso Simples</h2>
      <p>Os compassos binarios (\( \frac{2}{2} \)) ou (\( \frac{2}{4} \)), ternários (\( \frac{3}{4} \)) e quarternários (\( \frac{4}{4} \)), são indicados no primeiro compasso, o número de cima indica quantos tempos há no compasso e o número de baixo qual a figura que representa um tempo no campasso (Unidade de Tempo U.T.).  
      Exemplo: <strong>\( \frac{4}{4} \)</strong> = 4 tempos por compasso (indicado pelo número superior), cada um com duração de uma semínima. <br><strong>Obs:</strong> O número 4 representa a semínima como visto no módulo anterior.</p>
    </section>

    <section class="card">
      <h2>🎯 Acentuação Métrica</h2>
      <p>Acentuação métrica é a ênfase natural em certos tempos do compasso, sendo o primeiro tempo o tempo forte e o ultimo sempre o tempo fraco.  
      No compasso \( \frac{4}{4} \), por exemplo, o <strong>1º tempo é forte</strong>, o 2º fraco, 3º meio-forte, e o 4º é fraco.</p>
    </section>

    <section class="card">
      <h2>📋 O que é o Pentagrama?</h2>
      <p>O pentagrama (ou pauta musical) é um conjunto de cinco linhas e quatro espaços onde escrevemos as notas musicais.  
      A posição da nota (em uma linha ou espaço) indica sua altura (grave ou aguda).</p>
      <img class="pentagrama" src="img/pentagrama.png" alt="Pentagrama ou pauta musical">
    </section>

    <section class="card">
      <h2>➕ Linhas e Espaços Suplementares</h2>
      <p>Quando uma nota é muito aguda ou muito grave e ultrapassa os limites do pentagrama, usamos <strong>linhas e espaços suplementares</strong> para continuar representando essas notas corretamente. Clique no botão para visualizar exemplo:</p><button class="linhas" onclick="toggleInfo('suplementar')">⬇</button>
      <div id="suplementar" class="content-div" style="display: none;"><img class="card-img" src="img/complementar.jpg" alt="Linhas suplementares"></div>
    </section>

    <section class="card">
      <h2>🎵 Notas Musicais</h2>
      <p>Ao total temos 7 notas musicais, sendo elas: <strong>Dó, Ré, Mi, Fá, Sol, Lá e Si</strong>.  
      Elas são escritas nas linhas e espaços do pentagrama e seguem uma ordem fixa.</p>
      <img src="img/Notas musicais.jpg" alt="Notas musicais">
    </section>

    <section class="card">
      <h2>🎼 Claves Musicais</h2>
      <p>As Claves dão nome as notas e definem suas posições e se a nota vai ser mais grave ou aguda. Clique sobre cada clave para ver mais detalhes sobre elas:</p>
      <div class="claves-container">
        <button class="clave-btn" onclick="toggleInfo('sol')"><span class="icon-clef">𝄞</span> Clave de Sol</button>
        <div id="sol" class="clave-info">
          <p>Fixa a nota Sol na 2ª linha. Usada para voz principal e secundária.  
          <br><strong>Exemplos de instrumentos:</strong> Violinos, Sax Contraltos, Flautas.</p>
          <img src="img/Clave de Sol.jpg" class="clave-img" alt="Imagem da Clave de Sol">
        </div>
    
        <button class="clave-btn" onclick="toggleInfo('fa')"><span class="icon-clef">𝄢</span> Clave de Fá</button>
        <div id="fa" class="clave-info">
          <p>Fixa a nota Fá na 4ª linha. Usada para vozes graves. 
          <br><strong>Exemplos de instrumentos:</strong> Violoncelos, Contrabaixos, Tubas.</p>
          <img src="img/Clave de fá.jpg" alt="Imagem da Clave de Fá">
        </div>
    
        <button class="clave-btn" onclick="toggleInfo('do')"><span class="icon-clef">𝄡</span> Clave de Dó</button>
        <div id="do" class="clave-info">
          <p>Fixa a nota Dó na 3ª linha. Usada para vozes de acompanhamento.
          <br><strong>Exemplos de instrumentos:</strong> Viola, Trombone.</p>
          <img src="img/Clave de do.jpg" alt="Imagem da Clave de Dó">
        </div>
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
          <a href="https://www.linkedin.com/in/breno-neves-2b30a5360/">Contato</a>
      </div>

      <p class="items">&copy; 2025 BeatSense. Todos os direitos reservados.</p>
  </div>
</footer>

    <script>
      function toggleInfo(id) {
        const info = document.getElementById(id);
        info.style.display = info.style.display === 'block' ? 'none' : 'block';
      }

      function toggleInfo(id){
        const suplementar = document.getElementById(id)
        suplementar.style.display = suplementar.style.display === 'block' ? 'none' : 'block';
      }
    </script>
    
</body>
</html>