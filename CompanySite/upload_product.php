<?php

session_start();


$target_dir = "img/products/";
$target_file = $target_dir . basename($_FILES["file-input"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$target_file = $target_dir . basename($_FILES["file-input"]["name"]) . "_PEDROPASCAL";

echo $target_file;

/* na lab:
1. Pobrać rozszerzenie oryginalne - znaleźć kropkę w nazwie i pobrać to, co jest do końca (rozszerzenie) Find . na prawo wszystkie litery
2. Opracować generator nazw, np. dodawać znaki czasowe, co do sekundy, do nazwy pliku
3. Połączyć 1. i 2. (unikatowa nazwa + rozszerzenie)
4. Zmodyfikować $target_file

// potem można wstawić do bazy danych ścieżkę do pliku graficznego
// tani sposób przechowywania obrazków w bazie
*/

$target_file = substr($target_file, 0, strrpos($target_file, ".")) . date("YmdHis") . ".$imageFileType";


// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file-input"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - plik to nie obraz</span>';
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - plik już istnieje</span>';
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file-input"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - plik ma za duży rozmiar</span>';
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png"
    && $imageFileType != "jpeg" && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - niewłaściwy format pliku</span>';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $_SESSION['error'] = 1;
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(
            basename($_FILES["file-input"]["name"])
        ) . " has been uploaded.";



        // moving the URL to the database;
        include ("login.php");

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "ERROR!";
        }

        // variables in the same order as in the Users table:
        $p_nazwa = $_POST["nazwa"];
        $p_opis = $_POST["opis"];
        // zdjecie
        $p_link1 = $_POST["link1"];
        $p_link2 = $_POST["link2"];

        $sql = "INSERT INTO Items VALUES(NULL, '$p_nazwa', '$p_opis', '$target_file', '$p_link1', '$p_link2')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }

        $conn->close();
        $_SESSION['Message'] = '<span style="color: green; text-align: center;">Udało się wprowadzić produkt!</span>';
        $_SESSION['error'] = 0;
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo "Maybe the file permissions are wrong?";
        $_SESSION['error'] = 1;
    }
}
header("Location: upload_item.php");

?>