<?php
include "includes/config.php";

if (empty($_GET)) {
    header("location:wisatas.php");
}

$emails = isset($_POST['email']) ? $_POST['email'] : '';

if (!(empty($emails))) {
    $querymaxID = mysqli_query($connection, "SELECT MAX(subscribeID) FROM subscribe");
    $dataID = mysqli_fetch_array($querymaxID);

    $queryEmail = mysqli_query($connection, "SELECT * FROM subscribe WHERE email = '$emails'");
    $dataEmail = mysqli_num_rows($queryEmail);

    if ($dataEmail == 0) {
        $maxID = $dataID["MAX(subscribeID)"];
        $nomor = (int)substr($maxID, 2, 3);
        $nomor++;

        $newID = "S" . sprintf("%03s", $nomor);
        mysqli_query($connection, "INSERT INTO subscribe VALUES (' $newID ', '$emails')");
    }
}
mysqli_close($connection);
