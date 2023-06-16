<html>
<head>
    <title> Информация о Дате </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Poppins:wght@100;200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


</head>
<body>
  <?php
      $link = mysqli_connect("localhost", "root", "root", "date");
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
      $mysqli = new mysqli("localhost", "root", "root", "date"); // коннект с сервером бд
      $mysqli->set_charset("utf8mb4"); // задаем кодировку
  ?>
  <div class="wrapper">
    <br>
    <br>
    <h1>Тестовое Задание</h1>
    <br>
<h2>Разница между двумя датами</h2>
<br>
    <form method="post">
            <div class="inputs">
                <div class="inpt__cont">
                    <div style="display:inline-block; align-self: center;">
                        <input type="text" name="id10" id="" value="Первая дата " style="price: 20px;" disabled>
                        <input type="date" name="id11" id="" min="1000-01-01" max="9999-12-31" style="width: 110px; price: 20px;"><br><br>
                        <input type="text" name="id12" id="" value="Вторая дата " style="price: 20px;" disabled>
                        <input type="date" name="id13" id="" min="1000-01-01" max="9999-12-31" style="width: 110px; price: 20px;"><br><br>
                        <!-- <div class="inpt__cont"> -->

                            <input name="add" type="submit" class='btn' value="Показать результат" style="width: 270px; display:inline-block; margin-left: 20px; align-self: center; margin-right: 20px;">
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </form>
<?php




class DateHelper {
    public $today;
    public $weekday;
    public $month;

    public function __construct() {
        date_default_timezone_set('Europe/Moscow'); // Установка временной зоны

        $this->today = date('Y-m-d');
        $this->weekday = $this->getRussianWeekday(date('N'));
        $this->month = $this->getRussianMonth(date('n'));
    }

    public function diffDates($date1, $date2) {
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);
        $diffSeconds = abs($timestamp1 - $timestamp2);

        return $this->secondsToTime($diffSeconds);
    }

    public function convertDateFormat($date, $format) {
        $timestamp = strtotime($date);
        return date($format, $timestamp);
    }
    public function sec($num) {
     $convertS = $this->secondsToTime($num);
    return $convertS;
}

    private function secondsToTime($num) {
        $years = floor($num / 31536000);
        $num %= 31536000;
        $months = floor($num / 2592000);
        $num %= 2592000;
        $days = floor($num / 86400);
        $num %= 86400;
        $hours = floor($num / 3600);
        $num %= 3600;
        $minutes = floor($num / 60);
        $seconds = $num % 60;

        $result = array(
            'years' => $years,
            'months' => $months,
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        );
        return $result;
    }


    private function getRussianWeekday($weekday) {
        $weekdays = array(
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье'
        );

        return $weekdays[$weekday];
    }

    private function getRussianMonth($month) {
        $months = array(
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'
        );

        return $months[$month];
    }
}


//public function convertSecond($num) {
//    $convertS = $this->secondsToTime($num);
  //  return $convertS;
//}

//}

// Пример использования класса
$dateHelper = new DateHelper();


// Разница между двумя датами
//print("<h2>Разница между двумя датами</h2>");
//$date1 = '2023-06-01';
//$date2 = '2020-07-15';
//print("<P>Первая дата: $date1 </p>");
//print("<P>Вторая дата: $date2 </p>");
//$diff = $dateHelper->diffDates($date1, $date2);
$diff = $dateHelper->diffDates($_POST['id11'], $_POST['id13']);
echo "Разница: {$diff['years']} лет, {$diff['months']} месяцев, {$diff['days']} дней\n";
print("<br><br>");
?>
<h2>Преобразование формата даты</h2>
<br>
<form method="post">
        <div class="inputs">
            <div class="inpt__cont">
                <div style="display:inline-block; align-self: center;">
                    <input type="text" name="id10" id="" value="Дата " style="price: 20px;" disabled>
                    <input type="date" name="date" id="" min="1000-01-01" max="9999-12-31" style="width: 110px; price: 20px;"><br><br>
                    <!-- <div class="inpt__cont"> -->
                    <select name= "select_option" class=selector>
                        <option >Y-m-d</option>
                        <option >d-m-Y</option>
                        <option >d/m/Y</option>
                        <option >Y/m/d</option>
                        <option >d.m.Y</option>
                        <option >Y.m.d</option>
                    </select>
                        <input name="add" type="submit" class='btn' value="Показать результат" style="width: 270px; display:inline-block; margin-left: 20px; align-self: center; margin-right: 20px;">
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </form>
<?php
// Преобразование формата даты
$date = $_POST['date'];
//$newFormat = $_POST['select_option'];
$newFormat = $_POST['select_option'];
//$newFormat = 'Y-m-d';
//$newFormat1 = 'Y-m-d';
$convertedDate = $dateHelper->convertDateFormat($date, $newFormat);
echo "Преобразованная дата: $convertedDate\n";
//print("<br>");
//$newFormat2 = 'Y/m/d';
//$convertedDate2 = $dateHelper->convertDateFormat($date, $newFormat2);
//echo "Преобразованная дата: $convertedDate2\n";
print("<br><br>");

// Текущий день недели и месяц
print("<h2>Текущая дата</h2>");
echo "{$dateHelper->today}\n";
print("<br><br>");
print("<h2>Текущий день недели</h2>");
echo "Текущий день недели: {$dateHelper->weekday}\n";
print("<br><br>");
print("<h2>Текущий месяц</h2>");
echo "Текущий месяц: {$dateHelper->month}\n";



?>



    <main class="main-f">
        <a href="main.php" class='btn-f'> Меню </a>
    </main>
</div>
</body>
</html>
