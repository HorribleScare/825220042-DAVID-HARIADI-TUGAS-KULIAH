<!DOCTYPE html>
<?php include "includes/config.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata - Kabupaten</title>
    <link href="Wisata.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "WisataHeader.php";?>
    <div class="container-fluid">
        <div class="container-xl mt-5 py-5">
            <div class="col-md-12 mt-2 backbutton pl-4">
                <a href="Wisatas.php"><i class="fa fa-arrow-circle-left fa-3x"></i></a>
            </div>
            <div class="col-md-12 judultourism text-center">
                <h1 class="animate__animated animate__zoomIn animate__slow-2s">Kabupaten</h1>
                <h4>List of Districts</h4>
            </div>
            <div class="row mx-auto mt-5">
                <?php
                $jumlahtampilan = 9;
                $halaman = ( isset( $_GET[ 'page' ] ) ) ? $_GET[ 'page' ] : 1;
                $mulaitampilan = ( $halaman - 1 ) * $jumlahtampilan;
                $kabupaten = mysqli_query( $connection, "SELECT * FROM kabupaten limit $mulaitampilan, $jumlahtampilan" );
                while ( $rowkabupaten = mysqli_fetch_array( $kabupaten ) ) {
                    $kabupatenkode = $rowkabupaten[ "kabupatenKODE" ];
                    $sqlkabupaten = mysqli_query( $connection, "SELECT * FROM area WHERE kabupatenKODE = '$kabupatenkode'" );
                    $jumlahkabupaten = mysqli_num_rows( $sqlkabupaten );
                    ?>
                <div class="col-md-4 tourismgallery" id="galleryarea">
                    <figure class="figure">
                        <img src="imageskabupaten/<?php echo $rowkabupaten["kabupatenFOTOICON"]?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="width: 600px;">
                        <div class="nama">
                            <?php echo $rowkabupaten["kabupatenNAMA"]?>
                        </div>
                        <div class="jumlah">
                            <a href="WisataSearch.php?kabupaten=<?php echo $kabupatenkode?>&value=Destinasi&area=semua"><?php echo $jumlahkabupaten ?> Area</a>
                        </div>
                    </figure>
                </div>
                <?php
                }
                $query = mysqli_query( $connection, "SELECT * FROM kabupaten" );
                $jumlahrecord = mysqli_num_rows( $query );
                $jumlahpage = ceil( $jumlahrecord / $jumlahtampilan );
                if ( $jumlahpage > 0 ) {
                    ?>
                <div class="col-md-12 mt-2">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center kolompagination">
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php if ($halaman > 1 ) { echo $nomorhal = $halaman - 1;} else {echo $nomorhal = 1;}?>">Previous</a>
                            </li>
                            <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++) { ?>
                            <li class="page-item <?php if($nomorhal == $halaman) {echo 'active';} ?>" aria-current="page">
                                <?php
                                if ( $nomorhal != $halaman ) {
                                    ?>
                                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                                <?php
                                } else {
                                    ?>
                                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php if ($halaman < $jumlahpage ) { echo $nomorhal = $halaman + 1;} else {echo $nomorhal - 1;}?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php } ?>
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
<?php
mysqli_close( $connection );
?>
</html>
