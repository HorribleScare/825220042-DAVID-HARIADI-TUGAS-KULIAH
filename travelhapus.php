<?php
	include "includes/config.php";

    if (empty($_GET)) {
        header("location:travel.php");
    }

	if(isset($_GET['hapus'])) {
        $idtravel = $_GET["hapus"];

		mysqli_query($connection, "DELETE FROM travel WHERE travelID = '$idtravel'");        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='travel.php'</script>";
	}
?>