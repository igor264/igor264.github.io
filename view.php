<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Feedback</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">
        <ul>
            <li><a id="header_logo" href="secret.html"><img src="img/header.jpg" height="40px"></a></li>
            <li><a class="header_text" href="main.html">Главная</a></li>
            <li><a class="header_text" href="biography.html">Биография</a></li>
            <li><a class="header_text" href="photo.html">Фото</a></li>
            <li><a class="header_text" href="feedback_form.html">Оставить отзыв</a></li>
            <li><a class="header_text" href="view_feedback.php">Читать отзывы</a></li>
        </ul>
    </div>

    <div id="container">
        <div id="main">
            <h2>Отзывы</h2>
            <div id="feedback-list">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "shaev_bd";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);


                    $sql = "SELECT id, name, phone, feedback FROM shaev";
                    
                    $result = $conn->query($sql);

                        echo "<ul>";
                        while($row = $result->fetch_assoc()) {
                            echo "<li>" . ($row["name"]) . " (" . ($row["phone"]) . "):</strong> " . ($row["feedback"]) . "</li>";
                        }
                        echo "</ul>";

                    $conn->close();
                ?>
            </div>
        </div>
    </div>

    <div id="footer">
        <a href="tel:+79991112233">Номер телефона: +79991112233</a>
    </div>
</body>
</html>
