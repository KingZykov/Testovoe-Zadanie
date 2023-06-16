
<html>
<head>
    <title> Секунды </title>

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
<main class="main">
<h1>Перечень табличных дат:</h1>
<br>
<table border="1">
    <!--  // вывод «шапки» таблицы -->

    <h2>Преобразование секунд</h2>

    <form method="post">
            <div class="inputs">
                <div class="inpt__cont">
                    <div style="display:inline-block; align-self: center;">
                        <input type="text" name="id10" id="" value="Количество секунд " style="price: 20px;" disabled>
                        <input type="number" name="sek" id=""  style="width: 110px; price: 20px;"><br><br>
                        <!-- <div class="inpt__cont"> -->
                            <input name="add" type="submit" class='btn' value="Показать результат" style="width: 270px; display:inline-block; margin-left: 20px; align-self: center; margin-right: 20px;">
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </form>
    <?php
    class TimeConverter {
        private function secondsToTime($num) {
            $years = floor($num / 31536000);
            $months = floor(($num - $years * 31536000) / 2592000);
            $days = floor(($num - $years * 31536000 - $months * 2592000) / 86400);
            $hours = floor(($num - $years * 31536000 - $months * 2592000 - $days * 86400) / 3600);
            $minutes = floor(($num - $years * 31536000 - $months * 2592000 - $days * 86400 - $hours * 3600) / 60);
            $seconds = $num - $years * 31536000 - $months * 2592000 - $days * 86400 - $hours * 3600 - $minutes * 60;
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

        public function convertSeconds($num) {
            return $this->secondsToTime($num);
        }

    }

    $timeConverter = new TimeConverter();
    $result = $timeConverter->convertSeconds($_POST['sek']);
    echo "В {$_POST['sek']} секундах содержится: {$result['years']} лет, {$result['months']} месяцев, {$result['days']} дней, {$result['hours']} часов, {$result['minutes']} минут, {$result['seconds']} секунд\n";



    ?>

        <br>  <br>
        <a href="main.php" class='btn' style="background-color: #2E8B57"> Назад </a>
        </main>
    </div>
</body>
</html>
