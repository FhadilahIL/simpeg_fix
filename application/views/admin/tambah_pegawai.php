<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
    </div>

    <!-- Content Row -->
    <form action="<?= base_url('admin/input_data') ?>" method="post">
        <div class="form-group">
            <label for="exampleInputNIK">NIK</label>
            <input type="text" name="nik" maxlength="16" class="form-control" placeholder="Enter your NIK">
        </div>
        <div class="form-group">
            <label for="exampleInputNama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your Email">
        </div>
        <div class="form-row mb-3">
            <div class="col-6">
                <label for="exampleFormControlTextareaAlamat">Divisi</label>
                <select class="form-control" name="divisi">
                    <?php foreach ($divisi as $div) { ?>
                        <option value="<?= $div->id_divisi ?>"><?= $div->nama_divisi ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6">
                <label for="exampleFormControlTextareaAlamat">Jabatan</label>
                <select class="form-control" name="jabatan">
                    <?php foreach ($jabatan as $jabatan) { ?>
                        <option value="<?= $jabatan->id_jabatan ?>"><?= $jabatan->nama_jabatan ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
    </form>
</div>
<!-- /.container-fluid -->