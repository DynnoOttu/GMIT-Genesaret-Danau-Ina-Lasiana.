<?php include '../_header.php' ?>

<?php
$get1 = mysqli_query($con, "SELECT * FROM majelis");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($con, "SELECT * FROM jemaat");
$count2 = mysqli_num_rows($get2);

//Grafik
// $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November"];
// for ($bulan = 1; $bulan < 13; $bulan++) {
//     $query = mysqli_query($con, "SELECT sum(id_pasien) as id_pasien from tb_rekapmedis Where MONTH(tanggal_periksa) = '$bulan'");
//     $row = $query->fetch_array();
//     $jumlah_pasien[] = $row['id_pasien'];
// }

?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Jumlah Jemaat: <?= $count1 ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Jumlah Majelis: <?= $count2 ?></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-6">
            <canvas id="myChart" height="40vh" width="80vw"></canvas>
        </div>
    </div>

</div>

<?php include '../_footer.php' ?>

<!-- <script>
    const data = {
        labels: [
            'Prempuan',
            'Laki-Laki',
        ],
        datasets: [{
            label: 'Jumlah Pasien Berdasarkan Jenis Kelamin',
            data: [

                <?php
                $perempuan = mysqli_query($con, "SELECT * FROM tb_pasien WHERE jenis_kelamin = 'Perempuan'");
                $queryP = mysqli_num_rows($perempuan);
                echo $queryP;
                ?>,


                <?php
                $lakiLaki = mysqli_query($con, "SELECT * FROM tb_pasien WHERE jenis_kelamin = 'Laki-Laki'");
                $queryLaki = mysqli_num_rows($lakiLaki);
                echo $queryLaki;
                ?>

            ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'pie',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    )
</script> -->