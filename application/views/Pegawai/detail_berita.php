        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $detail_berita->judul_berita; ?></h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-11 col-md-11 mb-4">
                    <img class="gambar-berita" src="<?= base_url('assets/img/') . $detail_berita->nama_gambar; ?>" alt="">
                </div>
                <div class="col-xl-11 col-md-11 mb-4">
                    <p>Posted By <?= $detail_berita->nama; ?></p>
                    <p><?= $detail_berita->tanggal; ?></p>
                    <p><?= $detail_berita->isi_berita; ?></p>
                </div>
                <!-- Content Row -->
            </div>
        </div>
        <!-- /.container-fluid -->