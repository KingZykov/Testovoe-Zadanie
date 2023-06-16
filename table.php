
+<html>
<head>
    <title> Информация о продуктах </title>

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
<h2>Перечень табличных дат:</h2>
<table border="1">
    <!--  // вывод «шапки» таблицы -->
    <thead>
        <tr class='sticky'>
          <th> Дата </th>
        </tr>
    </thead>
    <?php
        $result = $mysqli->query('SELECT * FROM date'); // запрос на выборку сведений о пользователях
        while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
            echo "<tr>";
                echo "<td>";
                print($row['Дата']);
                echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        $num_rows = mysqli_num_rows($result); // число записей в таблице БД
        print("<P>Общее количество дат: $num_rows </p>");
    ?>

        <!-- <a href="new.html" class='btn'> Add user </a> -->
        <a href="main.php" class='btn' style="background-color: #2E8B57"> Назад </a>
        </main>
    </div>
</body>
</html>
