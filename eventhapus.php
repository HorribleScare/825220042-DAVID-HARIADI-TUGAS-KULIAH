<?php
	include "includes/config.php";

    if (empty($_GET)) {
        header("location:event.php");
    }

	if(isset($_GET['hapus'])) {
        $idevent = $_GET["hapus"];
        
        $hapusevent = mysqli_query($connection, "SELECT * FROM event WHERE eventID = '$idevent'");
        $hapus = mysqli_fetch_array($hapusevent);
        $namafile = $hapus['eventFoto'];
        
		mysqli_query($connection, "DELETE FROM event WHERE eventID = '$idevent'");
        if (!empty($namafile)) {
            unlink('imagesevent/'.$namafile);
        }
        
		echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='event.php'</script>";
	}
?>