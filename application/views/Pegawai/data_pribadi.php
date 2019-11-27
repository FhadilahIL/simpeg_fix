<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pribadi</h1>
    </div>

    <!-- Content Row -->
    <form>
        <div class="form-group">
            <label for="exampleInputNIK">NIK</label>
            <input type="email" class="form-control" id="exampleInputNIK" placeholder="Enter your NIK">
        </div>
        <div class="form-group">
            <label for="exampleInputNama">Nama Lengkap</label>
            <input type="email" class="form-control" id="exampleInputNama" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter your NIK">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="email" class="form-control" id="exampleInputPassword" placeholder="Enter your Password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextareaAlamat">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextareaAlamat" rows="5">Enter Your Address</textarea>
        </div>
        <div class="form-row mb-3">
            <div class="col-4">
                <label for="exampleFormControlTextareaAlamat">Jenis Kelamin</label>
                <select id="inputState" class="form-control">
                    <option selected>Laki - Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="col-4">
                <label for="exampleFormControlTextareaAlamat">Pendidikan</label>
                <select id="inputState" class="form-control">
                    <option selected>SMA</option>
                    <option>D3</option>
                    <option>D4</option>
                    <option>S1</option>
                    <option>S2</option>
                    <option>S3</option>
                </select>
            </div>
            <div class="col-4">
                <label for="exampleFormControlTextareaAlamat">Status Perkawinan</label>
                <select id="inputState" class="form-control">
                    <option selected>Belum Menikah</option>
                    <option>Menikah</option>
                </select>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-6">
                <label for="exampleFormControlTextareaAlamat">Agama</label>
                <select id="inputState" class="form-control">
                    <option selected>Islam</option>
                    <option>Kristen</option>
                    <option>Katholik</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="col-6">
                <label for="exampleFormControlTextareaAlamat">No. Handphone</label>
                <input type="text" class="form-control" id="inputNoHp">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
    </form>
</div>
<!-- /.container-fluid -->