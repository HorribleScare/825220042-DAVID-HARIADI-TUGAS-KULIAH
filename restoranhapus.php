<?php
	include "includes/config.php";
    if (empty($_GET)) {
        header("location:restoran.php");
    }

	if(isset($_GET['hapus'])) {
        $IDrestoran = $_GET["hapus"];
        
        $hapusfoto = mysqli_query($connection, "SELECT * FROM restoran WHERE restoranID = '$IDrestoran'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['restoranfoto'];
        
		mysqli_query($connection, "DELETE FROM restoran WHERE restoranID = '$IDrestoran'");
		if (!empty($namafile)) {
        	unlink('imagesrestoran/'.$namafile);
		}
        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='restoran.php'</script>";
	}
?>