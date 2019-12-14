        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Divisi</h1>
            </div>

            <div class="d-flex flex-row-column">
                <div class="col-xl-9 ml-n2">
                    <a class="btn btn-primary mb-3 ml-n1 tombol-tambah" href="<?= base_url('admin/tambah_divisi') ?>">Tambah Divisi</a>
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
                                <th scope="col" class="no">No.</th>
                                <th scope="col">Nama Divisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_divisi as $divisi) { ?>
                                <tr>
                                    <td scope="row"><?= $no++ . '.'; ?></td>
                                    <td class="nama-divisi"><?= $divisi->nama_divisi; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->