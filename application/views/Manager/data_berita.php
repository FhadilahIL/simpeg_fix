        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Row -->
                <div class="col-xl-12 col-md-12 mb-5 table-responsive-lg">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" class="judul-berita">Judul Berita</th>
                                <th scope="col" class="tanggal-berita">Tanggal</th>
                                <th scope="col" class="author-berita">Author</th>
                                <th scope="col" class="keterangan">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($daftar_berita as $berita) { ?>
                                <tr>
                                    <td class="text_center"><?= $no++ . "." ?></td>
                                    <td><?= $berita->judul_berita ?></td>
                                    <td class="tanggal-berita"><?= date('d F Y', strtotime($berita->tanggal)) ?></td>
                                    <td><?= $berita->nama ?></td>
                                    <td><a class="btn btn-primary detail" href="<?= base_url('manager/detail_berita/' . $berita->id_berita) ?>">Detail</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->