<?php
require 'config.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
header("Location: index.php");
exit;
?>