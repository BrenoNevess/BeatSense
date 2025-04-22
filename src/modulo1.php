<?php include('adm/protect.php');?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BeatSense - Módulo 1</title>
  <link rel="stylesheet" href="styles/modulo1.css">
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
        max-width: 100%px;
      }
    }

    @media(max-width:1024px){
      .card{
        max-width: 100%;
      }
    }
</style>
</head>
<body class="modulo-azul">
  <header class="topo">
    <h1>Módulo 1 - Fundamentos da Música</h1>
    <p>Aprenda o básico sobre música, ritmo, sons e figuras musicais!</p>
  </header>

  <main class="conteudo">
    <section class="card">
      <h2>🎶 O que é Música?</h2>
      <p>A música é a arte de organizar sons e silêncios no tempo. Ela envolve ritmo, melodia e harmonia, transmitindo sentimentos e emoções.</p>
    </section>

    <section class="card">
      <h2>🥁 O que é Ritmo?</h2>
      <p>Ritmo é a organização dos sons no tempo marcada por padrões regulares de duração, acentuação e pausa. Ele é responsável por dar movimento e pulsação à música, é o que faz você bater o pé ou dançar no compasso de uma música.</p>
    </section>

    <section class="card">
      <h2>🔊 Propriedades do Som</h2>
      <ul>
        <li><strong>Timbre:</strong> O que diferencia sons com a mesma nota (ex: piano e violão).</li>
        <li><strong>Duração:</strong> Tempo que o som permanece (curto ou longo).</li>
        <li><strong>Intensidade:</strong> Volume do som (forte ou fraco).</li>
        <li><strong>Altura:</strong> Quão grave ou agudo é o som.</li>
      </ul>
    </section>

    <section class="card">
      <h2>♪ Partes de uma Figura Musical</h2>
      <p>As figuras musicais têm partes específicas. Veja a imagem abaixo:</p>
      <img src="img/Partes da nota.png" alt="Partes de uma figura musical" class="img-figura">
      <ul>
        <li><strong>Cabeça:</strong> Parte redonda (vazia ou preenchida).</li>
        <li><strong>Haste:</strong> Linha vertical ligada à cabeça.</li>
        <li><strong>Bandeirola:</strong> Pequena curva que indica a duração.</li>
      </ul>
    </section>

    <section class="card">
      <h2>🎼 Figuras de Som e Silêncio</h2>
      <p>As figuras representam sons e suas durações. Para cada figura de som, existe uma figura de silêncio correspondente (pausa).</p>

      <h3>⬇️ Tabela de Duração das Figuras</h3>
      <div class="tabela-container">
        <table>
          <tr>
            <th>Som/Silêncio</th>
            <th>Nome</th>
            <th>Duração</th>
            <th>N° de Representação</th>
          </tr>
          <tr>
            <td class="figuras">𝅝/𝄻</td>
            <td>Semibreve</td>
            <td>Figura de maior duração utilizada e as outras figuras são frações dela.</td>
            <td>1</td>
          </tr>
          <tr>
            <td class="figuras">𝅗𝅥/𝄼</td>
            <td>Mínima</td>
            <td>Metade da semibreve \( \frac{1}{2} \)</td>
            <td>2</td>
          </tr>
          <tr>
            <td class="figuras">𝅘𝅥/𝄽</td>
            <td>Semínima</td>
            <td>Metade da mínima e \( \frac{1}{4} \) da semibreve</td>
            <td>4</td>
          </tr>
          <tr>
            <td class="figuras">𝅘𝅥𝅮/𝄾</td>
            <td>Colcheia</td>
            <td>Metade da semínima e \( \frac{1}{8} \) da semibreve</td>
            <td>8</td>
          </tr>
          <tr>
            <td class="figuras">𝅘𝅥𝅯/𝄿</td>
            <td>Semicolcheia</td>
            <td>Metade da colcheia e \( \frac{1}{16} \) da semibreve</td>
            <td>16</td>
          </tr>
          <tr>
            <td class="figuras">𝅘𝅥𝅰/𝅀</td>
            <td>Fusa</td>
            <td>Metade da semicolcheia e \( \frac{1}{32} \) da semibreve</td>
            <td>32</td>
          </tr>
          <tr>
            <td class="figuras">𝅘𝅥𝅱/𝅁</td>
            <td>Semifusa</td>
            <td>Metade da fusa e \( \frac{1}{64} \) da semibreve</td>
            <td>64</td>
          </tr>
        </table>
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
</body>
</html>
