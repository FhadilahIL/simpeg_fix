        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Pribadi</h1>
            </div>

            <!-- Content Row -->
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="NIK">NIK</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="NIM"><?= $user->nik ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="Nama">Nama Lengkap</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Nama"><?= $user->nama ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><?= $user->email ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat"><?= $detail_user->alamat ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenisKelamin"><?= $jenis_kelamin; ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="pendidikan">Pendidikan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pendidikan"><?= $detail_user->pendidikan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="statusPerkawinan">Status Perkawinan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="statusPerkawinan"><?= $detail_user->status ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="agama">Agama</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="agama"><?= $detail_user->agama ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jabatan">Jabatan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jabatan"><?= $user->nama_jabatan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jabatan">Divisi</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jabatan"><?= $user->nama_divisi ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jabatan">Foto Profile</label>
                    </div>
                    <div class="form-group col-md-6">
                        <img src="<?= base_url('assets/img/profile/') . $detail_user->nama_gambar_profile ?>" width="250">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->