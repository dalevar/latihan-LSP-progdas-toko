<?php include_once "public/partials/headerHome.php" ?>

<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1">
                <h1>Produk Tecknologi Terbaik</h1>
                <h2>Pesan dan Beli Produk Berkualitas</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#paket" class="btn btn-primary">Pilih Produk Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img pt-3">
                <img src="src/image/hero.png" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
</section>
<section id="paket" class="paket">
    <div class="px-4 py-5">
        <hr>
    </div>
    <div class="container">
        <h2 class="text-left mb-5">Data Produk Technopark Gallery SMK ISFI BANJARMASIN</h2>
        <div class="row">
            <?php
            require "src/data/dataList.php";
            foreach ($produkList as $produk => $data) {
            ?>
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="src/image/<?= $data[3] ?>" class="card-img-top rounded mt-3" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data[0] ?></h5>
                        <p class="card-text"><?= $data[1] ?></p>
                        <p class="h6 mb-2">Rp.<?= number_format($data[2]) ?></p>
                        <a href="transaksi.php?id=<?= $produk ?>" class="btn btn-primary">Book Now!</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    </div>
</section>


<?php include_once "public/partials/footer.php" ?>