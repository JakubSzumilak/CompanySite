<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style-upload.css">
</head>

<body>
    <h1>Dodaj osobę<br /></h1>
    <?php
    session_start();
    if (isset($_SESSION['Message'])) {
        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
    }
    ?>
    <br /><br />
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <div id="input-flex">
            <div class="input-field">
                <label for="login">Login: </label><br />
                <input type="text" name="login" id="login" placeholder="login..." required /><br />
                <label for="haslo">Haslo: </label><br />
                <input type="password" name="haslo" id="haslo" placeholder="haslo..." required /><br /><br />
            </div>

            <div class="input-field">
                <label for="imie">Imie: </label><br />
                <input type="text" name="imie" id="imie" placeholder="imie..." required /><br />
                <label for="nazwisko">Nazwisko: </label><br />
                <input type="text" name="nazwisko" id="nazwisko" placeholder="nazwisko..." required /><br /><br />
            </div>
        </div>

        <label for="rola">Rola: </label>
        <select name="rola" id="rola">
            <option value="A">A</option>
            <option value="U">U</option>
            <option value="G">G</option>
        </select> <br /><br />

        <label for="link1">Link 1: </label>
        <input type="text" name="link1" id="link1" placeholder="link 1..." required /><br />
        <label for="link2">Link 2: </label>
        <input type="text" name="link2" id="link2" placeholder="link 2..." required /><br /><br />
        <label for="opis">Opis: </label>
        <input type="text" name="opis" id="opis" placeholder="opis..." required /><br /><br />


        <label for="file-input">File: </label>
        <input type="file" name="file-input" id="file-input" placeholder="Select photo..." required />
        <input type="submit" value="Wyślij" name="submit">
    </form>
    <br /><br />
    <div id="ComebackButton"><a href="onas.php">Powrót</a></div>
    
</body>

</html>