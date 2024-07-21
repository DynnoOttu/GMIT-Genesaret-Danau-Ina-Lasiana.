<?php require_once('../_header.php') ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Kepala Keluarga</h4>
                    <div class="tabel">
                        <div class="form-group row">
                            <label for="id_rayon" class="col-sm-2 text-start control-label col-form-label">Rayon</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 form-select shadow-none" style="width: 100%; height:36px;" name="id_rayon" id="id_rayon" required>
                                    <option value="">Pilih Rayon</option>
                                    <?php
                                    $result = mysqli_query($con, "SELECT id_rayon, rayon FROM rayon");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['id_rayon'] . "'>" . $row['rayon'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kk" class="col-sm-2 text-start control-label col-form-label">Jenis KK</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 form-select shadow-none" style="width: 100%; height:36px;" name="jenis_kk" id="jenis_kk" required>
                                    <option value="">Pilih Jenis KK</option>
                                    <option value="Rumah">Rumah</option>
                                    <option value="asrama">Asrama</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_kk" class="col-sm-2 text-start control-label col-form-label">Nomor KK</label>
                            <div class="col-sm-9">
                                <input type="text" name="nomor_kk" class="form-control" id="nomor_kk" placeholder="Nomor KK" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 text-start control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_asrama" class="col-sm-2 text-start control-label col-form-label">Nama Asrama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_asrama" class="form-control" id="nama_asrama" placeholder="Nama Asrama">
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