


<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="main.css" />
    <title>lab1</title>
  </head>
  <body>
    <header>
      <div class="header-wr">
        <a href="https://mospolytech.ru/">
          <picture>
            <img class="logo" src="logo.jpg" alt="Лого" />
          </picture>
        </a>
        <h1>Домашняя работа: Feedback Form</h1>
      </div>
    </header>
    <main>
      <section id="header-section">
        <div class="wr">
            <label ><textarea class="output-textarea"><?php

$url = 'http://www.example.com';

 print_r(get_headers($url));

?></textarea></label>
          <p class="withlink"><a href="form.html">Вернуться к форме</a></p>
        </div>
      </section>
    </main>
    <footer>
      <div class="wr">
        <p>
          Задание для самостоятельной работы «Feedback form» Собрать сайт из
          двух страниц. 1 страница: Сверстать форму обратной связи. Отправку
          формы осуществить на URL: https://httpbin.org/post. Добавить кнопку
          для перехода на 2 страницу. 2 страница: вывести на страницу результат
          работы функции get_headers. Загрузить код в удаленный репозиторий.
          Залить на хостинг.
        </p>
      </div>
    </footer>
  </body>
</html>
