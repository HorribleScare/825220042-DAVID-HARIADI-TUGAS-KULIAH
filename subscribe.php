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

            <?php include "includes/config.php"; ?>

            <div class="container-xl">
                <div class="row mx-auto">
                    <div class="col-xl">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Daftar Subscribe</h1>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group row mb-2">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                                    echo $_POST['search'];
                                                                                                                } ?>" placeholder="Search ID, Email">
                                </div>
                                <input type="submit" name="kirim" class="col-md-2 btn btn-primary mx-3" value="Search">
                            </div>
                        </form>
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>ID Subscribe</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "SELECT * FROM subscribe WHERE subscribeID like '%" . $search . "%' OR email like '$search%'");
                                } else {
                                    $query = mysqli_query($connection, "SELECT * FROM subscribe");
                                }
                                $nomor = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['subscribeID']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><a href="subscribehapus.php?hapus=<?php echo $row["subscribeID"] ?>" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td>
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
    <?php include "footer.php";
    mysqli_close($connection);
    ob_end_flush();
    ?>

</html>