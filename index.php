<?php
require 'config/Database.php';
require 'config/Barang.php';

$db = new Database();
$data = $db->getAllBarang();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM INVENTARIS BARANG ELEKTRONIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Toko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white active" aria-current="page" href="index.php">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="my-3">Dashboard Toko</h2>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Data Daftar Barang</h5>
                    </div>
                    <a href="tambah.php">
                        <button class="btn btn-secondary">Tambah Data</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nama_barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    while ($row = $data->fetch_assoc()) {
                        $barang = new Barang($row['id_barang'], $row['nama_barang'], $row['kategori'], $row['stok'], $row['harga']);
                        ?>

                        <tr>
                            <td><?= $barang->id ?></td>
                            <td><?= $barang->nama_barang ?></td>
                            <td><?= $barang->kategori ?></td>
                            <td><?= $barang->stok ?></td>
                            <td><?= $barang->harga ?></td>
                            <td>
                                <a href="edit.php?id=<?= $barang->id ?>">
                                    <button class="btn btn-secondary">Edit</button></a>
                                <a href="hapus.php?id=<?= $barang->id ?>" onclick="return confirm('Yakin hapus?')">
                                    <button class="btn btn-secondary">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>
</body>

</html>