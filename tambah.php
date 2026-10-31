<?php
require 'config.php';
require 'lang.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$error = []; // Array penampung error

// Cek apakah tombol simpan/form dikirim menggunakan isset()
if (isset($_POST["kode_buku"])) {
    
    // Validasi pengecekan satu per satu
    if (empty($_POST["kode_buku"])) {
        $error[] = "Kode Buku tidak boleh kosong.";
    }
    if (empty($_POST["judul"])) {
        $error[] = "Judul Buku tidak boleh kosong.";
    }
    if (empty($_POST["penulis"])) {
        $error[] = "Penulis tidak boleh kosong.";
    }
    
    // Jika tidak ada error sama sekali
    if (empty($error)) {
        // Lakukan sanitasi variabel
        $kode = htmlspecialchars($_POST["kode_buku"]);
        $judul = htmlspecialchars($_POST["judul"]);
        $penulis = htmlspecialchars($_POST["penulis"]);
        
        mysqli_query($conn, "INSERT INTO buku VALUES (NULL, '$kode', '$judul', '$penulis')");
        header("Location: index.php"); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title><?= t('add') ?></title>
<style>body{font-family:sans-serif; background:#f4f7f6; padding:40px;} .container{background:#fff; padding:30px; max-width:500px; margin:auto; border-radius:8px;} input{width:100%; padding:10px; margin:10px 0; box-sizing:border-box;} .btn{background:#3498db; color:#fff; padding:10px; border:none; cursor:pointer;} .btn-danger{background:#e74c3c; text-decoration:none; color:white; padding:10px; display:inline-block;} .alert { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }</style>
</head>
<body>
    <div class="container">
        <h2><?= t('add') ?></h2>
        
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
            <label><?= t('kode') ?></label> <input type="text" name="kode_buku">
            <label><?= t('judul') ?></label> <input type="text" name="judul">
            <label><?= t('penulis') ?></label> <input type="text" name="penulis">
            <button type="submit" class="btn"><?= t('save') ?></button>
            <a href="index.php" class="btn-danger" style="float:right;"><?= t('cancel') ?></a>
        </form>
    </div>
</body>
</html>