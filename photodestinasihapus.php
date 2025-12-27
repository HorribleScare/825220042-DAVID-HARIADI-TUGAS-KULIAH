<?php
	include "includes/config.php";
    if (empty($_GET)) {
        header("location:photodestinasi.php");
    }

	if(isset($_GET['hapus'])) {
        $kodefoto = $_GET["hapus"];
        
        $hapusfoto = mysqli_query($connection, "SELECT * FROM fotodestinasi WHERE fotoID = '$kodefoto'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['fotofile'];
        
		mysqli_query($connection, "DELETE FROM fotodestinasi WHERE fotoID = '$kodefoto'");
		if (!empty($namafile)) {
        	unlink('imagesdestinasi/'.$namafile);
		}
        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='photodestinasi.php'</script>";
	}
?>