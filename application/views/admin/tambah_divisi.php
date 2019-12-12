        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Divisi</h1>
            </div>
            <form action="<?= base_url('admin/') ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Divisi</label>
                    <input type="text" class="form-control" name="judul">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" id="publish" type="submit">Simpan</button>
                </div>
            </form>
            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->