        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Divisi</h1>
            </div>

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

            <form action="<?= base_url('admin/input_divisi') ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Divisi</label>
                    <input type="text" class="form-control" name="nama_divisi">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->