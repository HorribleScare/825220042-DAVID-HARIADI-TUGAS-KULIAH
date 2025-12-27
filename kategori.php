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
                    $kategorikode = $_REQUEST['inputkode'];
                }
                if (!empty($kategorikode)) {
                    $kategorikode = $_REQUEST['inputkode'];
                    $kategorinama = $_POST['inputnama'];
                    $kategoriket = $_POST['inputket'];
                    $kategoriref = $_POST['inputref'];

                    mysqli_query($connection, "insert into kategori values ('$kategorikode', '$kategorinama', '$kategoriket', '$kategoriref')");
                    header("location:kategori.php");
                } else {
                    echo "<script>alert('ANDA HARUS MENGISI DATA'); document.location='kategori.php'</script>";
                }
            }
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
                                <h1 class="display-4">Input Kategori Wisata</h1>
                            </div>
                        </div>
                        <form method="POST" id="form">
                            <div class="form-group row">
                                <label for="kodekategori" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodekategori" name="inputkode" placeholder="Kode Kategori" maxlength="4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namakategori" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namakategori" name="inputnama" placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ketkategori" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ketkategori" name="inputket" placeholder="Keterangan Kategori">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="refkategori" class="col-sm-2 col-form-label">Referensi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="refkategori" name="inputref" placeholder="Referensi Kategori">
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
                                <h1 class="display-4">Daftar Kategori Wisata</h1>
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
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Refrensi</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM kategori WHERE kategoriID like '%" . $search . "%' OR kategorinama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM kategori");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['kategoriID']; ?></td>
                                        <td><?php echo $row['kategorinama']; ?></td>
                                        <td><?php echo $row['kategoriketerangan']; ?></td>
                                        <td><?php echo $row['kategorireferensi']; ?></td>
                                        <td><a href="kategoriedit.php?ubah=<?php echo $row["kategoriID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="kategorihapus.php?hapus=<?php echo $row["kategoriID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>