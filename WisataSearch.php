<!DOCTYPE html>
<?php
include "includes/config.php";
if ( empty( $_GET ) ) {
    header( "location:Wisatas.php" );
}
$kodekabupaten = $_GET[ 'kabupaten' ];
$jumlahtampilan = 5;
$halaman = ( isset( $_GET[ 'page' ] ) ) ? $_GET[ 'page' ] : 1;
$mulaitampilan = ( $halaman - 1 ) * $jumlahtampilan;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata - Search</title>
    <link href="Wisata.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "WisataHeader.php"?>
    <div class="container-fluid">
        <div class="container-xl mt-5 py-5">
            <div class="row mx-auto">
                <div class="col-md-12 mt-2 backbutton pl-4">
                    <a href="WisataKabupaten.php"><i class="fa fa-arrow-circle-left fa-3x"></i></a>
                </div>
                <div class="col-md-12 mt-4">
                    <?php
                    $querykabupaten = mysqli_query( $connection, "SELECT * FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten' " );
                    if ( mysqli_num_rows( $querykabupaten ) > 0 ) {
                        while ( $rowkabupaten = mysqli_fetch_array( $querykabupaten ) ) {
                            ?>
                    <div class="row mx-auto">
                        <div class="col-md-8 kolomkabupaten">
                            <h2>Kabupaten&nbsp;<?php echo $rowkabupaten['kabupatenNAMA'] ?></h2>
                            <p class="alamat"><?php echo $rowkabupaten['kabupatenALAMAT'] ?></p>
                            <p class="text-justify"><?php echo $rowkabupaten['kabupatenKET'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <img src="imageskabupaten/<?php echo $rowkabupaten["kabupatenFOTOICON"]?>" class="img-fluid w-100 rounded" alt="Gambar Tidak Ada">
                            <small><?php echo $rowkabupaten['kabupatenFOTOICONKET'] ?></small>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-md-12 mt-5">
                    <ul class="nav nav-tabs kolomtab">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET[ "value" ] == 'Destinasi') {echo 'active';} ?>" href="WisataSearch.php?kabupaten=<?php echo $kodekabupaten?>&value=Destinasi&area=semua">Destinasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET[ "value" ] == 'Hotel') {echo 'active';} ?>" href="WisataSearch.php?kabupaten=<?php echo $kodekabupaten?>&value=Hotel&area=semua">Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET[ "value" ] == 'Restoran') {echo 'active';} ?>" href="WisataSearch.php?kabupaten=<?php echo $kodekabupaten?>&value=Restoran&area=semua">Restoran</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mt-2">
                    <select class="form-control" name="kodearea" id="kodearea">
                        <?php
                        $kodearea = $_GET[ "area" ];
                        $dataareanow = mysqli_query( $connection, "SELECT * FROM area WHERE areaID = '$kodearea'" );
                        $rownow = mysqli_fetch_array( $dataareanow );
                        ?>
                        <?php if ( mysqli_num_rows( $dataareanow ) > 0 ) { ?>
                        <option value="<?php echo $rownow["areaID"] ?>"><?php echo $rownow["areanama"]?></option>
                        <?php } ?>
                        <option value="semua">Semua Area</option>
                        <?php
                        $dataarea = mysqli_query( $connection, "SELECT * FROM area WHERE kabupatenKODE = '$kodekabupaten'" );
                        while ( $row = mysqli_fetch_array( $dataarea ) ) {
                            if ( $row[ "areaID" ] != $kodearea ) {
                                ?>
                        <option value="<?php echo $row["areaID"] ?>"><?php echo $row["areanama"]?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="col-md-8 mt-2"></div>
                <div class="col-md-8 mt-5">
                    <?php
                    $areaid = $_GET[ "area" ];
                    if ( $_GET[ "value" ] == 'Destinasi' ) {
                        if ( $areaid == 'semua' ) {
                            $querydestinasi = mysqli_query( $connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten b ON (a.kabupatenKODE = b.kabupatenKODE ) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY d.destinasiID DESC limit $mulaitampilan, $jumlahtampilan " );
                        } else {
                            $querydestinasi = mysqli_query( $connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten b ON (a.kabupatenKODE = b.kabupatenKODE ) WHERE a.kabupatenKODE = '$kodekabupaten' AND d.areaID = '$areaid' ORDER BY d.destinasiID DESC limit $mulaitampilan, $jumlahtampilan " );
                        }
                        if ( mysqli_num_rows( $querydestinasi ) > 0 ) {
                            while ( $rowdestinasi = mysqli_fetch_array( $querydestinasi ) ) {
                                ?>
                    <div class="media mb-4 list">
                        <div class="row mx-auto">
                            <div class="col-sm-4">
                                <img src="imagesdestinasi/<?php echo $rowdestinasi["fotofile"]?>" class="align-self-start img-fluid w-100 rounded" alt="Gambar Tidak Ada">
                            </div>
                            <div class="col-sm-8 mt-2">
                                <div class="media-body text-justify kolomketerangan">
                                    <h5 class="mt-0 mb-1"><strong><a href="#"><?php echo $rowdestinasi["destinasinama"]?></a>
                                        </strong></h5>
                                    <p><strong><?php echo $rowdestinasi["destinasialamat"]?></strong></p>
                                    <p><?php echo $rowdestinasi["kategoriketerangan"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    } elseif ( $_GET[ "value" ] == 'Hotel' ) {
                            if ( $areaid == 'semua' ) {
                                $queryhotel = mysqli_query( $connection, "SELECT * FROM hotel h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY h.hotelID DESC limit $mulaitampilan, $jumlahtampilan " );
                            } else {
                                $queryhotel = mysqli_query( $connection, "SELECT * FROM hotel h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' AND h.areaID = '$areaid' ORDER BY h.hotelID DESC limit $mulaitampilan, $jumlahtampilan " );
                            }
                            if ( mysqli_num_rows( $queryhotel ) > 0 ) {
                                while ( $rowhotel = mysqli_fetch_array( $queryhotel ) ) {
                                    ?>
                    <div class="media mb-4 list">
                        <div class="row mx-auto">
                            <div class="col-sm-4">
                                <img src="imageshotel/<?php echo $rowhotel["hotelfoto"]?>" class="align-self-start img-fluid w-100 rounded" alt="Gambar Tidak Ada">
                            </div>
                            <div class="col-sm-8 mt-2">
                                <div class="media-body text-justify kolomketerangan">
                                    <h5 class="mt-0 mb-1"><strong><a href="">Hotel&nbsp;<?php echo $rowhotel["hotelnama"]?></a>
                                        </strong></h5>
                                    <p><strong><?php echo $rowhotel["hotelalamat"]?></strong></p>
                                    <p><?php echo $rowhotel["hotelketerangan"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    } else if ( $_GET[ "value" ] == 'Restoran' ) {
                        if ( $areaid == 'semua' ) {
                            $queryrestoran = mysqli_query( $connection, "SELECT * FROM restoran h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY h.restoranID DESC limit $mulaitampilan, $jumlahtampilan " );
                        } else {
                            $queryrestoran = mysqli_query( $connection, "SELECT * FROM restoran h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' AND h.areaID = '$areaid' ORDER BY h.restoranID DESC limit $mulaitampilan, $jumlahtampilan " );
                        }
                        if ( mysqli_num_rows( $queryrestoran ) > 0 ) {
                            while ( $rowrestoran = mysqli_fetch_array( $queryrestoran ) ) {
                                ?>
                    <div class="media mb-4 list">
                        <div class="row mx-auto">
                            <div class="col-sm-4">
                                <img src="imagesrestoran/<?php echo $rowrestoran["restoranfoto"]?>" class="align-self-start img-fluid w-100 rounded" alt="Gambar Tidak Ada">
                            </div>
                            <div class="col-sm-8 mt-2">
                                <div class="media-body text-justify kolomketerangan">
                                    <h5 class="mt-0 mb-1"><strong><a href="">Restoran&nbsp;<?php echo $rowrestoran["restorannama"]?></a>
                                        </strong></h5>
                                    <p><strong><?php echo $rowrestoran["restoranalamat"]?></strong></p>
                                    <p><?php echo $rowrestoran["restoranketerangan"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    }
                    ?>
                    <?php
                    if ( $_GET[ "value" ] == 'Destinasi' ) {
                        if ( $areaid == 'semua' ) {
                            $querydestinasi = mysqli_query( $connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten b ON (a.kabupatenKODE = b.kabupatenKODE ) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY d.destinasiID DESC " );
                            $jumlahrecord = mysqli_num_rows( $querydestinasi );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        } else {
                            $querydestinasi = mysqli_query( $connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten b ON (a.kabupatenKODE = b.kabupatenKODE ) WHERE a.kabupatenKODE = '$kodekabupaten' AND d.areaID = '$areaid' ORDER BY d.destinasiID DESC " );
                            $jumlahrecord = mysqli_num_rows( $querydestinasi );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        }
                    } else if ( $_GET[ "value" ] == 'Hotel' ) {
                        if ( $areaid == 'semua' ) {
                            $queryhotel = mysqli_query( $connection, "SELECT * FROM hotel h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY h.hotelID DESC " );
                            $jumlahrecord = mysqli_num_rows( $queryhotel );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        } else {
                            $queryhotel = mysqli_query( $connection, "SELECT * FROM hotel h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' AND h.areaID = '$areaid' ORDER BY h.hotelID DESC " );
                            $jumlahrecord = mysqli_num_rows( $queryhotel );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        }
                    } else if ( $_GET[ "value" ] == 'Restoran' ) {
                        if ( $areaid == 'semua' ) {
                            $queryrestoran = mysqli_query( $connection, "SELECT * FROM restoran h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY h.restoranID DESC " );
                            $jumlahrecord = mysqli_num_rows( $queryrestoran );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        } else {
                            $queryrestoran = mysqli_query( $connection, "SELECT * FROM restoran h JOIN area a ON (h.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' AND h.areaID = '$areaid' ORDER BY h.restoranID DESC " );
                            $jumlahrecord = mysqli_num_rows( $queryrestoran );
                            $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                        }
                    }
                    if ( $jumlahpage > 0 ) {
                        ?>
                    <div class="col-md-12 mt-2">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center kolompagination">
                                <li class="page-item">
                                    <a class="page-link" href="?kabupaten=<?php echo $kodekabupaten?>&value=<?php echo $_GET[ "value" ]?>&area=<?php echo $areaid?>&page=<?php if ($halaman > 1 ) { echo $nomorhal = $halaman - 1;} else {echo $nomorhal = 1;}?>">Previous</a>
                                </li>
                                <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++) { ?>
                                <li class="page-item <?php if($nomorhal == $halaman) {echo 'active';} ?>" aria-current="page">
                                    <?php
                                    if ( $nomorhal != $halaman ) {
                                        ?>
                                    <a class="page-link" href="?kabupaten=<?php echo $kodekabupaten?>&value=<?php echo $_GET[ "value" ]?>&area=<?php echo $areaid?>&page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                                    <?php
                                    } else {
                                        ?>
                                    <a class="page-link" href="?kabupaten=<?php echo $kodekabupaten?>&value=<?php echo $_GET[ "value" ]?>&area=<?php echo $areaid?>&page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="?kabupaten=<?php echo $kodekabupaten?>&value=<?php echo $_GET[ "value" ]?>&area=<?php echo $areaid?>&page=<?php if ($halaman < $jumlahpage ) { echo $nomorhal = $halaman + 1;} else {echo $nomorhal - 1;}?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-4 bg-light">
                    <?php
                    $queryarea = mysqli_query( $connection, "SELECT * FROM area WHERE areaID = '$areaid' " );
                    $rowarea = mysqli_fetch_array( $queryarea );
                    if ( mysqli_num_rows( $queryarea ) > 0 ) {
                        ?>
                    <div class="card mt-5">
                        <div class="card-body text-justify kolomarea">
                            <h3 class="card-title"><?php echo $rowarea["areanama"]?></h3>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $rowarea["areawilayah"]?></h6>
                            <p class="card-text"><?php echo $rowarea["areaketerangan"]?></p>
                        </div>
                    </div>
                    <?php
                    }
                    if ( $areaid == 'semua' ) {
                        $berita = mysqli_query( $connection, "SELECT * FROM berita b JOIN destinasi d ON (b.destinasiID = d.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE a.kabupatenKODE = '$kodekabupaten' ORDER BY b.beritaID DESC" );
                    } else {
                        $berita = mysqli_query( $connection, "SELECT * FROM berita b JOIN destinasi d ON (b.destinasiID = d.destinasiID) JOIN area a ON (d.areaID = a.areaID) JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE d.areaID = '$areaid' and a.kabupatenKODE = '$kodekabupaten' ORDER BY b.beritaID DESC " );
                    }
                    if ( mysqli_num_rows( $berita ) > 0 ) {
                        ?>
                    <div class="list-group mt-4">
                        <div class="col-sm-12 judul">
                            <h3>Berita</h3>
                        </div>
                        <?php
                        $sumberita = 0;
                        while ( $rowberita = mysqli_fetch_array( $berita )and $sumberita < 4 ) {
                            $sumberita++;
                            ?>
                        <li class="list-group-item border-right-0 border-left-0 listberita">
                            <div class="d-flex w-100 justify-content-between">
                                <a href="" class="mb-1 "><?php echo $rowberita["beritajudul"]?></a>
                            </div>
                            <p class="mb-1 text-justify"><?php echo $rowberita["beritainti"]?></p>
                            <small class="text-muted"><?php echo $rowberita["penulis"]?> - <?php echo $rowberita["penerbit"]?></small>
                            <small class="text-muted float-right"><i class="fa fa-calendar-o"></i>&ensp;<?php echo $rowberita["tanggalterbit"]?></small>
                        </li>
                        <?php } ?> 
                        <div class="text-center mt-2 beritamorebutton">
                            <a href="WisataBerita.php">Discover More</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "WisataFooter.php";?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kodearea').select2({
            
        });    
        $('#kodearea').on("select2:select", function(e) {
            var select_val = $(e.currentTarget).val();
            window.location.href = "WisataSearch.php?kabupaten=<?php echo $kodekabupaten?>&value=<?php echo $_GET[ "value" ]; ?>&area="+select_val;
        });
    });
</script>
<?php
mysqli_close( $connection );
?>
</html>