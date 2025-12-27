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
            if (isset($_POST['Simpan'])) {
                if (isset($_REQUEST['inputkode'])) {
                    $destinasikode = $_REQUEST['inputkode'];
                }
                if (!empty($destinasikode)) {
                    $destinasikode = $_REQUEST['inputkode'];
                    $destinasinama = $_POST['inputnama'];
                    $destinasialamat = $_POST['inputalamat'];
                    $kodekategori = $_POST['kodekategori'];
                    $kodearea = $_POST['kodearea'];

                    mysqli_query($connection, "INSERT INTO destinasi VALUES ('$destinasikode', '$destinasinama', '$destinasialamat', '$kodekategori', '$kodearea' )");
                    header("location:destinasi.php");
                } else {
                    echo "<script>alert('ANDA HARUS MENGISI DATA'); document.location='destinasi.php'</script>";
                }
            }

            $datakategori = mysqli_query($connection, "SELECT * FROM kategori");
            $dataarea = mysqli_query($connection, "SELECT * FROM area");
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
                                <h1 class="display-4">Input Destinasi Wisata</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="kodedestinasi" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodedestinasi" name="inputkode" placeholder="ID Destinasi" maxlength="4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namadestinasi" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namadestinasi" name="inputnama" placeholder="Nama Destinasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatdestinasi" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamatdestinasi" name="inputalamat" placeholder="Alamat Destinasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kodekategori" id="kodekategori">
                                        <?php while ($row = mysqli_fetch_array($datakategori)) { ?>
                                            <option value="<?php echo $row["kategoriID"] ?>">
                                                <?php echo $row["kategoriID"] ?>
                                                <?php echo $row["kategorinama"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Area</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kodearea" id="kodearea">
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
                                    <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-xl mt-5">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Daftar Destinasi Wisata</h1>
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
                                    <th>ID Destinasi</th>
                                    <th>Nama Destinasi</th>
                                    <th>Alamat Destinasi</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Kode Area</th>
                                    <th>Nama Area</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT d.destinasiID, d.destinasinama, d.destinasialamat, d.kategoriID, k.kategorinama, d.areaID, a.areanama from destinasi d LEFT OUTER JOIN area a ON (d.areaID = a.areaID) LEFT OUTER JOIN kategori k ON (d.kategoriID = k.kategoriID) WHERE d.destinasiID like '%" . $search . "%' OR d.destinasinama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT d.destinasiID, d.destinasinama, d.destinasialamat, d.kategoriID, k.kategorinama, d.areaID, a.areanama from destinasi d LEFT OUTER JOIN area a ON (d.areaID = a.areaID) LEFT OUTER JOIN kategori k ON (d.kategoriID = k.kategoriID)");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['destinasiID']; ?></td>
                                        <td><?php echo $row['destinasinama']; ?></td>
                                        <td><?php echo $row['destinasialamat']; ?></td>
                                        <td><?php echo $row['kategoriID']; ?></td>
                                        <td><?php echo $row['kategorinama']; ?></td>
                                        <td><?php echo $row['areaID']; ?></td>
                                        <td><?php echo $row['areanama']; ?></td>
                                        <td><a href="destinasiedit.php?ubah=<?php echo $row["destinasiID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="destinasihapus.php?hapus=<?php echo $row["destinasiID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
            $('#kodekategori').select2({
                allowClear: true,
                placeholder: "Pilih Kategori Wisata"
            });
        });
        $(document).ready(function() {
            $('#kodearea').select2({
                allowClear: true,
                placeholder: "Pilih Area Wisata"
            });
        });
    </script>
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>