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
            if (isset($_POST['Simpan'])) {
                if (isset($_REQUEST['inputkode'])) {
                    $kodefoto = $_REQUEST['inputkode'];
                }
                if (!empty($kodefoto)) {
                    $kodefoto = $_REQUEST['inputkode'];
                    $namafoto = $_POST['inputnama'];
                    $kodedestinasi = $_POST['kodedestinasi'];

                    $nama = $_FILES['file']['name'];
                    $file_tmp = $_FILES["file"]["tmp_name"];

                    $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

                    move_uploaded_file($file_tmp, 'imagesdestinasi/' . $nama);
                    mysqli_query($connection, "INSERT INTO fotodestinasi VALUES ('$kodefoto', '$namafoto', '$kodedestinasi', '$nama' )");
                    header("location:photodestinasi.php");
                } else {
                    echo "<script>alert('ANDA HARUS MENGISI DATA'); document.location='photodestinasi.php'</script>";
                }
            }

            $datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi");
            ?>

            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Input Photo Destinasi Wisata</h1>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode Photo" maxlength="4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Photo">
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
                                <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
                                <div class="col-sm-10">
                                    <input type="file" id="file" name="file" accept="image/jpeg, image/webp, image/png" onchange="loadFile(event)">
                                    <img id="output" style="width: 200px" height="100px">
                                    <p class="form-text">Field ini digunakan untuk unggah file</p>
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
                                <h1 class="display-4">Daftar Photo Destinasi Wisata</h1>
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
                                    <th>ID Foto</th>
                                    <th>Nama Foto Wisata</th>
                                    <th>Kode Destinasi</th>
                                    <th>Photo Destinasi</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM fotodestinasi WHERE fotoID like '%" . $search . "%' OR fotonama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM fotodestinasi");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['fotoID']; ?></td>
                                        <td><?php echo $row['fotonama']; ?></td>
                                        <td><?php echo $row['destinasiID']; ?></td>
                                        <td><?php if (is_file("imagesdestinasi/" . $row['fotofile'])) { ?>
                                                <img src="imagesdestinasi/<?php echo $row['fotofile'] ?>" width="80">
                                            <?php } else
                                                echo "<img src='imagesdestinasi/noimage.jpg' width='80'>" ?>
                                        </td>
                                        <td><a href="photodestinasiedit.php?ubah=<?php echo $row["fotoID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="photodestinasihapus.php?hapus=<?php echo $row["fotoID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
            $('#namadestinasi').select2({
                allowClear: true,
                placeholder: "Pilih Nama Destinasi"
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