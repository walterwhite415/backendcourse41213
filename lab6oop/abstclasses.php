


<?php
 $a1 = "234";
 $a2 = null;
 $a3 = null;
 $a4 = null;
 $a5 = null;
 $a6 = null;
 $a7 = null;
abstract class HumanAbstract
{
    private string $name;
 
    public function __construct(string $name)
    {
        $this->name = $name;
    }
 
    public function getName(): string
    {
        return $this->name;
    }
 
    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;
 
    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}
 
class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }
 
    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}
 
class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello';
    }
 
    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}
 
$russian = new RussianHuman('Иван');
$english = new EnglishHuman('John');
 
// echo $russian->introduceYourself() . "<br>" ;
// echo $english->introduceYourself()  . "<br>";
$a1 = $russian->introduceYourself();
$a2 = $english->introduceYourself() ;


class Cat
{
    private string $color;
 
    public function __construct(string $name, string $color)
    {
        $this->name  = $name;
        $this->color = $color;
    }
 
    public string $name;
 
    public function getColor(): string
    {
        return $this->color;
    }
 
    public function sayHello(): string
    {
        return "Привет, меня зовут {$this->name} и я {$this->color} кошка." . PHP_EOL;
    }
}
 
$cat = new Cat('Мурка', 'рыжая');
// $cat->sayHello() ;
// echo $cat->getColor() . "<br>";
$a3 = $cat->sayHello() ;
$a4 =  $cat->getColor() ;





interface CalculateSquare
{
    public function square(): float;
}
 
class Circle implements CalculateSquare
{
    public function __construct(private float $radius) {}
 
    public function square(): float
    {
        return M_PI * $this->radius ** 2;
    }
}
 
class Rectangle implements CalculateSquare
{
    public function __construct(private float $width, private float $height) {}
 
    public function square(): float
    {
        return $this->width * $this->height;
    }
}
 
class Triangle
{
    public function __construct(private float $base, private float $height) {}
}
 
 
function printSquare(object $obj): string
{
    if ($obj instanceof CalculateSquare) {
        return 'Объект класса ' . get_class($obj) . ': площадь = ' . $obj->square() . "<br>";
    } else {
        return 'Объект класса ' . get_class($obj) . ' не реализует интерфейс CalculateSquare.' . "<br>";
    }
}
 
// printSquare(new Circle(5));
// printSquare(new Rectangle(4, 6));
// printSquare(new Triangle(3, 8));
 
$a5 = printSquare(new Circle(5));
$a6= printSquare(new Rectangle(4, 6));
$a7 = printSquare(new Triangle(3, 8));




class Lesson {
    private string $title;
    private string $text;
    private string $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }
 
};

class PaidLesson extends Lesson
{
    private float $price;
 
    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }
 
    public function getPrice(): float
    {
        return $this->price;
    }
 
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
 
$lesson = new PaidLesson(
    'Урок о наследовании в PHP',
    'Лол, кек, чебурек',
    'Ложитесь спать, утро вечера мудренее',
    99.90
);
 
// var_dump($lesson);

?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <title>OOP</title>
    <link rel="stylesheet" href="../normalize.css" />
    <link rel="stylesheet" href="../main.css" />
    <link rel="stylesheet" href="calc.css" />
    <style>label{font-size: 2rem;}</style>
  </head>
  <body>
    <header>
      <div class="header-wr">
        <a href="../index.php">
          <picture>
            <img class="logo" src="../img/logo.jpg" alt="Лого" />
          </picture>
        </a>
        <h1>Домашняя работа: OOP.</h1>
      </div>
    </header>
    <section id="oop">
      <div class="wr">
       <ul>
        <li><label>Абстрактные классы</label><p><span><?= $a1?> <br><?= $a2?></span></p></li>
        <li><label>Инкапсуляция</label><p><span><?= $a3?><br><?= $a4?></span></p> </li>
        <li><label>Интерфейсы</label><p><span><?= $a5?><?= $a6?></span></p></li>
        <li><label>Наследование</label><p><span><pre><?php var_dump($lesson); ?></pre></span></p></li>

       </ul>
      </div>
    </section>
    <script src="script.js"></script>
  </body>
</html>
