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
                if (isset($_REQUEST['inputid'])) {
                    $idberita = $_REQUEST['inputid'];
                }
                if (!empty($idberita)) {
                    $idberita = $_REQUEST['inputid'];
                    $judulberita = $_POST['inputjudul'];
                    $intiberita = $_POST['inputinti'];
                    $penulisberita = $_POST['inputpenulis'];
                    $penerbitberita = $_POST['inputpenerbit'];
                    $tanggalterbit = $_POST['inputtanggal'];
                    $kodedestinasi = $_POST['kodedestinasi'];

                    mysqli_query($connection, "INSERT INTO berita VALUES ('$idberita', '$judulberita', '$intiberita', '$penulisberita', '$penerbitberita', '$tanggalterbit', '$kodedestinasi' )");
                    header("location:berita.php");
                } else {
                    echo "<script>alert('ANDA HARUS MENGISI DATA'); document.location='berita.php'</script>";
                }
            }
            $datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi");
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
                                <h1 class="display-4">Input Berita</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="idberita" class="col-sm-2 col-form-label">ID Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idberita" name="inputid" placeholder="ID Berita" maxlength="4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judulberita" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judulberita" name="inputjudul" placeholder="Judul Berita">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="intiberita" class="col-sm-2 col-form-label">Inti Berita</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="intiberita" name="inputinti" placeholder="Inti Berita">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulisberita" class="col-sm-2 col-form-label">Penulis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penulisberita" name="inputpenulis" placeholder="Penulis">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penerbitberita" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penerbitberita" name="inputpenerbit" placeholder="Penerbit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggalterbit" class="col-sm-2 col-form-label">Tanggal Terbit</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggalterbit" name="inputtanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="namadestinasi" name="kodedestinasi">
                                        <?php while ($row = mysqli_fetch_array($datadestinasi)) { ?>
                                            <option value="<?php echo $row["destinasiID"] ?>">
                                                <?php echo $row["destinasiID"] ?>
                                                <?php echo $row["destinasinama"] ?>
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
                                <h1 class="display-4">Daftar Berita</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                                    echo $_POST['search'];
                                                                                                                } ?>" placeholder="Search ID, judul">
                                </div>
                                <input type="submit" name="kirim" class="col-md-2 btn btn-primary mx-3" value="Search">
                            </div>
                        </form>
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Inti</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tanggal Terbit</th>
                                    <th>ID Destinasi</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM berita WHERE beritaID like '%" . $search . "%' OR beritajudul like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM berita");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['beritaID']; ?></td>
                                        <td><?php echo $row['beritajudul']; ?></td>
                                        <td><?php echo $row['beritainti']; ?></td>
                                        <td><?php echo $row['penulis']; ?></td>
                                        <td><?php echo $row['penerbit']; ?></td>
                                        <td><?php echo $row['tanggalterbit']; ?></td>
                                        <td><?php echo $row['destinasiID']; ?></td>
                                        <td><a href="beritaedit.php?ubah=<?php echo $row["beritaID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="beritahapus.php?hapus=<?php echo $row["beritaID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                    <?php $nomor = $nomor + 1; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
-->


        </div>
    </div>
    <?php include "footer.php"; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#namadestinasi').select2({
                allowClear: true,
                placeholder: "Pilih Destinasi Wisata"
            });
        });
    </script>
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>