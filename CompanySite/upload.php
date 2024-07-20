<?php

session_start();


$target_dir = "img/people/";
$target_file = $target_dir . basename($_FILES["file-input"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$target_file = $target_dir . basename($_FILES["file-input"]["name"]) . "_PEDROPASCAL";

echo $target_file;

$target_file = substr($target_file, 0, strrpos($target_file, ".")) . date("YmdHis") . ".$imageFileType";


// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file-input"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - przesłany plik nie jest obrazkiem</span>';
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
    $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - plik jest za duży</span>';
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png"
    && $imageFileType != "jpeg" && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION['Message'] = '<span style="color: red; text-align: center;">BŁĄD - niewłaściwe rozszerzenie pliku</span>';
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
        $u_login = $_POST["login"];
        $u_haslo = $_POST["haslo"];
        $u_rola = $_POST["rola"];
        $u_imie = $_POST["imie"];
        $u_nazwisko = $_POST["nazwisko"];
        // awatar
        $u_link1 = $_POST["link1"];
        $u_link2 = $_POST["link2"];
        $u_opis = $_POST["opis"];

        $sql = "INSERT INTO Users VALUES(NULL, '$u_login', '$u_haslo', '$u_rola', '$u_imie', '$u_nazwisko', '$target_file', '$u_link1', '$u_link2', '$u_opis')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }

        $conn->close();
        $_SESSION['Message'] = '<span style="color: green; text-align: center;">Udało się wprowadzić użytkownika!</span>';
        $_SESSION['error'] = 0;
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo "Maybe the file permissions are wrong?";
    }
}
header("Location: upload_user.php");

?>