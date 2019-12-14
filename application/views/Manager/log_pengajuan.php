        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Histori Pengajian Cuti</h1>
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
                                <th scope="col" class="text-center">Status</th>
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
                                    <?php if ($cuti->status == "Ditolak") { ?>
                                        <td class="bg-danger"><a class="text-light" tabindex="0" data-trigger="focus" title="Alasan Mengapa Ditolak" data-container="body" role="button" data-toggle="popover" data-placement="left" data-content="<?= $cuti->alasan ?>"><?= $cuti->status ?></a></td>
                                    <?php } else if ($cuti->status == "Diterima") { ?>
                                        <td class="bg-success"><a class="text-light" tabindex="0" data-trigger="focus" title="Cie Diterima" data-container="body" role="button" data-toggle="popover" data-placement="left" data-content="<?= $cuti->alasan ?>"><?= $cuti->status ?></a></td>
                                    <?php } else { ?>
                                        <td class="bg-warning text-light"><?= $cuti->status ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->