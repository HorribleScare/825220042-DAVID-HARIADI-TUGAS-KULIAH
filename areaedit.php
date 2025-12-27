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

            <?php
            include "includes/config.php";
            if (isset($_POST['Batal'])) {
                header("location:area.php");
            }

            if (isset($_POST['Simpan'])) {
                $areaid = $_POST['inputid'];
                $areanama = $_POST['inputnama'];
                $areawilayah = $_POST['inputwilayah'];
                $areaketerangan = $_POST['inputketerangan'];
                $areakabupaten = $_POST['inputkabupaten'];

                mysqli_query($connection, "UPDATE area SET areanama = '$areanama', areawilayah = '$areawilayah', areaketerangan = '$areaketerangan', kabupatenKODE = '$areakabupaten' WHERE areaID = '$areaid'");
                header("location:area.php");
            }
            $datakabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");

            if (empty($_GET)) {
                header("location:area.php");
            }

            $kodearea = $_GET["ubah"];
            $editarea = mysqli_query($connection, "SELECT * FROM area a LEFT OUTER JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE areaID = '$kodearea'");
            $rowedit = mysqli_fetch_array($editarea);
            ?>

            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Daftar Destinasi Wisata</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            </head>

            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Edit Kategori Wisata</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="areaid" class="col-sm-2 col-form-label">ID Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="areaid" name="inputid" placeholder="ID Area" value="<?php echo $rowedit["areaID"] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="areanama" class="col-sm-2 col-form-label">Nama Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="areanama" name="inputnama" placeholder="Nama Area" value="<?php echo $rowedit["areanama"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="areawilayah" class="col-sm-2 col-form-label">Wilayah Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="areawilayah" name="inputwilayah" placeholder="Wilayah Area" value="<?php echo $rowedit["areawilayah"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="areaketerangan" class="col-sm-2 col-form-label">Keterangan Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="areaketerangan" name="inputketerangan" placeholder="Keterangan Area" value="<?php echo $rowedit["areaketerangan"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="areakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="areakabupaten" name="inputkabupaten">
                                        <option value="<?php echo $rowedit["kabupatenKODE"] ?>"> <?php echo $rowedit["kabupatenKODE"] ?> <?php echo $rowedit["kabupatenNAMA"] ?></option>
                                        <?php while ($row = mysqli_fetch_array($datakabupaten)) { ?>
                                            <option value="<?php echo $row["kabupatenKODE"] ?>">
                                                <?php echo $row["kabupatenKODE"] ?>
                                                <?php echo $row["kabupatenNAMA"] ?>
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
                                <h1 class="display-4">Daftar Area Wisata</h1>
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
                                    <th>Kode</th>
                                    <th>Nama Area</th>
                                    <th>Nama Wilayah</th>
                                    <th>Keterangan</th>
                                    <th>Kode Kabupaten</th>
                                    <th>Nama Kabupaten</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM area a JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE) WHERE areaID like '%" . $search . "%' OR areanama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM area a JOIN kabupaten k ON (a.kabupatenKODE = k.kabupatenKODE)");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['areaID']; ?></td>
                                        <td><?php echo $row['areanama']; ?></td>
                                        <td><?php echo $row['areawilayah']; ?></td>
                                        <td><?php echo $row['areaketerangan']; ?></td>
                                        <td><?php echo $row['kabupatenKODE']; ?></td>
                                        <td><?php echo $row['kabupatenNAMA']; ?></td>
                                        <td><a href="areaedit.php?ubah=<?php echo $row["areaID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="areahapus.php?hapus=<?php echo $row["areaID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
            $('#areakabupaten').select2({
                allowClear: true,
                placeholder: "Pilih Kabupaten"
            });
        });
    </script>
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>