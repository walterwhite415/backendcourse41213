<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="main.css">
    <title>lab1</title>
  </head>
  <body>
    <header>
      <div class="header-wr">
        <a href="#">
          <picture >
            <img class="logo" src="img/logo.jpg" alt="Лого" />
          </picture>
        </a>
        <h1>Домашняя работа: Hello, World!</h1>
      </div>
    </header>
    <main>
      <section>
        <div class="wr">
          <?php
          $time = date('H:i:s');
          ?>
          <p><?='Hello, world!'?></p>
          <p ><span id="clock"><?= $time ?></span></p>
        </div>
      </section>
      <section id="links">
        <div class="wr"><nav class="course-nav">
  <ul class="topic-list">

    <li class="topic">
      <h2>Тема 1. Ознакомление. Настройка окружения.</h2>

      <ul>
        <li>
          <a href="#">1. Hello, World!</a>
        </li>

        <li>
          <a href="lab2feedbackform/form.html">2. Feedback Form.</a>
        </li>
      </ul>
    </li>

    <li class="topic">
      <h2>Тема 2. Язык программирования PHP</h2>

      <ul>
        <li>
          <a href="lab3solvetheequation/h.php">3. Solve the equation.</a>
        </li>

        <li>
          <a href="lab4calculator/calc.html">4. Calculator.</a>
        </li>

        <li>
          <a href="lab5notebook/index.php">5. Notebook</a>
        </li>
        <li>
          <a href="lab6oop/abstclasses.php">6. OOP<a>
        </li>
        <li>
          <a href="lab7routing/myproject/www/index.php">7. <a>
        </li>
     
    
      </ul>
    </li>

  </ul>
</nav></div>
      
      </section>
    </main>

      <script>
let date = new Date("<?= date('Y-m-d H:i:s') ?>");

function updateClock() {
  date.setSeconds(date.getSeconds() + 1);

  document.getElementById('clock').textContent =
    date.toLocaleTimeString('ru-RU');
}

setInterval(updateClock, 1000);
</script>
  </body>
</html>
