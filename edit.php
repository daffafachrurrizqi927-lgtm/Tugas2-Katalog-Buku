<?php
require 'config.php';
require 'lang.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

// Menangkap ID dari GET (saat buka web) atau dari POST (saat simpan data)
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} elseif (isset($_POST["id"])) {
    $id = $_POST["id"];
} else {
    header("Location: index.php"); exit;
}

$buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE id = $id"));

$error = []; // Array penampung error

if (isset($_POST["kode_buku"])) {
    if (empty($_POST["kode_buku"])) { $error[] = "Kode Buku tidak boleh kosong."; }
    if (empty($_POST["judul"])) { $error[] = "Judul Buku tidak boleh kosong."; }
    if (empty($_POST["penulis"])) { $error[] = "Penulis tidak boleh kosong."; }
    
    if (empty($error)) {
        $kode = htmlspecialchars($_POST["kode_buku"]);
        $judul = htmlspecialchars($_POST["judul"]);
        $penulis = htmlspecialchars($_POST["penulis"]);
        
        mysqli_query($conn, "UPDATE buku SET kode_buku='$kode', judul='$judul', penulis='$penulis' WHERE id=$id");
        header("Location: index.php"); exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title><?= t('edit') ?></title>
<style>body{font-family:sans-serif; background:#f4f7f6; padding:40px;} .container{background:#fff; padding:30px; max-width:500px; margin:auto; border-radius:8px;} input{width:100%; padding:10px; margin:10px 0; box-sizing:border-box;} .btn{background:#3498db; color:#fff; padding:10px; border:none; cursor:pointer;} .btn-danger{background:#e74c3c; text-decoration:none; color:white; padding:10px; display:inline-block;} .alert { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }</style>
</head>
<body>
    <div class="container">
        <h2><?= t('edit') ?></h2>
        
        <?php 
        // Looping pesan error
        if (!empty($error)) {
            echo "<div class='alert'>";
            foreach ($error as $e) {
                echo "- " . $e . "<br>";
            }
            echo "</div>";
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            
            <label><?= t('kode') ?></label> <input type="text" name="kode_buku" value="<?= $buku['kode_buku'] ?>">
            <label><?= t('judul') ?></label> <input type="text" name="judul" value="<?= $buku['judul'] ?>">
            <label><?= t('penulis') ?></label> <input type="text" name="penulis" value="<?= $buku['penulis'] ?>">
            <button type="submit" class="btn"><?= t('save') ?></button>
            <a href="index.php" class="btn-danger" style="float:right;"><?= t('cancel') ?></a>
        </form>
    </div>
</body>
</html>