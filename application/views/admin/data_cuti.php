        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Cuti</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_cuti">Ajukan Cuti</button>
                </div>

                <!-- Modal Tambah Cuti -->
                <div class="modal fade" id="tambah_cuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Ajukan Cuti <b><?= $user->nama ?></b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Ajukan Cuti</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="col-xl-12 col-md-12 mb-5 table-responsive-lg">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" class="nik">NIK</th>
                                <th scope="col" class="nama-pegawai">Nama Pegawai</th>
                                <th scope="col">Awal Cuti</th>
                                <th scope="col">Akhir Cuti</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1.</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>22/09/2019</td>
                                <td>23/09/2019</td>
                                <td>Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->