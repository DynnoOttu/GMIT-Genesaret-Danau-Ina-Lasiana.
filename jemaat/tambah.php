<?php require_once('../_header.php') ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Jemaat</h4>
                    <div class="tabel">
                        <div class="form-group row">
                            <label for="nama_majelis" class="col-sm-2 text-start control-label col-form-label">Majelis</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_majelis" class="form-control" id="id_majelis" placeholder="Nama Majelis" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_pendeta" class="col-sm-2 text-start control-label col-form-label">Pendeta</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_pendeta" class="form-control" id="id_pendeta" placeholder="Nama Pendeta" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_kk" class="col-sm-2 text-start control-label col-form-label">Kepala Keluarga</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_kk" class="form-control" id="id_kk" placeholder="Kepala Keluarga" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 text-start control-label col-form-label">Nama Jemaat</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pendeta" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_dan_tanggal_lahir" class="col-sm-2 text-start control-label col-form-label">Tempat dan Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_dan_tanggal_lahir" class="form-control" id="tempat_dan_tanggal_lahir" placeholder="Tempat dan Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select shadow-none" style="width: 100%; height:36px;" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <a href="data.php"><button type="button" class="btn btn-warning"><i class=" fas fa-arrow-left"></i> Kembali</button></a>
                        <button type="submit" name="tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../_footer.php') ?>