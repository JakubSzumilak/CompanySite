<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_onas.css">
    <link rel="stylesheet" href="style/black-white.css">

    <script src="javascript/accessibility.js"></script>
    <script src="javascript/accessibility2.js"></script>
    <script type="text/javascript" src="javascript/timer.js"></script>
    <script type="text/javascript">
        function interior_changeFont(amount) {

            let elements = document.getElementsByClassName('scallable');
            for (i = 0; i < elements.length; i++) {
                let el = elements[i];
                let style = window.getComputedStyle(el, null).getPropertyValue('font-size');
                let fontSize = parseFloat(style);

                let newSize = fontSize + amount;

                if (newSize > max) {
                    newSize = max;
                } else if (newSize < min) {
                    newSize = min;
                }
                el.style.fontSize = newSize + 'px';
            }

            changeFont(amount);
        }

        function init() {
            disableStylesheet();
            countdown();
        }
    </script>

</head>

<body onload="init();">    
    <div id="AccessibilityField" class="AdjustmentButton" onclick="changeColor();"></div>
    <div id="IncreaseFont" class="AdjustmentButton" onclick="changeFont(1);">+</div>
    <div id="DecreaseFont" class="AdjustmentButton" onclick="changeFont(-1);">-</div>
    <div id="ImagesToggler" class="AdjustmentButton" onclick="toggleImages();">Img</div>
    <div id="ManagementButton" class="AdjustmentButton"><a href="upload_user.php">Dodaj osobę</a></div>
    <div id="container">
        <header>
            <h2 class="scallable StayBlack">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni corrupti accusamus vel,
                illum
                repudiandae, fugiat aliquam placeat architecto, nihil quisquam vitae magnam labore! Magni cumque enim
                beatae assumenda inventore fugit? Velit magni ducimus vitae sint quia ullam possimus adipisci maiores,
                hic reiciendis explicabo, assumenda eveniet in officia ex amet labore impedit fuga repellat? Nulla
                ducimus provident omnis accusamus sequi, dolores laboriosam nesciunt, optio, maxime quae fuga doloribus
                architecto consectetur impedit enim dignissimos rem debitis quasi quis sed. Minima magni error, enim
                facere officiis tempore laboriosam. Quos officia, porro eum voluptates illo eos facere dicta non
                impedit, aperiam pariatur voluptatem reiciendis cum assumenda a nam dolor corporis odit? Ex repellat
                quidem nemo, reprehenderit dicta impedit illo repellendus aperiam nesciunt natus odio sunt velit nulla
                obcaecati adipisci. Omnis natus obcaecati suscipit corrupti ipsam magni dignissimos nihil aliquam
                necessitatibus incidunt, nesciunt ut repellat, autem dicta corporis, rem vel praesentium quo repudiandae
                libero odit?</h2>
        </header>

        <nav>
            <div id="clock">00:00:00</div>
            <a href="site.html">Start</a>
            <div id="nav-container">
                <a href="oferta.php">oferta</a>
                <a href="onas.php">o nas</a>
                <a href="kontakt.html">kontakt</a>
            </div>
        </nav>





        <div id="main-content">





            <?php
            include ("login.php");

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT imie, nazwisko, opis, awatar, link1, link2, role FROM Users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {



                    echo '
            <div class="person-card">
                <img src="' . $row['awatar'] . '" />
                <div class="person-description scallable">
                    ' . $row['imie'] . ' ' . $row['nazwisko'] . ' <br />
                    ' . $row['opis'] . '
                </div>
                <div class="person-button-container">
                    <div class="person-button scallable">
                        <a href="' . $row['link1'] . '">Link 1</a>
                    </div>
                    <div class="person-button scallable">
                        <a href="' . $row['link2'] . '">Link 2</a>
                    </div>
                </div>
            </div>
            ';
                }
            } else {
                echo "No users have been found";
            }
            $conn->close();
            ?>




        </div>





        <footer>
            <span class="scallable">
                Państwowa Akademia Nauk Stosowanych<br />
                im ks. Bronisława Markiewicza<br />
                ul. Czarnieckiego 16<br />
                37-500 Jarosław
            </span>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.957255694333!2d22.67058867779386!3d50.01215637151181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Akademia%20Nauk%20Stosowanych!5e0!3m2!1spl!2spl!4v1710250130113!5m2!1spl!2spl"
                width=40% max-height=100% style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div id="icons">
                <a href="#"><img src="img/icons/blip.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/fb.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/link.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/pint.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/skype.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/twit.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/what.png" class="NotScallable"></img></a>
                <a href="#"><img src="img/icons/yt.png" class="NotScallable"></img></a>
            </div>
        </footer>

    </div>



</body>

</html>