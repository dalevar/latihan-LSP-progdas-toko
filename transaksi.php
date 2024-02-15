<?php
include_once "public/partials/HeaderTransaksi.php";
require "src/data/dataList.php";
$id = $_GET['id'];
$no_transaksi = "DST" . strtotime(date('ymd')) . rand(1, 1000) . "PGN";
$harga = $produkList[$id][2];
?>


<main>
    <section class="py-5 container">
        <form class="row g-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <label for="validationDefault01" class="form-label">No. Transaksi</label>
                        <input type="text" class="form-control" id="validationDefault01" name="no_transaksi" value="<?= $no_transaksi ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" id="validationDefaultUsername" name="nama_customer" required>
                    </div>
                    <div class="col-md-5 mt-2">
                        <label for="validationDefault02" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="validationDefault02" name="tanggalTransaksi" value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-5 mt-2">
                        <label for="validationDefault04" class="form-label">Pilihan Paket</label>
                        <input type="text" class="form-control" id="validationDefault04" value="<?= $produkList[$id][0] ?>" readonly>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="row align-items-end">
                        <div class="col-md-2 mt-2">
                            <label for="harga" class="form-label">Harga Paket</label>
                            <input type="text" class="form-control" id="harga" value="Rp. <?= number_format($produkList[$id][2]) ?>" readonly>
                        </div>
                        <div class="col-md-2 mt-2">
                            <label for="jumlah" class="form-label">Jumlah Orang</label>
                            <input type="number" class="form-control" id="jumlah" min="1" value="1" required>
                        </div>
                        <div class="col-md-4 mt-2">
                            <button class="btn btn-primary" onclick="hitungTotal()" type="button">Total Harga</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>

    <section id='detailHarga'>
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="src/image/<?= $produkList[$id][3] ?>" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text" id="totalHargaCardText">Total Harga + ppn 10% : -</p>
                                <div class="input-group">
                                    <span class="input-group-text">Pembayaran</span>
                                    <input type="text" class="form-control" name="pembayaran" id="pembayaran" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button type="button" onclick="hitungKembalian()" class="btn btn-sm btn-outline-secondary">Hitung Kembalian</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col" id="kembalianCard" style="display: none;">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    Pembayaran Berhasil
                                </div>
                                <p class="card-text" id="kembalianCardText">Total Kembalian : -</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-success text-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-success flex " width="100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h5 class="modal-title text-center" id="exampleModalLabel">Transaksi Berhasil Disimpan</h5>
                <p class="text-center">Kembali ke Home</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href='index.php' class="btn btn-secondary">OK</a>
            </div>
        </div>
    </div>
</div>
<script>
    var totalHargaSetelahPajak;

    function hitungTotal() {
        var harga = <?= $harga ?>;
        var pajak = 0.1;
        var jumlahInput = document.getElementById('jumlah').value;

        var totalHargaSebelumPajak = jumlahInput * harga;
        totalHargaSetelahPajak = totalHargaSebelumPajak * (1 + pajak);

        document.getElementById('totalHargaCardText').innerText = 'Total Harga (Termasuk Pajak 10%) : Rp. ' + new Intl.NumberFormat('id-ID', {
            maximumSignificantDigits: 4
        }).format(totalHargaSetelahPajak);
    }

    function hitungKembalian() {
        var pembayaran = document.getElementById('pembayaran').value;
        var totalHarga = totalHargaSetelahPajak;

        let totalHargaNumber = parseInt(totalHarga);

        var kembalian = pembayaran - totalHargaNumber;

        document.getElementById('kembalianCardText').innerText = 'Total Kembalian : Rp. ' + new Intl.NumberFormat('id-ID', {
            maximumSignificantDigits: 4
        }).format(kembalian);
        document.getElementById('kembalianCard').style.display = 'block';
    }
</script>

<?php include_once "public/partials/footer.php" ?>