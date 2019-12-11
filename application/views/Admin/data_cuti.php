        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Cuti</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_cuti">Tambah Cuti</button>
                </div>

                <!-- Modal Tambah Cuti -->
                <div class="modal fade" id="tambah_cuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
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
                                <th scope="row">1.</th>
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