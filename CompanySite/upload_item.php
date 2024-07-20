<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style-upload.css">

    <style>
        input[type=text] {
            width: 100%;
        }
    </style>

</head>

<body>
    <h1>Dodaj produkt<br /></h1>
    <?php
    session_start();
    if (isset($_SESSION['Message'])) {
        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
    }
    ?>
    <br />
    <form action="upload_product.php" method="post" enctype="multipart/form-data">

        <label for="nazwa">Nazwa: </label>
        <input type="text" name="nazwa" id="nazwa" placeholder="Nazwa..." required /><br /><br />
        <label for="opis">Opis: </label>
        <input type="text" name="opis" id="opis" placeholder="opis..." required /><br /><br />

        <label for="file-input">Zdjecie: </label>
        <input type="file" name="file-input" id="file-input" placeholder="Wybierz zdjecie..." required />
        <br />

        <label for="link1">Link 1: </label>
        <input type="text" name="link1" id="link1" placeholder="link 1..." required /><br />
        <label for="link2">Link 2: </label>
        <input type="text" name="link2" id="link2" placeholder="link 2..." required /><br /><br />

        <input type="submit" value="Wyślij" name="submit">
    </form>
    <br /><br />
    <div id="ComebackButton"><a href="oferta.php">Powrót</a></div>
</body>

</html>