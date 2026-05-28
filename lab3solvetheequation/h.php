<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../normalize.css">
    <link rel="stylesheet" href="../main.css">
    <title>lab1</title>
  </head>
  <body>
    <header>
      <div class="header-wr">
        <a href="../index.php">
          <picture >
            <img class="logo" src="../img/logo.jpg" alt="Лого" />
          </picture>
        </a>
        <h1>1.2. Домашняя работа: Solve the equation.</h1>
      </div>
    </header>
    <main>
      <section>
        <div class="wr">
         <?php
$eq = "6/X=2";
$parts = str_split($eq); 
$result = null;

$a = $eq[0];
$op = $eq[1];
$b = $eq[2];
$c = $eq[4];



if ($a === 'X'){
$result = $b * $c;
} elseif ($b=='X'){
    $result= $a / $c;
} else{
    $result = $a / $b;
}



?><div class="solver-result">
  
  <p class="equation">Уравнение: <?= $eq ?></p>
  
  <p class="answer">Ответ: X = <?= $result ?></p>
</div>
        </div>
      </section>
     
    </main>
    <footer>
  
  </body>
</html>
