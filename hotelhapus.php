<?php
	include "includes/config.php";
    if (empty($_GET)) {
        header("location:hotel.php");
    }

	if(isset($_GET['hapus'])) {
        $IDhotel = $_GET["hapus"];
        
        $hapusfoto = mysqli_query($connection, "SELECT * FROM hotel WHERE hotelID = '$IDhotel'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['hotelfoto'];
        
		mysqli_query($connection, "DELETE FROM hotel WHERE hotelID = '$IDhotel'");
		if (!empty($namafile)) {
        	unlink('imageshotel/'.$namafile);
		}
        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='hotel.php'</script>";
	}
?>