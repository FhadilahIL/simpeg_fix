        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
            </div>

            <div class="d-flex flex-row-column">
                <div class="col-xl-9 ml-n2">
                    <a class="btn btn-primary mb-3 ml-n1 tombol-tambah" href="<?= base_url('admin/tambah_pegawai') ?>">Tambah
                        Pegawai</a>
                </div>
                <div class="ml-auto">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2 cari-pegawai" type="search" placeholder="Cari Nama Pegawai" aria-label="Search">
                        <button class="btn btn-outline-success tombol-cari-pegawai" type="submit">Cari</button>
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-5 table-responsive-lg">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" class="nik">NIK</th>
                                <th scope="col" class="nama-pegawai">Nama Pegawai</th>
                                <th scope="col" class="jabatan">Jabatan</th>
                                <th scope="col" class="keterangan">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($daftar_pegawai as $pegawai) { ?>
                                <tr>
                                    <td scope="row"><?= $no++; ?></td>
                                    <td><?= $pegawai->nik; ?></td>
                                    <td><?= $pegawai->nama; ?></td>
                                    <td><?= $pegawai->nama_jabatan; ?></td>
                                    <td><a class="btn btn-primary detail" href="ubah_data">Update</a> <a class="btn btn-primary detail" href="#">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->