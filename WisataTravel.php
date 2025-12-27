<!DOCTYPE html>
<?php
include "includes/config.php";

$jumlahtampilan = 5;
$halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
$mulaitampilan = ($halaman - 1) * $jumlahtampilan;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata - Travel</title>
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
    <?php include "WisataHeader.php" ?>
    <div class="container-fluid">
        <div class="container-xl mt-5 py-5">
            <div class="row mx-auto">
                <div class="col-md-12 mt-2 backbutton pl-4">
                    <a href="Wisatas.php"><i class="fa fa-arrow-circle-left fa-3x"></i></a>
                </div>
                <div class="col-md-12 judultourism text-center mb-5">
                    <h1>Travel</h1>
                    <h5>List of Travel</h5>
                </div>
                <div class="col-md-8">
                    <?php
                    $querytravel = mysqli_query($connection, "SELECT * FROM travel t LEFT OUTER JOIN kabupaten k ON (t.kabupatenKODE = k.kabupatenKODE) ORDER BY travelID DESC limit $mulaitampilan, $jumlahtampilan ");
                    if (mysqli_num_rows($querytravel) > 0) {
                        while ($rowtravel = mysqli_fetch_array($querytravel)) {
                    ?>
                            <li class="list-group-item border-right-0 border-left-0 listtravel">
                                <div class="d-flex w-100 justify-content-between">
                                    <a href="" class="mb-1 "><?php echo $rowtravel["travelketerangan"] ?></a>
                                </div>
                                <p class="mb-1 text-justify">Tarif Rp&nbsp;<?php echo $rowtravel["traveltarif"] ?></p>
                                <span>Tanggal&nbsp;<?php echo $rowtravel["traveltanggal"] ?>, pukul&nbsp;<?php echo $rowtravel["travelwaktu"] ?></span>
                                <a href="" class="float-right kabupaten"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $rowtravel["kabupatenNAMA"] ?></a>
                            </li>
                        <?php
                        }
                    }
                    $querytravel = mysqli_query($connection, "SELECT * FROM travel t LEFT OUTER JOIN kabupaten k ON (t.kabupatenKODE = k.kabupatenKODE) ORDER BY travelID DESC");
                    $jumlahrecord = mysqli_num_rows($querytravel);
                    $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                    if ($jumlahpage > 0) {
                        ?>
                        <div class="col-md-12 mt-5">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center kolompagination">
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php if ($halaman > 1) {
                                                                                echo $nomorhal = $halaman - 1;
                                                                            } else {
                                                                                echo $nomorhal = 1;
                                                                            } ?>">Previous</a>
                                    </li>
                                    <?php for ($nomorhal = 1; $nomorhal <= $jumlahpage; $nomorhal++) { ?>
                                        <li class="page-item <?php if ($nomorhal == $halaman) {
                                                                    echo 'active';
                                                                } ?>" aria-current="page">
                                            <?php
                                            if ($nomorhal != $halaman) {
                                            ?>
                                                <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a class="page-link" href="?page=<?php echo $nomorhal ?>"><?php echo $nomorhal ?></a>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php if ($halaman < $jumlahpage) {
                                                                                echo $nomorhal = $halaman + 1;
                                                                            } else {
                                                                                echo $nomorhal - 1;
                                                                            } ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-4 bg-light">
                    <?php
                    $berita = mysqli_query($connection, "SELECT * FROM berita ORDER BY beritaID DESC");
                    if (mysqli_num_rows($berita) > 0) {
                    ?>
                        <div class="list-group mt-4">
                            <div class="col-sm-12 judul">
                                <h3>Berita</h3>
                            </div>
                            <?php
                            $sumberita = 0;
                            while ($rowberita = mysqli_fetch_array($berita) and $sumberita < 4) {
                                $sumberita++;
                            ?>
                                <li class="list-group-item border-right-0 border-left-0 listberita">
                                    <div class="d-flex w-100 justify-content-between">
                                        <a href="" class="mb-1 "><?php echo $rowberita["beritajudul"] ?></a>
                                    </div>
                                    <p class="mb-1 text-justify"><?php echo $rowberita["beritainti"] ?></p>
                                    <small class="text-muted"><?php echo $rowberita["penulis"] ?> - <?php echo $rowberita["penerbit"] ?></small>
                                    <small class="text-muted float-right"><i class="fa fa-calendar-o"></i>&ensp;<?php echo $rowberita["tanggalterbit"] ?></small>
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
<?php include "WisataFooter.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<?php
mysqli_close($connection);
?>

</html>