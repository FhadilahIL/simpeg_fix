        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Cuti</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col">
                    <button type="button" class="mb-3 btn btn-primary" data-toggle="modal" data-target="#tambah_cuti">Ajukan Cuti</button>
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
                                <form action="<?= base_url('admin/ajukan_cuti') ?>" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIK</label>
                                        <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK" value="<?= $user->id_pegawai ?>">
                                        <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK" value="<?= $user->nik ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Cuti</label>
                                        <select id="cuti" class="form-control" name="jenis_cuti">
                                            <option value="kosong">-- Pilih Jenis Cuti --</option>
                                            <?php foreach ($jenis_cuti as $jenis) { ?>
                                                <option value="<?= $jenis->id_cuti ?>"><?= $jenis->jenis_cuti ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="element-cuti"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
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
                            <?php $no = 1;
                            foreach ($data_cuti as $cuti) { ?>
                                <tr>
                                    <td scope="row"><?= $no++ ?>.</td>
                                    <td><?= $cuti->nik ?></td>
                                    <td><?= $cuti->nama ?></td>
                                    <td><?= $cuti->awal_cuti ?></td>
                                    <td><?= $cuti->akhir_cuti ?></td>
                                    <?php if ($cuti->status == "Ditolak") { ?>
                                        <td class="bg-danger"><a class="text-light" tabindex="0" data-trigger="focus" title="Alasan Mengapa Ditolak" data-container="body" role="button" data-toggle="popover" data-placement="left" data-content="<?= $cuti->alasan ?>"><?= $cuti->status ?></a></td>
                                    <?php } else if ($cuti->status == "Diterima") { ?>
                                        <td class="bg-success"><a class="text-light" tabindex="0" data-trigger="focus" title="Cie Diterima" data-container="body" role="button" data-toggle="popover" data-placement="left" data-content="<?= $cuti->alasan ?>"><?= $cuti->status ?></a></td>
                                    <?php } else { ?>
                                        <td class="bg-warning"><a class="text-light" tabindex="0" data-trigger="focus" title="Pesan" data-container="body" role="button" data-toggle="popover" data-placement="left" data-content="Silahkan tunggu Konfirmasi Dari Manager Anda"><?= $cuti->status ?></a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <script>
            let cuti = document.getElementById('cuti');
            let ajukan = document.getElementById('ajukan');
            let elemenCuti = document.getElementById('element-cuti');
            cuti.addEventListener('change', () => {
                let tgl_awal = document.getElementById('tgl_awal');
                let tgl_akhir = document.getElementById('tgl_akhir');
                let keterangan = document.getElementById('keterangan');
                if (cuti.value === 'kosong') {
                    elemenCuti.removeChild(tgl_awal)
                    elemenCuti.removeChild(tgl_akhir)
                    elemenCuti.removeChild(keterangan)
                    ajukan.disabled = true;
                } else {
                    if (cuti.value !== '1') {
                        let html = '';
                        html += `<div class="form-group" id="tgl_awal">
                                <label for="exampleInputEmail1">Tanggal Awal Cuti</label>
                                <input type="date" class="form-control" name="awal_cuti" id="exampleInputTanggal">
                            </div>
                            <div class="form-group" id="tgl_akhir"></div>
                            <div class="form-group" id="keterangan">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan" id="exampleInputAlasan" placeholder="Isi Alasan Mengapa Anda ingin Mengajukan Cuti" rows="5"></textarea>
                            </div>`;
                        elemenCuti.innerHTML = html;
                        ajukan.disabled = false;
                    } else {
                        let html = '';
                        html += `<div class="form-group" id="tgl_awal">
                            <label for="exampleInputEmail1">Tanggal Awal Cuti</label>
                            <input type="date" class="form-control" name="awal_cuti" id="exampleInputTanggal">
                        </div>
                        <div class="form-group" id="tgl_akhir">
                            <label for="exampleInputEmail1">Tanggal Akhir Cuti</label>
                            <input type="date" class="form-control" name="akhir_cuti" id="exampleInputTanggal">
                        </div>
                        <div class="form-group" id="keterangan">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="exampleInputAlasan" placeholder="Isi Alasan Mengapa Anda ingin Mengajukan Cuti" rows="5"></textarea>
                        </div>`;
                        elemenCuti.innerHTML = html;
                        ajukan.disabled = false;
                    }
                }
            })
        </script>