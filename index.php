<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container bg-dark text-white">
    <?php
    $HP=null;
    $NR=null;
    $UE=null;
    if (isset($_GET['HP'])) {
        $HP=$_GET['HP'];
        $NR=$_GET['NR'];
        $UE=$_GET['UE'];
        $hasil=0;
        $operasi=$_GET["operasi"];
        switch ($operasi) {
            case 'straight':
                $hasil = ($HP-$NR)/$UE;
                break;
            case 'declining':
                $hasil = (2*(100/100 / $UE))*$HP;
                break;
        }
    }
    ?>
    <div class="rows">
        <form action="index.php" method="get">
            <h2><b><center> KALKULATOR PENYUSUTAN AKTIVA TETAP </center></b></h2>
            <div class="form-group">
                <label>Harga Perolehan (Rupiah):</label>
                <input type="text" name="HP" class="form-control" value="<?php echo $HP; ?>" required>
            </div>
            <div class="form-group">
                <label>Nilai Residu (Rupiah):</label>
                <input type="text" name="NR" class="form-control" value="<?php echo $NR; ?>"  required>
            </div>
            <div class="form-group">
                <label>Umur Ekonomis (Tahun):</label>
                <input type="text" name="UE" class="form-control" value="<?php echo $UE; ?>"  required>
            </div>
            <div class="form-group">
                <select class="form-control" name="operasi">
                    <option value="straight">Garis Lurus</option>
                    <option value="declining">Saldo Menurun Ganda</option>
                </select>
            </div>
            <button type="button" class="btn btn-danger" onclick="location.href='?'">Clear</button>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>
        <br>
        <?php
        if (isset($_GET['HP'])) {
            $hasil = "Rp" .number_format($hasil,0,',','.');
            echo "<h1>$hasil</h1>" ;
        }
        ?>
    </div>
</div>
</body>
</html>