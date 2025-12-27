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
                header("location:restoran.php");
            }
            if (isset($_POST['Simpan'])) {
                $idrestoran = $_POST['inputid'];
                $namarestoran = $_POST['inputnama'];
                $alamatrestoran = $_POST['inputalamat'];
                $ketrestoran = $_POST['inputket'];
                $kodearea = $_POST['kodearea'];

                $nama = $_FILES['file']['name'];
                $file_tmp = $_FILES["file"]["tmp_name"];

                $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

                if (empty($nama)) {
                    mysqli_query($connection, "UPDATE restoran SET restorannama = '$namarestoran', restoranalamat = '$alamatrestoran', restoranketerangan = '$ketrestoran', areaID = '$kodearea' WHERE restoranID = '$idrestoran'");
                    header("location:restoran.php");
                } else {
                    move_uploaded_file($file_tmp, 'imagesrestoran/' . $nama);
                    mysqli_query($connection, "UPDATE restoran SET restorannama = '$namarestoran', restoranalamat = '$alamatrestoran', restoranketerangan = '$ketrestoran', restoranfoto = '$nama', areaID = '$kodearea' WHERE restoranID = '$idrestoran'");
                    header("location:restoran.php");
                }
            }

            $dataarea = mysqli_query($connection, "SELECT * FROM area");
            if (empty($_GET)) {
                header("location:restoran.php");
            }
            $restoranid = $_GET["ubah"];
            $editrestoran = mysqli_query($connection, "SELECT * FROM restoran WHERE restoranID = '$restoranid'");

            $rowedit = mysqli_fetch_array($editrestoran);

            $editarea = mysqli_query($connection, "SELECT * FROM restoran h JOIN area a ON (h.areaID = a.areaID) WHERE restoranID = '$restoranid'");

            $rowedit2 = mysqli_fetch_array($editarea);
            ?>

            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Edit restoran</h1>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="idrestoran" class="col-sm-2 col-form-label">ID restoran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idrestoran" name="inputid" placeholder="ID restoran" maxlength="4" value="<?php echo $rowedit["restoranID"] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namarestoran" class="col-sm-2 col-form-label">Nama restoran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namarestoran" name="inputnama" placeholder="Nama restoran" value="<?php echo $rowedit["restorannama"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatrestoran" class="col-sm-2 col-form-label">Alamat restoran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namarestoran" name="inputalamat" placeholder="Alamat restoran" value="<?php echo $rowedit["restoranalamat"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketrestoran" class="col-sm-2 col-form-label">Keterangan restoran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ketrestoran" name="inputket" placeholder="Keterangan restoran" value="<?php echo $rowedit["restoranketerangan"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Foto restoran</label>
                                <div class="col-sm-10">
                                    <input type="file" id="file" name="file" accept="image/jpeg, image/webp, image/png" onchange="loadFile(event)">
                                    <img id="output" src="imagesrestoran/<?php echo $rowedit['restoranfoto'] ?>" style="width: 200px" height="100px">
                                    <p class="form-text">Field ini digunakan untuk unggah file</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaarea" class="col-sm-2 col-form-label">Nama Area</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="namaarea" name="kodearea">
                                        <option value="<?php echo $rowedit["areaID"] ?>"><?php echo $rowedit["areaID"] ?> <?php echo $rowedit2["areanama"] ?></option>
                                        <?php while ($row = mysqli_fetch_array($dataarea)) { ?>
                                            <option value="<?php echo $row["areaID"] ?>">
                                                <?php echo $row["areaID"] ?>
                                                <?php echo $row["areanama"] ?>
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
                                <h1 class="display-4">Daftar restoran</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                                    echo $_POST['search'];
                                                                                                                } ?>" placeholder="Search ID, nama">
                                </div>
                                <input type="submit" name="kirim" class="col-md-2 btn btn-primary mx-3" value="Search">
                            </div>
                        </form>
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>ID restoran</th>
                                    <th>Nama restoran</th>
                                    <th>Alamat restoran</th>
                                    <th>Keterangan restoran</th>
                                    <th>Foto restoran</th>
                                    <th>ID Area</th>
                                    <th>Nama Kabupaten</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM restoran h LEFT OUTER JOIN area a ON (h.areaID = a.areaID) LEFT OUTER JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE h.restoranID like '%" . $search . "%' OR h.restorannama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM restoran h LEFT OUTER JOIN area a ON (h.areaID = a.areaID) LEFT OUTER JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE)");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['restoranID']; ?></td>
                                        <td><?php echo $row['restorannama']; ?></td>
                                        <td><?php echo $row['restoranalamat']; ?></td>
                                        <td><?php echo $row['restoranketerangan']; ?></td>
                                        <td><?php if (is_file("imagesrestoran/" . $row['restoranfoto'])) { ?>
                                                <img src="imagesrestoran/<?php echo $row['restoranfoto'] ?>" width="80">
                                            <?php } else
                                                echo "<img src='imagesrestoran/noimage.jpg' width='80'>" ?>
                                        </td>
                                        <td><?php echo $row['areaID']; ?></td>
                                        <td><?php echo $row['kabupatenNAMA']; ?></td>
                                        <td><a href="restoranedit.php?ubah=<?php echo $row["restoranID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="restoranhapus.php?hapus=<?php echo $row["restoranID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
            $('#namaarea').select2({
                allowClear: true,
                placeholder: "Pilih Nama Area"
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