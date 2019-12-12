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
                    <form class="form-inline" method="post" action="<?= base_url('admin/cari_nik') ?>">
                        <input class="form-control mr-sm-2 cari-pegawai" type="search" name="nik" placeholder="Cari NIK Pegawai" aria-label="Search">
                        <button class="btn btn-outline-success tombol-cari-pegawai" type="submit">Cari</button>
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <?php if ($this->session->flashdata('pesan_berhasil')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!!!</strong> <?= $this->session->flashdata('pesan_berhasil') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } elseif ($this->session->flashdata('pesan_gagal')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!!!</strong> <?= $this->session->flashdata('pesan_gagal') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
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
                                    <td><a class="btn btn-primary detail" href="<?= base_url('admin/ubah_data/' . $pegawai->nik) ?>">Ubah</a> <a class="btn btn-primary detail" href="#">Delete</a> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail<?= $pegawai->nik ?>">Detail Pegawai</button></td>
                                </tr>
                                <!-- Modal Detail -->

                                <div class="modal fade" id="modalDetail<?= $pegawai->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle"><b><?= $pegawai->nama ?></b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="NIK">NIK</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="NIM"><?= $pegawai->nik ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="Nama">Nama</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="NIM"><?= $pegawai->nama ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="email">Email</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="email"><?= $pegawai->email ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="alamat">Alamat</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="alamat"><?= $pegawai->alamat ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="jenisKelamin">Jenis Kelamin</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="jenisKelamin"><?= $pegawai->jenis_kelamin ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="pendidikan">Pendidikan</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="pendidikan"><?= $pegawai->pendidikan ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="statusPerkawinan">Status Perkawinan</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="statusPerkawinan"><?= $pegawai->status ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="agama">Agama</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="agama"><?= $pegawai->agama ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="jabatan">Jabatan</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="jabatan"><?= $pegawai->nama_jabatan ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="agama">Divisi</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="agama"><?= $pegawai->nama_divisi ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="profile">Foto Profile</label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <img src="<?= base_url('assets/img/profile/') . $pegawai->nama_gambar_profile ?>" width="250">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->