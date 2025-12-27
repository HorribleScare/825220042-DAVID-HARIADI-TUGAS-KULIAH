<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WISATA</title>
</head>

<body>
    <?php
    ob_start();
    session_start();
    if (!isset($_SESSION['emailuser']))
        header("location:login.php");
    ?>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">


            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>DESTINASI WISATA</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            </head>

            <?php
            include "includes/config.php";
            if (isset($_POST['Batal'])) {
                header("location:kabupaten.php");
            }
            if (isset($_POST['Simpan'])) {
                $kodekabupaten = $_POST['inputkode'];
                $namakabupaten = $_POST['inputnama'];
                $alamatkabupaten = $_POST['inputalamat'];
                $keterangankabupaten = $_POST['inputketkabupaten'];
                $keteranganikon = $_POST['inputketikon'];
                $idprovinsi = $_POST['provinsi'];

                $ikonkabupaten = $_FILES['file']['name'];
                $file_tmp = $_FILES["file"]["tmp_name"];

                if (empty($ikonkabupaten)) {
                    mysqli_query($connection, "UPDATE kabupaten SET kabupatenNAMA = '$namakabupaten', kabupatenALAMAT = '$alamatkabupaten', kabupatenKET = '$keterangankabupaten', kabupatenFOTOICONKET = '$keteranganikon', provinsiID = '$idprovinsi' WHERE kabupatenKODE = '$kodekabupaten'");
                    header("location:kabupaten.php");
                } else {
                    $ekstensifile = pathinfo($ikonkabupaten, PATHINFO_EXTENSION);
                    move_uploaded_file($file_tmp, 'imageskabupaten/' . $ikonkabupaten);
                    mysqli_query($connection, "UPDATE kabupaten SET kabupatenNAMA = '$namakabupaten', kabupatenALAMAT = '$alamatkabupaten', kabupatenKET = '$keterangankabupaten', kabupatenFOTOICON = '$ikonkabupaten', kabupatenFOTOICONKET = '$keteranganikon', provinsiID = '$idprovinsi' WHERE kabupatenKODE = '$kodekabupaten'");
                    header("location:kabupaten.php");
                }
            }

            if (empty($_GET)) {
                header("location:kabupaten.php");
            }
            $dataprovinsi = mysqli_query($connection, "SELECT * FROM provinsi");

            $ubahkabupaten = $_GET["ubah"];
            $editkabupaten = mysqli_query($connection, "SELECT * FROM kabupaten k LEFT OUTER JOIN provinsi p ON (k.provinsiID = p.provinsiID) WHERE kabupatenKODE = '$ubahkabupaten'");

            $rowedit = mysqli_fetch_array($editkabupaten);
            ?>

            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Edit Kabupaten</h1>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="kodekabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodekabupaten" name="inputkode" placeholder="Kode Kabupaten" maxlength="4" value="<?php echo $rowedit["kabupatenKODE"] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namakabupaten" name="inputnama" placeholder="Nama Kabupaten" value="<?php echo $rowedit["kabupatenNAMA"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatkabupaten" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamatkabupaten" name="inputalamat" placeholder="Alamat Kabupaten" value="<?php echo $rowedit["kabupatenALAMAT"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangankabupaten" class="col-sm-2 col-form-label">Keterangan Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keterangankabupaten" name="inputketkabupaten" placeholder="Keterangan Kabupaten" value="<?php echo $rowedit["kabupatenKET"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Foto Ikon</label>
                                <div class="col-sm-10">
                                    <input type="file" id="file" name="file" accept="image/jpeg, image/webp, image/png" onchange="loadFile(event)">
                                    <img id="output" src="imageskabupaten/<?php echo $rowedit['kabupatenFOTOICON'] ?>" style="width: 200px" height="100px">
                                    <p class="form-text">Field ini digunakan untuk unggah file</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keteranganikon" class="col-sm-2 col-form-label">Keterangan Ikon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keteranganikon" name="inputketikon" placeholder="Keterangan Ikon" value="<?php echo $rowedit["kabupatenFOTOICONKET"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
								<label for="provinsi" class="col-sm-2 col-form-label">Nama Provinsi</label>
								<div class="col-sm-10">
									<select class="form-control" id="provinsi" name="provinsi">
                                    <option value="<?php echo $rowedit["provinsiID"] ?>"> <?php echo $rowedit["provinsiID"] ?> <?php echo $rowedit["provinsinama"] ?></option>
										<?php while ($row = mysqli_fetch_array($dataprovinsi)) { ?>
											<option value="<?php echo $row["provinsiID"] ?>">
												<?php echo $row["provinsiID"] ?>
												<?php echo $row["provinsinama"] ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                                    <input type="submit" class="btn btn-secondary" value="Batal" name="Batal">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-xl mt-5">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Daftar Kabupaten</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                                    echo $_POST['search'];
                                                                                                                } ?>" placeholder="Search kode, nama">
                                </div>
                                <input type="submit" name="kirim" class="col-md-2 btn btn-primary mx-3" value="Search">
                            </div>
                        </form>
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kabupaten</th>
                                    <th>Nama Kabupaten</th>
                                    <th>Alamat Kabupaten</th>
                                    <th>Keterangan Kabupaten</th>
                                    <th>Ikon Kabupaten</th>
                                    <th>Keterangan Ikon Kabupaten</th>
                                    <th>Nama Provinsi</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM kabupaten k LEFT OUTER JOIN provinsi p ON (k.provinsiID = p.provinsiID) WHERE kabupatenKODE like '%" . $search . "%' OR kabupatenNAMA like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM kabupaten k LEFT OUTER JOIN provinsi p ON (k.provinsiID = p.provinsiID)");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['kabupatenKODE']; ?></td>
                                        <td><?php echo $row['kabupatenNAMA']; ?></td>
                                        <td><?php echo $row['kabupatenALAMAT']; ?></td>
                                        <td><?php echo $row['kabupatenKET']; ?></td>
                                        <td><?php if (is_file("imageskabupaten/" . $row['kabupatenFOTOICON'])) { ?>
                                                <img src="imageskabupaten/<?php echo $row['kabupatenFOTOICON'] ?>" width="80">
                                            <?php } else
                                                echo "<img src='imageskabupaten/noimage.jpg' width='80'>" ?>
                                        </td>
                                        <td><?php echo $row['kabupatenFOTOICONKET']; ?></td>
                                        <td><?php echo $row['provinsinama']; ?></td>
                                        <td><a href="kabupatenedit.php?ubah=<?php echo $row["kabupatenKODE"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="kabupatenhapus.php?hapus=<?php echo $row["kabupatenKODE"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                    <?php $nomor = $nomor + 1; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#provinsi').select2({
                allowClear: true,
                placeholder: "Pilih Provinsi"
            });
        });
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>