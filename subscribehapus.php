<?php
include "includes/config.php";
if (empty($_GET)) {
    header("location:subscribe.php");
}

if (isset($_GET['hapus'])) {
    $IDsubscribe = $_GET["hapus"];
    mysqli_query($connection, "DELETE FROM subscribe WHERE subscribeID = '$IDsubscribe'");

    echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='subscribe.php'</script>";
}
