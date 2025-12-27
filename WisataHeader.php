<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:Wisatas.php');
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand mr-5 navbrand" href="Wisatas.php"> <i class="fa fa-plane fa-2x">&nbsp;Wisata</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "Wisatas.php")) { echo "active"; } ?>">
                <a class="nav-link" href="Wisatas.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Provinsi</a>
                <div class="dropdown-menu">
                    <?php
                    $navprovinsi = mysqli_query($connection, "SELECT * FROM provinsi");
                    if ( mysqli_num_rows( $navprovinsi ) > 0 ) {
                        while ( $rownavprovinsi = mysqli_fetch_array( $navprovinsi ) ) {
                            ?>
                    <a class="dropdown-item" href="WisataProvinsi.php?provinsiID=<?php echo $rownavprovinsi["provinsiID"] ?>"><?php echo $rownavprovinsi["provinsinama"]?></a>
                    <?php } } ?>
                </div>
            </li>
            <li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataKabupaten.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataKabupaten.php"> Kabupaten </a>
            </li>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Area</a>
                <div class="dropdown-menu">
                    <?php
                    $navarea = mysqli_query($connection, "SELECT * FROM area a JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE)");
                    if ( mysqli_num_rows( $navarea ) > 0 ) {
                        while ( $rownavarea = mysqli_fetch_array( $navarea ) ) {
                            ?>
                    <a class="dropdown-item" href="WisataSearch.php?kabupaten=<?php echo $rownavarea["kabupatenKODE"] ?>&value=Destinasi&area=<?php echo $rownavarea["areaID"] ?>"><?php echo $rownavarea["areanama"]?></a>
                    <?php } } ?>
                </div>
            </li>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu">
                    <?php
                    $navkategoridestinasi = mysqli_query($connection, "SELECT * FROM kategori");
                    if ( mysqli_num_rows( $navarea ) > 0 ) {
                        while ( $rowkategoridestinasi= mysqli_fetch_array( $navkategoridestinasi ) ) {
                            ?>
                    <a class="dropdown-item" href="WisataKategori.php?kategoriID=<?php echo $rowkategoridestinasi["kategoriID"] ?>"><?php echo $rowkategoridestinasi["kategorinama"]?></a>
                    <?php } } ?>
                </div>
            </li>
			<li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataBerita.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataBerita.php">Berita</a>
            </li>
            <li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataEvent.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataEvent.php">Event</a>
            </li>
			<li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataDestinasi.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataDestinasi.php">Destinasi</a>
            </li>
			<li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataHotel.php")) { echo "active"; }?>">
                <a class="nav-link" href="WisataHotel.php">Hotel</a>
            </li>
			<li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataRestoran.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataRestoran.php">Restoran</a>
            </li>
            <li class="nav-item <?php if(strstr($_SERVER['REQUEST_URI'], "WisataTravel.php")) { echo "active"; } ?>">
                <a class="nav-link" href="WisataTravel.php">Travel</a>
            </li>
        </ul>
    </div>
</nav>
