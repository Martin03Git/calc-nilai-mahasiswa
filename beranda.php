<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Nilai Mahasiswa</title>
    <link rel="stylesheet" href="styles/style.css">
    <script type="text/javascript">        
        function tampilkanwaktu(){         
            var waktu = new Date();            
            var sh = waktu.getHours() + "";    
            var sm = waktu.getMinutes() + "";  
            var ss = waktu.getSeconds() + "";  
            document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
</script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

    <?php
        $hari = date('l');
        $tampil_hari = "";
        if ($hari=="Sunday") {
            $tampil_hari =  "Minggu";
        } elseif ($hari=="Monday") {
            $tampil_hari =  "Senin";
        } elseif ($hari=="Tuesday") {
            $tampil_hari =  "Selasa";
        } elseif ($hari=="Wednesday") {
            $tampil_hari =  "Rabu";
        } elseif ($hari=="Thursday") {
            $tampil_hari =  "Kamis";
        } elseif ($hari=="Friday") {
            $tampil_hari =  "Jum'at";
        } elseif ($hari=="Saturday") {
            $tampil_hari =  "Sabtu";
        }


    ?>

    <div class="outer">
        <div class="container">
            <header>
                <div class="company">
                    <div class="logo">
                        <img src="images/logo itb.png" alt="Logo ITB AAS">
                    </div>
                    <div class="company-name">
                        <h3>Sistem Perhitungan Nilai Mahasiswa</h3>
                        <h2>INSTITUT TEKNOLOGI BISNIS AAS INDONESIA</h2>
                    </div>
                </div>
                <div class="date">
                    <div class="calendar">
                        <img src="images/calendar.png" alt="calendar">
                        <b><span><?php echo $tampil_hari . ", " . date("d-m-Y"); ?></span> </b>
                    </div>
                    <div class="time">
                        <img src="images/clock.png" alt="Time">
                        <b><span id="clock"></span> </b>
                    </div>
                </div>
            </header>
            <main>

                <section class="input">
                    <h1 class="main-title">Hitung Nilai Mahasiswa</h1>
                    <form action="" method="POST">
                        <table border='0'>
                            <tr>
                                <td>NIM</td>
                                <td colspan='3'>: <input type="text" name="nim" id="nim" class="full-width" required></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td colspan='3'>: <input type="text" name="nama" id="nama"  class="full-width"  required></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td colspan='3'>: <input type="text" name="kelas" id="kelas"  class="full-width"  required></td>
                            </tr>
                            <tr>
                                <td>Nilai Tugas </td>
                                <td>: <input type="number" name="n_tugas" id="n_tugas" class="quarter-width"  min="0" max="100" required></td>
                                <td>bobot (%)</td>
                                <td>: <input type="number" name="bbt_tugas" id="bbt_tugas" class="quarter-width" value="20"  min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <td>Nilai UTS</td>
                                <td>: <input type="number" name="n_uts" id="n_uts" class="quarter-width"  min="0" max="100" required></td>
                                <td>bobot (%)</td>
                                <td>: <input type="number" name="bbt_uts" id="bbt_uts" class="quarter-width"  value="30"  min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <td>Nilai UAS</td>
                                <td>: <input type="number" name="n_uas" id="n_uas" class="quarter-width"  min="0" max="100" required></td>
                                <td>bobot (%)</td>
                                <td>: <input type="number" name="bbt_uas" id="bbt_uas" class="quarter-width"  value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <button type="submit" name="hitung">Hitung</button>
                                </td>
                            </tr>
                        </table>

                    </form>

                </section>


                <?php
                            
                $nim_mhs = "";
                $nama_mhs = "";
                $kelas_mhs = "";
                $n_tugas = "";
                $n_uts = "";
                $n_uas = "";
                $total_n_tugas = "";
                $total_n_uts = "";
                $total_n_uas = "";
                $bbt_tugas = "";
                $bbt_uts = "";
                $bbt_uas = "";
                $n_akhir = "";
                $n_huruf = "";

                if(isset($_POST["hitung"])) {

                    // Tampung value dari tag input
                    $nim_mhs = $_POST["nim"];
                    $nama_mhs = $_POST["nama"];
                    $kelas_mhs = $_POST["kelas"];
                    $n_tugas = $_POST["n_tugas"];
                    $n_uts = $_POST["n_uts"];
                    $n_uas = $_POST["n_uas"];
                    $bbt_tugas = $_POST["bbt_tugas"];
                    $bbt_uts = $_POST["bbt_uts"];
                    $bbt_uas = $_POST["bbt_uas"];

                    // Lakukan kalkulasi
                    $total_n_tugas = ($n_tugas * $bbt_tugas ) / 100;
                    $total_n_uts = ($n_uts * $bbt_uts ) / 100;
                    $total_n_uas = ($n_uas * $bbt_uas ) / 100;
                    $n_akhir = $total_n_tugas + $total_n_uts + $total_n_uas;

                    // Konversi Nilai
                    if ( $n_akhir <= 100 and $n_akhir >= 91) {
                        $n_huruf = "<b>A</b>";
                    } elseif ( $n_akhir <= 90 and $n_akhir >= 81) {
                        $n_huruf = "<b>B</b>";
                    } elseif ( $n_akhir <= 80 and $n_akhir >= 71) {
                        $n_huruf = "<b>c</b>";
                    } elseif ( $n_akhir <= 70 and $n_akhir >= 61) {
                        $n_huruf = "<b>D</b>";
                    } elseif ( $n_akhir < 60 ) {
                        $n_huruf = "<b>E</b>";
                    } else {
                        $n_huruf = "<b>Nilai tidak ada</b>";
                    }



                }

                ?>



                <section class="output">
                    <h1 class="main-title">Hasil</h1>
                    <table border="0">
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td colspan="3" class="align-left"><?php echo $nim_mhs; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td colspan="3" class="align-left"><?php echo $nama_mhs; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td colspan="3" class="align-left"><?php echo $kelas_mhs; ?></td>
                        </tr>
                        <tr>
                            <td>Nilai Tugas </td>
                            <td>:</td>
                            <td><?php echo $total_n_tugas; ?></td>
                            <td>bobot (%) : </td>
                            <td><?php echo $bbt_tugas ?></td>
                        </tr>
                        <tr>
                            <td>Nilai UTS</td>
                            <td>:</td>
                            <td><?php echo $total_n_uts; ?></td>
                            <td>bobot (%) : </td>
                            <td><?php echo $bbt_uts ?></td>
                        </tr>
                        <tr>
                            <td>Nilai UAS</td>
                            <td>:</td>
                            <td><?php echo $total_n_uas; ?></td>
                            <td>bobot (%) : </td>
                            <td><?php echo $bbt_uas ?></td>
                        </tr>
                        <tr>
                            <td>Nilai Akhir</td>
                            <td>:</td>
                            <td colspan="2" class="nilai_akhir"><b><?php echo $n_akhir; ?></b></td>
                            <td class="nilai_akhir">( <?php echo $n_huruf; ?> )</td>
                        </tr>
                    </table>
                </section>

            </main>
        </div>
    </div>
</body>
</html>