        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Cuti</h1>
            </div>
            <button type="button" class="btn btn-primary detail" data-toggle="modal" data-target="#log-pengajuan">Log Pengajuan</button>
            <!-- Modal Sorting Log Cuti -->
            <div class="modal fade" id="log-pengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tampilkan Log Pengajuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('manager/log_pengajuan') ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlTextareaAlamat">Bulan</label>
                                    <select name="bulan" class="form-control">
                                        <?php for ($i = 0; $i < count($bulan); $i++) { ?>
                                            <option value="<?= $i + 1 ?>"><?= $bulan[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextareaAlamat">Tahun</label>
                                    <select name="tahun" class="form-control">
                                        <?php for ($i = date('Y'); $i >= 2018; --$i) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cek Pengajuan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if ($this->session->flashdata('pesan_berhasil')) { ?>
                <div class="alert alert-success alert-dismissible fade show font-notify" role="alert">
                    <strong>Success!!!</strong> <?= $this->session->flashdata('pesan_berhasil') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } elseif ($this->session->flashdata('pesan_gagal')) { ?>
                <div class="alert alert-danger alert-dismissible fade show font-notify" role="alert">
                    <strong>Failed!!!</strong> <?= $this->session->flashdata('pesan_gagal') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <!-- Content Row -->
            <div class="row">

                <!-- Content Row -->
                <div class="col-xl-12 col-md-12 mb-5 table-responsive-lg">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" class="nik">NIK</th>
                                <th scope="col" class="nama-pegawai">Nama Pegawai</th>
                                <th scope="col" class="tanggal">Awal Cuti</th>
                                <th scope="col" class="tanggal">Akhir Cuti</th>
                                <th scope="col" class="jenis-cuti">Jenis Cuti</th>
                                <th scope="col" class="keterangan-cuti">Keterangan</th>
                                <th scope="col" class="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_cuti as $cuti) { ?>
                                <tr>
                                    <td scope="row"><?= $no++ ?>.</td>
                                    <td><?= $cuti->nik ?></td>
                                    <td><?= $cuti->nama ?></td>
                                    <td><?= $cuti->awal_cuti ?></td>
                                    <td><?= $cuti->akhir_cuti ?></td>
                                    <td><?= $cuti->jenis_cuti ?></td>
                                    <td><?= $cuti->keterangan ?></td>
                                    <td><button type="button" class="btn btn-success detail" data-toggle="modal" data-target="#terima<?= $cuti->id_cutipegawai ?>">Terima</button> <button type="button" class="btn btn-danger detail" data-toggle="modal" data-target="#tolak<?= $cuti->id_cutipegawai ?>">Tolak</button></td>
                                </tr>
                                <!-- Modal Terima -->
                                <div class="modal fade" id="terima<?= $cuti->id_cutipegawai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Terima Cuti <b><?= $cuti->nama ?></b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('manager/terima_cuti/') . $cuti->id_cutipegawai ?>" method="post">
                                                    <p>Apakah Anda Menyetujui Pengajuan <b><?= $cuti->jenis_cuti ?></b> dari <b><?= $cuti->nama ?></b> pada tanggal <b><?= date('D, d M Y', strtotime($cuti->awal_cuti)) ?></b> sampai tanggal <b><?= date('D, d M Y', strtotime($cuti->akhir_cuti)) ?></b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Terima Cuti</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Tolak -->
                                <div class="modal fade" id="tolak<?= $cuti->id_cutipegawai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Tolak Cuti <b><?= $cuti->nama ?></b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('manager/tolak_cuti/') . $cuti->id_cutipegawai ?>" method="post">
                                                    <p>Apakah Anda Menolak Pengajuan <b><?= $cuti->jenis_cuti ?></b> dari <b><?= $cuti->nama ?></b> pada tanggal <b><?= date('D, d M Y', strtotime($cuti->awal_cuti)) ?></b> sampai tanggal <b><?= date('D, d M Y', strtotime($cuti->akhir_cuti)) ?></b>?</p>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextareaAlamat">Alasan Mengapa Ditolak</label>
                                                        <textarea class="form-control" name="alasan" id="exampleFormControlTextareaAlamat" rows="5"><?= $detail_user->alamat ?></textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Tolak Cuti</button>
                                            </div>
                                            </form>
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