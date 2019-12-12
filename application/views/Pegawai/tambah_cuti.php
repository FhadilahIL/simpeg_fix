        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Cuti</h1>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK" value="<?= $user->id_pegawai ?>">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK" value="<?= $user->nik ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Cuti</label>
                    <select id="inputState" class="form-control" name="jenis_cuti">
                        <?php foreach ($jenis_cuti as $jenis) { ?>
                            <option value="<?= $jenis->id_cuti ?>"><?= $jenis->jenis_cuti ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Awal Cuti</label>
                    <input type="date" class="form-control" id="exampleInputTanggal">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal AKhir Cuti</label>
                    <input type="date" class="form-control" id="exampleInputTanggal">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea type="text" class="form-control" id="exampleInputAlasan" placeholder="Isi Alasan Mengapa Anda ingin Mengajukan Cuti" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Ajukan Cuti</button>
                </div>
            </form>
            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->