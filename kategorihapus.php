<?php
	include "includes/config.php";

    if (empty($_GET)) {
        header("location:kategori.php");
    }

	if(isset($_GET['hapus'])) {
        $kodekategori = $_GET["hapus"];
		mysqli_query($connection, "DELETE FROM kategori WHERE kategoriID = '$kodekategori'");
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='kategori.php'</script>";
	}
?>