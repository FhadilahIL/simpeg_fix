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
                    <select id="cuti" class="form-control" name="jenis_cuti">
                        <option value="kosong">-- Pilih Jenis Cuti --</option>
                        <?php foreach ($jenis_cuti as $jenis) { ?>
                            <option value="<?= $jenis->id_cuti ?>"><?= $jenis->jenis_cuti ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="element-cuti">

                </div>
                <div class="form-group">
                    <button id="ajukan" type="submit" class="btn btn-primary btn-block" disabled>Ajukan Cuti</button>
                </div>
            </form>
            <!-- Content Row -->

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
                                <input type="date" class="form-control" id="exampleInputTanggal">
                            </div>
                            <div class="form-group" id="tgl_akhir"></div>
                            <div class="form-group" id="keterangan">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea type="text" class="form-control" id="exampleInputAlasan" placeholder="Isi Alasan Mengapa Anda ingin Mengajukan Cuti" rows="5"></textarea>
                            </div>`;
                        elemenCuti.innerHTML = html;
                        ajukan.disabled = false;
                    } else {
                        let html = '';
                        html += `<div class="form-group" id="tgl_awal">
                                <label for="exampleInputEmail1">Tanggal Awal Cuti</label>
                                <input type="date" class="form-control" id="exampleInputTanggal">
                            </div>
                            <div class="form-group" id="tgl_akhir">
                                <label for="exampleInputEmail1">Tanggal AKhir Cuti</label>
                                <input type="date" class="form-control" id="exampleInputTanggal">
                            </div>
                            <div class="form-group" id="keterangan">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea type="text" class="form-control" id="exampleInputAlasan" placeholder="Isi Alasan Mengapa Anda ingin Mengajukan Cuti" rows="5"></textarea>
                            </div>`;
                        elemenCuti.innerHTML = html;
                        ajukan.disabled = false;
                    }
                }
            })
        </script>