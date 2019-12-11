        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Pegawai</h1>
            </div>

            <!-- Content Row -->
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="NIK">NIK</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="NIK"><?= $detail_pegawai->nik ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="Nama">Nama Lengkap</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Nama"><?= $detail_pegawai->nama ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><?= $detail_pegawai->email ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat"><?= $detail_pegawai->alamat ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenisKelamin"><?= $jenis_kelamin ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="pendidikan">Pendidikan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pendidikan"><?= $detail_pegawai->pendidikan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="statusPerkawinan">Status Perkawinan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="statusPerkawinan"><?= $detail_pegawai->status ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jabatan">Jabatan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jabatan"><?= $user_pegawai->nama_jabatan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="agama">Agama</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="agama"><?= $detail_pegawai->agama ?></label>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->