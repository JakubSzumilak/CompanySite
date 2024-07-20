<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_oferta.css">
    <link rel="stylesheet" href="style/black-white.css">

    <script type="text/javascript" src="javascript/accessibility.js"></script>
    <script type="text/javascript" src="javascript/accessibility2.js"></script>
    <script type="text/javascript" src="javascript/timer.js"></script>
    <script type="text/javascript">
        function init() {
            disableStylesheet();
            countdown();
            console.log("OBJECT INITIALIZED!! LX");
        }
    </script>

</head>

<body onload="init();">
    <div id="AccessibilityField" class="AdjustmentButton" onclick="changeColor();"></div>
    <div id="IncreaseFont" class="AdjustmentButton" onclick="changeFont(1);">+</div>
    <div id="DecreaseFont" class="AdjustmentButton" onclick="changeFont(-1);">-</div>
    <div id="ImagesToggler" class="AdjustmentButton" onclick="toggleImages();">Img</div>
    <div id="ManagementButton" class="AdjustmentButton"><a href="upload_item.php">Dodaj produkt</a></div>
    <div id="container">
        <header>
            <h1>Aplikacje www - Projekt 1</h1>
            <h2>...Nie nauczysz się pływać, nie wchodząc do wody..<br />Bruce Lee</h2>
        </header>

        <nav>
            <div id="clock">00:00:00</div>
            <a href="site.html">Start</a>
            <div id="nav-container">
                <a href="#">oferta</a>
                <a href="onas.php">o nas</a>
                <a href="kontakt.html">kontakt</a>
            </div>
        </nav>
        <div class="content-box">
            <?php
            include ("login.php");
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT nazwa, opis, zdjecie, link1, link2 FROM items";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<div class="product-box-4x scallable">';

                // First 4 products
                for ($i = 0; $i < 4; $i++) {
                    if ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="product-box-1x scallable" 
                        style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url(' . $row['zdjecie'] . '); background-size: cover;">
                            <h1>' . $row['nazwa'] . '</h1>' . $row['opis'] . '
                            <div class="product-button-container">
                                <div class="product-button"><a href="' . $row['link1'] . '">Details</a></div>
                                <div class="product-button"><a href="' . $row['link2'] . '">Purchase</a></div>
                            </div>
                        </div>
                    ';
                    }
                }
                echo '</div>';

                // 5th product
                if ($row = $result->fetch_assoc()) {
                    echo '
                            <div class="product-box-1x scallable" 
                            style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url(' . $row['zdjecie'] . '); background-size: cover;">
                                <h1>' . $row['nazwa'] . '</h1>' . $row['opis'] . '
                                <div class="product-button-container">
                                    <div class="product-button"><a href="' . $row['link1'] . '">Details</a></div>
                                    <div class="product-button"><a href="' . $row['link2'] . '">Purchase</a></div>
                                </div>
                            </div>
                        ';
                }

                // product 6 and 7
            
                echo '<div class="product-box-2x-h scallable">';

                for ($i = 0; $i < 2; $i++) {

                    if ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="product-box-1x scallable" 
                            style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url(' . $row['zdjecie'] . '); background-size: cover;">
                                    <h1>' . $row['nazwa'] . '</h1>' . $row['opis'] . '
                                    <div class="product-button-container">
                                        <div class="product-button"><a href="' . $row['link1'] . '">Details</a></div>
                                        <div class="product-button"><a href="' . $row['link2'] . '">Purchase</a></div>
                                    </div>
                            </div>
                        ';
                    }
                }
                echo '</div>';

                // Products number 8 and 9
            
                echo '<div class="product-box-2x-v scallable">';
                for ($i = 0; $i < 2; $i++) {
                    if ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="product-box-1x scallable"
                        style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url(' . $row['zdjecie'] . '); background-size: cover;">
                            <h1>' . $row['nazwa'] . '</h1>' . $row['opis'] . '
                            <div class="product-button-container">
                                <div class="product-button"><a href="' . $row['link1'] . '">Details</a></div>
                                <div class="product-button"><a href="' . $row['link2'] . '">Purchase</a></div>
                            </div>
                        </div>
                        ';
                    }
                }
                echo '</div>';
                echo '</div>'; // closing content-box
            

                // Loading the extra products
                echo '<h1 style="text-align: center; font-size: 5vh;"  class="scallable"> Inne produkty </h1>';

                while ($row = $result->fetch_assoc()) {
                    echo '

                    <div class="horizontal-content-box">
                        <div class="horizontal-product-box">
                            <img src="' . $row['zdjecie'] . '"></img>
                            <div class="horizontal-product-desc scallable">
                                ' . $row['opis'] . '
                                <div style="display: flex; margin: 5% 0%;">
                                    <div class="product-button"><a href="' . $row['link1'] . '">Details</a></div>
                                    <div class="product-button"><a href="' . $row['link2'] . '">Purchase</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    ';
                }
            }
            ?>


            <footer>
                <span class="scallable">
                    Państwowa Akademia Nauk Stosowanych<br />
                    im ks. Bronisława Markiewicza<br />
                    ul. Czarnieckiego 16<br />
                    37-500 Jarosław
                </span>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.957255694333!2d22.67058867779386!3d50.01215637151181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Akademia%20Nauk%20Stosowanych!5e0!3m2!1spl!2spl!4v1710250130113!5m2!1spl!2spl"
                    width=20% height=100% style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div id="icons">
                    <a href="#"><img src="img/icons/blip.png"></img></a>
                    <a href="#"><img src="img/icons/fb.png"></img></a>
                    <a href="#"><img src="img/icons/link.png"></img></a>
                    <a href="#"><img src="img/icons/pint.png"></img></a>
                    <a href="#"><img src="img/icons/skype.png"></img></a>
                    <a href="#"><img src="img/icons/twit.png"></img></a>
                    <a href="#"><img src="img/icons/what.png"></img></a>
                    <a href="#"><img src="img/icons/yt.png"></img></a>
                </div>
            </footer>

        </div>



</body>

</html>