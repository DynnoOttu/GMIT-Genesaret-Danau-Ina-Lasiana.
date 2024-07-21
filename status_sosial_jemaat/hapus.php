<?php require_once '../_config/config.php';


$deleted_at = date('Y-m-d H:i:s'); // Set timestamp penghapusan

$sql_cek_identitas = mysqli_query($con, "SELECT * FROM status_sosial_jemaat WHERE id_status_sosial_jemaat = '$_GET[id]' AND deletet_at  IS NULL") or die(mysqli_error($con));
if (mysqli_num_rows($sql_cek_identitas) > 0) {
    // Update kolom deleted_at untuk menandai soft delete
    $soft_delete = mysqli_query($con, "UPDATE status_sosial_jemaat SET deletet_at = '$deleted_at' WHERE id_status_sosial_jemaat = '$_GET[id]'") or die(mysqli_error($con));
    if ($soft_delete) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');window.location='data.php';</script>";
    }
} else {
    echo "<script>alert('Data Tidak Ditemukan atau Sudah Dihapus');window.location='data.php';</script>";
}
