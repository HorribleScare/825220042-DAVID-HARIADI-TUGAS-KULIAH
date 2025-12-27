<!DOCTYPE html>
<?php
include "includes/config.php";
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wisata</title>
	<link href="Wisata.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
</head>

<body>
	<?php include "WisataHeader.php"; ?>
	<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php for ($y = 0; $y < 6; $y++) { ?>
				<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $y; ?>" class="<?php if ($y < 1) {
																											echo 'active';
																										} ?>">
				</li>
			<?php } ?>
		</ol>
		<div class="carousel-inner">
			<?php
			$destinasislider = mysqli_query($connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) ");
			$sumdestinasislider = 0;
			while ($rowdestinasislider = mysqli_fetch_array($destinasislider) and $sumdestinasislider < 6) {
				$sumdestinasislider++;
			?>
				<div class="carousel-item carouselimage <?php if ($sumdestinasislider == 1) {
															echo 'active';
														} ?>">
					<img src="imagesdestinasi/<?php echo $rowdestinasislider['fotofile'] ?>" class="d-block w-100" alt="Indonesia">
					<div class="carousel-caption d-block judulbanner">
						<h1><?php echo $rowdestinasislider['destinasinama'] ?></h1>
					</div>
				</div>
			<?php } ?>
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</button>
	</div>
	<div class="container-fluid">
		<div class="container-xl">
			<div class="row mx-auto">
				<div class="col-md-7">
					<?php
					$berita = mysqli_query($connection, "SELECT * FROM berita ORDER BY beritaID DESC");
					if (mysqli_num_rows($berita) > 0) {
					?>
						<div class="list-group mb-5">
							<div class="col-sm-12 mt-5 mb-4 text-center judultourism">
								<h1>Berita</h1>
								<h5>List of News</h5>
							</div>
							<?php
							$sumberita = 0;
							while ($rowberita = mysqli_fetch_array($berita) and $sumberita < 8) {
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
							<div class="text-center mt-5 morebutton">
								<a href="WisataBerita.php">Discover More</a>
							</div>
						<?php } ?>
						</div>
				</div>
				<div class="col-md-5 bg-light">
					<?php
					$event = mysqli_query($connection, "SELECT * FROM event ORDER BY eventID DESC");
					if (mysqli_num_rows($event) > 0) {
					?>
						<div class="list-group">
							<div class="col-sm-12 mt-5 mb-4 text-center judultourism">
								<h1>Event</h1>
								<h5>List of Event</h5>
							</div>
							<?php
							$sumevent = 0;
							while ($rowevent = mysqli_fetch_array($event) and $sumevent < 4) {
								$sumevent++;
							?>
								<li class="list-group-item border-right-0 border-left-0 border-top-0 border-bottom-0 listevent bg-light">
									<p class="mb-1 text-justify"><?php echo $rowevent["eventTanggalMulai"] ?></p>
									<div class="d-flex w-100 justify-content-between">
										<a href="" class="mb-1 "><?php echo $rowevent["eventNama"] ?></a>
									</div>
								</li>
							<?php } ?>
							<div class="text-center my-5 morebutton">
								<a href="WisataEvent.php">Discover More</a>
							</div>
						<?php } ?>
						</div>
						<?php
						$travel = mysqli_query($connection, "SELECT * FROM travel t LEFT OUTER JOIN kabupaten k ON (t.kabupatenKODE = k.kabupatenKODE) ORDER BY travelID DESC");
						if (mysqli_num_rows($travel) > 0) {
						?>
							<div class="list-group mt-5">
								<div class="col-sm-12 mb-4 text-center judultourism">
									<h1>Travel</h1>
									<h5>List of Travel</h5>
								</div>
								<?php
								$sumtravel = 0;
								while ($rowtravel = mysqli_fetch_array($travel) and $sumtravel < 3) {
									$sumberita++;
								?>
									<li class="list-group-item border-right-0 border-left-0 listtravel bg-light">
										<div class="d-flex w-100 justify-content-between">
											<a href="" class="mb-1 "><?php echo $rowtravel["travelketerangan"] ?></a>
										</div>
										<p class="mb-1 text-justify">Tarif Rp&nbsp;<?php echo $rowtravel["traveltarif"] ?></p>
										<span>Tanggal&nbsp;<?php echo $rowtravel["traveltanggal"] ?>, pukul&nbsp;<?php echo $rowtravel["travelwaktu"] ?></span>
										<a href="" class="float-right kabupaten"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $rowtravel["kabupatenNAMA"] ?></a>
									</li>
								<?php } ?>
								<div class="text-center my-5 morebutton">
									<a href="WisataTravel.php">Discover More</a>
								</div>
							<?php } ?>
							</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid py-5">
		<div class="container-xl">
			<div class="col-md-12 judultourism text-center">
				<h1>Kabupaten</h1>
				<h5>List of Districts</h5>
			</div>
			<div class="row mx-auto mt-5">
				<?php
				$kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
				$sumkabupaten = 0;
				while ($rowkabupaten = mysqli_fetch_array($kabupaten) and $sumkabupaten < 6) {
					$kabupatenkode = $rowkabupaten["kabupatenKODE"];
					$sqlkabupaten = mysqli_query($connection, "SELECT * FROM area WHERE kabupatenKODE = '$kabupatenkode'");
					$jumlahkabupaten = mysqli_num_rows($sqlkabupaten);
					$sumkabupaten++;
				?>
					<div class="col-md-4 tourismgallery">
						<figure class="figure">
							<img src="imageskabupaten/<?php echo $rowkabupaten["kabupatenFOTOICON"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="width: 600px;">
							<div class="nama">
								<?php echo $rowkabupaten["kabupatenNAMA"] ?>
							</div>
							<div class="jumlah">
								<a href="WisataSearch.php?kabupaten=<?php echo $kabupatenkode ?>&value=Destinasi&area=semua"><?php echo $jumlahkabupaten ?> Area</a>
							</div>
						</figure>
					</div>
				<?php } ?>
				<div class="col-md-12 text-center my-4 morebutton">
					<a href="WisataKabupaten.php">Discover More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-light py-5">
		<div class="container-xl bg-light">
			<div class="col-md-12 judultourism text-center">
				<h1>Hotel</h1>
				<h5>List of Hotel</h5>
			</div>
			<div class="owl-carousel owl-theme mt-5">
				<?php
				$hotel = mysqli_query($connection, "SELECT * FROM hotel ORDER BY hotelID DESC");
				$sumhotel = 0;
				while ($rowhotel = mysqli_fetch_array($hotel) and $sumhotel < 8) {
					$sumhotel++;
				?>
					<div class="item">
						<div class="col mb-8">
							<div class="card accord homelist">
								<img src="imageshotel/<?php echo $rowhotel["hotelfoto"] ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><a href="">Hotel&nbsp;<?php echo $rowhotel["hotelnama"] ?></a>
									</h5>
									<p class="card-text"><?php echo $rowhotel["hotelalamat"] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12 text-center mt-4 morebutton">
				<a href="WisataHotel.php">Discover More</a>
			</div>
		</div>
	</div>
	<div class="container-fluid py-5">
		<div class="container-xl">
			<div class="col-md-12 judultourism text-center">
				<h1>Destinasi</h1>
				<h5>List of Destination</h5>
			</div>
			<div class="row mx-auto mt-5">
				<?php
				$destinasi = mysqli_query($connection, "SELECT * FROM destinasi d JOIN kategori k ON (d.kategoriID = k.kategoriID) JOIN fotodestinasi f ON (d.destinasiID = f.destinasiID) ORDER BY d.destinasiID DESC ");
				$sumdestinasi = 0;
				while ($rowdestinasi = mysqli_fetch_array($destinasi) and $sumdestinasi < 6) {
					$sumdestinasi++;
				?>
					<div class="col-md-4 destinasigallery">
						<figure class="figure">
							<img src="imagesdestinasi/<?php echo $rowdestinasi["fotofile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="width: 600px;">
							<div class="nama">
								<a href=""><?php echo $rowdestinasi["destinasinama"] ?></a>
							</div>
						</figure>
					</div>
				<?php } ?>
				<div class="col-md-12 text-center my-4 morebutton">
					<a href="WisataDestinasi.php">Discover More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-light py-5">
		<div class="container-xl bg-light">
			<div class="col-md-12 judultourism text-center">
				<h1>Restoran</h1>
				<h5>List of Restaurant</h5>
			</div>
			<div class="owl-carousel owl-theme mt-5">
				<?php
				$restoran = mysqli_query($connection, "SELECT * FROM restoran ORDER BY restoranID DESC");
				$sumrestoran = 0;
				while ($rowrestoran = mysqli_fetch_array($restoran) and $sumrestoran < 8) {
					$sumrestoran++;
				?>
					<div class="item">
						<div class="col mb-8">
							<div class="card accord homelist">
								<img src="imagesrestoran/<?php echo $rowrestoran["restoranfoto"] ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><a href="">Restoran&nbsp;<?php echo $rowrestoran["restorannama"] ?></a>
									</h5>
									<p class="card-text"><?php echo $rowrestoran["restoranalamat"] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12 text-center mt-4 morebutton">
				<a href="WisataRestoran.php">Discover More</a>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		animateIn: "slide",
		animateOut: "slide",
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			}
		}
	});
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		arrows: false,
		asNavFor: '.slider-for',
		autoplay: true,
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		responsive: [{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
				}
			}
		]
	});
</script>
<?php
mysqli_close($connection);
?>

</html>