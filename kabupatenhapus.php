<?php
	include "includes/config.php";

    if (empty($_GET)) {
        header("location:kabupaten.php");
    }

	if(isset($_GET['hapus'])) {
        $kodekabupaten = $_GET["hapus"];
        
        $hapuskabupaten = mysqli_query($connection, "SELECT * FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten'");
        $hapus = mysqli_fetch_array($hapuskabupaten);
        $namafile = $hapus['kabupatenFOTOICON'];
        
		mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten'");
		if (!empty($namafile)) {
        	unlink('imageskabupaten/'.$namafile);
		}
        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='kabupaten.php'</script>";
	}
?>