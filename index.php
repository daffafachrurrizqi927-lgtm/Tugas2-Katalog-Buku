<?php
require 'config.php';
require 'lang.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$keyword = "";
if (isset($_GET['keyword'])) {
    $keyword = htmlspecialchars($_GET['keyword']);
    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%' OR kode_buku LIKE '%$keyword%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM buku ORDER BY id DESC";
}
$buku = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= t('title') ?></title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; margin: 0; padding: 40px 20px; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { border-bottom: 2px solid #eee; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #3498db; color: white; }
        tr:hover { background-color: #f5f5f5; }
        .btn { display: inline-block; background: #3498db; color: white; padding: 8px 15px; border-radius: 4px; text-decoration: none; border: none; cursor: pointer; }
        .btn-danger { background: #e74c3c; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 15px; }
        .search-box input[type=text] { padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 250px; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= t('title') ?></h1>
        <p>Bahasa: <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a> &nbsp;|&nbsp; <a href="logout.php" style="color:red;"><?= t('logout') ?></a></p>
        
        <div class="toolbar">
            <a href="tambah.php" class="btn">+ <?= t('add') ?></a>
            <form action="" method="GET" class="search-box">
                <?php if(isset($_GET['lang'])): ?>
                    <input type="hidden" name="lang" value="<?= htmlspecialchars($_GET['lang']) ?>">
                <?php endif; ?>
                <input type="text" name="keyword" value="<?= $keyword; ?>" placeholder="<?= t('search_placeholder') ?>">
                <button type="submit" class="btn"><?= t('search_btn') ?></button>
                <?php if($keyword != ""): ?>
                    <a href="index.php" class="btn btn-danger"><?= t('reset_btn') ?></a>
                <?php endif; ?>
            </form>
        </div>
        
        <table>
            <tr>
                <th>No</th><th><?= t('kode') ?></th><th><?= t('judul') ?></th><th><?= t('penulis') ?></th><th><?= t('action') ?></th>
            </tr>
            <?php $no = 1; if(mysqli_num_rows($buku) > 0) : while ($row = mysqli_fetch_assoc($buku)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row["kode_buku"]); ?></td>
                <td><?= htmlspecialchars($row["judul"]); ?></td>
                <td><?= htmlspecialchars($row["penulis"]); ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn">Edit</a> 
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr><td colspan="5" style="text-align:center;">Data tidak ditemukan.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>