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
                        <label for="NIM"><?= $detail->nik ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="Nama">Nama Lengkap</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Nama"><?= $detail->nama ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><?= $detail->email ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat"><?= $detail->alamat ?></label>
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
                        <label for="pendidikan"><?= $detail->pendidikan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="statusPerkawinan">Status Perkawinan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="statusPerkawinan"><?= $detail->status ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="jabatan">Jabatan</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jabatan"><?= $detail->nama_jabatan ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="agama">Agama</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="agama"><?= $detail->agama ?></label>
                    </div>
                </div>
                <div class="form-row mt-5">
                    <h4>Keluarga</h4>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="istri">Istri</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="agama">Hanifah Puji Lestari</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="anak">Anak</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="anak">Adinda Sania</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="anak"></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="anak">Kintan Meyonta Reforma</label>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->