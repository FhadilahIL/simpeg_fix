<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <p class="card-text mb-2 p-judul-dashboard">Data Pribadi</p>
                    <a href="<?= base_url('pegawai/data_pribadi/') . $user->nik ?>" class="btn btn-primary btn-block">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card pt-3 pb-4" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Cuti Bulanan</h5>
                    <p class="card-text">1 Hari</p>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="col-xl-12 col-md-12 mb-5 table-responsive-lg">
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col" class="judul-berita-index">Judul Berita</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_berita as $berita) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $berita->judul_berita ?></td>
                                <td><a class="btn btn-primary detail" href="<?= base_url('pegawai/detail_berita/') . $berita->id_berita ?>">Lihat Berita</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->