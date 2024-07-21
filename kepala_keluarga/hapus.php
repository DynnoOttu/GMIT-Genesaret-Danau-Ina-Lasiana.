<?php require_once '../_config/config.php';

mysqli_query($con, "DELETE FROM kepala_keluarga WHERE id_kepala_keluarga = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>window.location='data.php'</script>";
