<?php
session_start();
$title = "Proses SAW - InstaCode_SAW";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proses Saw</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Proses Saw</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Matriks X -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks X</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_penilaian ORDER BY stambuk ASC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= $row[2] ?></td>
                                            <td align="center"><?= $row[3] ?></td>
                                            <td align="center"><?= $row[4] ?></td>
                                            <td align="center"><?= $row[5] ?></td>
                                            <td align="center"><?= $row[6] ?></td>
                                            <td align="center"><?= $row[7] ?></td>
                                            <td align="center"><?= $row[8] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matriks Ternomalisasi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Matriks Ternomalisasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Pendapatan Ortu</th>
                                        <th>Tanggungan Ortu</th>
                                        <th>Pengeluaran Ortu</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>Tingkah Laku</th>
                                        <th>Keaktifan Organisasi</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $C1 = '';
                                $C2 = '';
                                $C3 = '';
                                $C4 = '';
                                $C5 = '';
                                $C6 = '';
                                $C7 = '';

                                //Biaya
                                $sql = "SELECT*FROM tb_penilaian ORDER BY pendapatan_ortu ASC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C1 = $row[2];

                                //Keuntungan
                                $sql = "SELECT*FROM tb_penilaian ORDER BY tanggungan_ortu DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C2 = $row[3];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY pengeluaran_ortu DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C3 = $row[4];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY ipk DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C4 = $row[5];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY semester DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C5 = $row[6];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY tingkahlaku DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C6 = $row[7];

                                $sql = "SELECT*FROM tb_penilaian ORDER BY keaktifanorganisasi DESC";
                                $hasil = $conn->query($sql);
                                $row = $hasil->fetch_row();
                                $C7 = $row[8];


                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td align="center"><?= round($C1 / $row[2], 2)  ?></td>
                                            <td align="center"><?= round($row[3] / $C2, 2) ?></td>
                                            <td align="center"><?= round($row[4] / $C3, 2) ?></td>
                                            <td align="center"><?= round($row[5] / $C4, 2) ?></td>
                                            <td align="center"><?= round($row[6] / $C5, 2) ?></td>
                                            <td align="center"><?= round($row[7] / $C6, 2) ?></td>
                                            <td align="center"><?= round($row[8] / $C7, 2) ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Hitung SAW -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hitung SAW</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $B1 = '';
                                $B2 = '';
                                $B3 = '';
                                $B4 = '';
                                $B5 = '';
                                $B6 = '';
                                $B7 = '';
                                $nilai = '';
                                $nama = '';
                                $x = 0;

                                $sql = "SELECT*FROM tb_kriteriasaw";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    $row = $hasil->fetch_row();
                                    $B1 = $row[1];
                                    $B2 = $row[2];
                                    $B3 = $row[3];
                                    $B4 = $row[4];
                                    $B5 = $row[5];
                                    $B6 = $row[6];
                                    $B7 = $row[7];
                                }

                                $sql = "truncate table tb_ranking";
                                $hasil = $conn->query($sql);

                                $sql = "SELECT*FROM tb_penilaian";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $nilai = round((($C1 / $row[2]) * $B1) +
                                            (($row[3] / $C2) * $B2) +
                                            (($row[4] / $C3) * $B3) +
                                            (($row[5] / $C4) * $B4) +
                                            (($row[6] / $C5) * $B5) +
                                            (($row[7] / $C6) * $B6) +
                                            (($row[8] / $C7) * $B7), 3);
                                        $nama = $row[1];
                                        $sql1 = "INSERT INTO tb_ranking(nama,nilai_akhir) values ('" . $nama . "','" . $nilai . "')";
                                        $hasil1 = $conn->query($sql1);
                                    }
                                }
                                $sql = "SELECT*FROM tb_ranking";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Perangkingan -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Perangkingan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai</th>

                                    </tr>
                                </thead>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM tb_ranking ORDER BY nilai_akhir DESC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>