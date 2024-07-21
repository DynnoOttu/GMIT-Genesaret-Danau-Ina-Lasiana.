<?php require_once "../_config/config.php";
require "../assets/libs/vendor/autoload.php";

if (isset($_POST['tambah'])) {
    $id_majelis = trim(mysqli_real_escape_string($con, $_POST['id_majelis']));
    $id_pendeta = trim(mysqli_real_escape_string($con, $_POST['id_pendeta']));
    $id_kk = trim(mysqli_real_escape_string($con, $_POST['id_kk']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $tempat_dan_tanggal_lahir = trim(mysqli_real_escape_string($con, $_POST['tempat_dan_tanggal_lahir']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));

    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM jemaat WHERE nama = '$nama'") or die(mysqli_error($con));
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nama Jemaat Sudah Ada');window.location='tambah.php';</script>";
    } else {
        // Menambahkan data baru


        // Mengarahkan ke tabel status sosial jemaat

        $id_status_sosial_jemaat = trim(mysqli_real_escape_string($con, $_POST['id_status_sosial_jemaat']));
        $id_majelis = trim(mysqli_real_escape_string($con, $_POST['id_majelis']));
        $id_pendeta = trim(mysqli_real_escape_string($con, $_POST['id_pendeta']));
        $id_kk = trim(mysqli_real_escape_string($con, $_POST['id_kk']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $tempat_dan_tanggal_lahir = trim(mysqli_real_escape_string($con, $_POST['tempat_dan_tanggal_lahir']));
        $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
        $pendidikan = trim(mysqli_real_escape_string($con, $_POST['pendidikan']));
        $pekerjaan = trim(mysqli_real_escape_string($con, $_POST['pekerjaan']));
        $status_baptis = trim(mysqli_real_escape_string($con, $_POST['status_baptis']));
        $tanggal_baptis = trim(mysqli_real_escape_string($con, $_POST['tanggal_baptis']));
        $status_sidi = trim(mysqli_real_escape_string($con, $_POST['status_sidi']));
        $tanggal_sidi = trim(mysqli_real_escape_string($con, $_POST['tanggal_sidi']));
        $status_pernikahan = trim(mysqli_real_escape_string($con, $_POST['status_pernikahan']));
        $tanggal_nikah = trim(mysqli_real_escape_string($con, $_POST['tanggal_nikah']));
        $meninggal_at = trim(mysqli_real_escape_string($con, $_POST['meninggal_at']));
        $deletet_at = date('Y-m-d H:i:s');

        $tambahStatus = mysqli_query($con, "INSERT INTO status_sosial_jemaat (id_status_sosial_jemaat, pendidikan, pekerjaan, status_baptis, tanggal_baptis, status_sidi, tanggal_sidi, status_pernikahan, tanggal_nikah, meninggal_at, deletet_at) VALUES ('$id_status_sosial_jemaat', '$pendidikan', '$pekerjaan', '$status_baptis', '$tanggal_baptis', '$status_sidi', '$tanggal_sidi', '$status_pernikahan', '$tanggal_nikah', '$meninggal_at', '$deletet_at')") or die(mysqli_error($con));

        if ($id_status) {
            $tambah = mysqli_query($con, "INSERT INTO jemaat (id_status_jemaat, id_majelis, id_pendeta, id_kk, nama, tempat_dan_tanggal_lahir, jenis_kelamin) VALUES ('$id_status_sosial_jemaat','$id_majelis', '$id_pendeta', '$id_kk', '$nama', '$tempat_dan_tanggal_lahir', '$jenis_kelamin')") or die(mysqli_error($con));

            if ($tambah) {
                echo "<script>alert('Data Berhasil Ditambahkan');window.location='data.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Ditambahkan');window.location='data.php';</script>";
            }
        }
    }
} else if (isset($_POST['edit'])) {
    // Mengambil data dari form input
    $id = $_POST['id'];
    $id_status_jemaat = trim(mysqli_real_escape_string($con, $_POST['id_status_jemaat']));
    $id_majelis = trim(mysqli_real_escape_string($con, $_POST['id_majelis']));
    $id_pendeta = trim(mysqli_real_escape_string($con, $_POST['id_pendeta']));
    $id_kk = trim(mysqli_real_escape_string($con, $_POST['id_kk']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $tempat_dan_tanggal_lahir = trim(mysqli_real_escape_string($con, $_POST['tempat_dan_tanggal_lahir']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));

    // Memeriksa apakah data jemaat sudah ada
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM jemaat WHERE nama = '$nama' AND id_jemaat != '$id'") or die(mysqli_error($con));
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Status Jemaat Sudah Ada');window.location='edit.php?id=$id';</script>";
    } else {
        // Mengupdate data
        $update = mysqli_query($con, "UPDATE jemaat SET id_status_jemaat = '$id_status_jemaat', id_majelis = '$id_majelis', id_pendeta = '$id_pendeta', id_kk = '$id_kk', nama = '$nama', tempat_dan_tanggal_lahir = '$tempat_dan_tanggal_lahir', jenis_kelamin = '$jenis_kelamin' WHERE id_jemaat = '$id'") or die(mysqli_error($con));
        if ($update) {
            echo "<script>alert('Data Berhasil Diubah');window.location='data.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='data.php';</script>";
        }
    }
} else if (isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $targer_dir = "../upload/";
    $targer_file = $targer_dir . $file_name;
    $upload = move_uploaded_file($sumber, $targer_file);
    $obj = PHPExcel_IOFactory::load($targer_file);
    $allData = $obj->getActiveSheet()->toArray(null, true, true, true);

    $sql = "INSERT INTO tb_pasien( nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telepon ) VALUES";
    for ($i = 3; $i <= count($allData); $i++) {
        $nomor_identitas = $allData[$i]['A'];
        $nama_pasien = $allData[$i]['B'];
        $jenis_kelamin = $allData[$i]['C'];
        $alamat = $allData[$i]['D'];
        $no_telepon = $allData[$i]['E'];

        $sql .= "('$nomor_identitas', '$nama_pasien', '$jenis_kelamin', '$alamat', '$no_telepon'),";
    }

    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die(mysqli_error($con));

    unlink($targer_file);
    echo "<script>alert('File Berhasil Diupload'); window.location='data.php';</script>";
}