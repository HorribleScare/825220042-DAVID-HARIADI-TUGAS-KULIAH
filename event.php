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
                if (isset($_REQUEST['eventid'])) {
                    $eventid = $_REQUEST['eventid'];
                }
                if (!empty($eventid)) {
                    $eventid = $_REQUEST['eventid'];
                    $eventnama = $_POST['eventnama'];
                    $eventketerangan = $_POST['eventketerangan'];
                    $tanggalmulai = $_POST['tanggalmulai'];
                    $tanggalselesai = $_POST['tanggalselesai'];
                    $namakabupaten = $_POST['namakabupaten'];
                    $keteranganfoto = $_POST['keteranganfoto'];

                    $eventfoto = $_FILES['file']['name'];
                    $file_tmp = $_FILES["file"]["tmp_name"];

                    $ekstensifile = pathinfo($eventfoto, PATHINFO_EXTENSION);

                    move_uploaded_file($file_tmp, 'imagesevent/' . $eventfoto);
                    mysqli_query($connection, "INSERT INTO event VALUES ('$eventid', '$eventnama', '$eventketerangan', '$tanggalmulai', '$tanggalselesai', '$eventfoto', '$keteranganfoto', '$namakabupaten' )");
                    header("location:event.php");
                } else {
                    echo "<script>alert('ANDA HARUS MENGISI DATA'); document.location='event.php'</script>";
                }
            }
            $datakabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
            ?>
            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Input Event</h1>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="eventid" class="col-sm-2 col-form-label">Event ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="eventid" name="eventid" placeholder="Event ID" maxlength="4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventnama" class="col-sm-2 col-form-label">Nama Event</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="eventnama" name="eventnama" placeholder="Nama Event">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventketerangan" class="col-sm-2 col-form-label">Keterangan Event</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="eventketerangan" name="eventketerangan" rows="4" placeholder="Keterangan Event"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggalmulai" class="col-sm-2 col-form-label">Tanggal Mulai Event</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggalmulai" name="tanggalmulai" placeholder="Tanggal Mulai Event">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggalselesai" class="col-sm-2 col-form-label">Tanggal Selesai Event</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggalselesai" name="tanggalselesai" placeholder="Tanggal Selesai Event">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Foto Event</label>
                                <div class="col-sm-10">
                                    <input type="file" id="file" name="file" accept="image/jpeg, image/webp, image/png" onchange="loadFile(event)">
                                    <img id="output" style="width: 200px" height="100px">
                                    <p class="form-text">Field ini digunakan untuk unggah file</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keteranganfoto" class="col-sm-2 col-form-label">Keterangan Foto Event</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keteranganfoto" name="keteranganfoto" placeholder="Keterangan Foto Event">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="namakabupaten" name="namakabupaten">
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
                                <h1 class="display-4">Daftar Event</h1>
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
                                    <th>ID Event</th>
                                    <th>Nama Event</th>
                                    <th>Keterangan Event</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Foto Event</th>
                                    <th>Keterangan Foto Event</th>
                                    <th>Nama Kabupaten</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM event e LEFT OUTER JOIN kabupaten k ON (e.kabupatenKODE = k.kabupatenKODE) WHERE e.eventID like '%" . $search . "%' OR e.eventNama like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM event e LEFT OUTER JOIN kabupaten k ON (e.kabupatenKODE = k.kabupatenKODE)");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['eventID']; ?></td>
                                        <td><?php echo $row['eventNama']; ?></td>
                                        <td><?php echo $row['eventKeterangan']; ?></td>
                                        <td><?php echo $row['eventTanggalMulai']; ?></td>
                                        <td><?php echo $row['eventTanggalSelesai']; ?></td>
                                        <td><?php if (is_file("imagesevent/" . $row['eventFoto'])) { ?>
                                                <img src="imagesevent/<?php echo $row['eventFoto'] ?>" width="80">
                                            <?php } else
                                                echo "<img src='imagesevent/noimage.jpg' width='80'>" ?>
                                        </td>
                                        <td><?php echo $row['eventFotoKet']; ?></td>
                                        <td><?php echo $row['kabupatenNAMA']; ?></td>
                                        <td><a href="eventedit.php?ubah=<?php echo $row["eventID"] ?>" class="btn btn-success btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="eventhapus.php?hapus=<?php echo $row["eventID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
            $('#namakabupaten').select2({
                allowClear: true,
                placeholder: "Pilih Kabupaten"
            });
        });
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
        $("#tanggalmulai").on("change", function() {
            $("#tanggalselesai").attr("min", $(this).val());
        });
    </script>
    <?php
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>