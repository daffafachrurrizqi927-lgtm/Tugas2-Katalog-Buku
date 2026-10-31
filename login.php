<?php
require 'config.php';
require 'lang.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// 1. Menggunakan array untuk menampung error
$error = [];  

// 2. Mengecek form dengan isset (Sesuai Modul)
if (isset($_POST["username"])) {
    
    // Validasi data kosong dengan empty()
    if (empty($_POST["username"])) {
        $error[] = "Username tidak boleh kosong.";
    }
    if (empty($_POST["password"])) {
        $error[] = "Password tidak boleh kosong.";
    }

    // Jika array error kosong, proses login
    if (empty($error)) {
        // Sanitasi dengan htmlspecialchars
        $username = htmlspecialchars($_POST['username']);
        $password = md5($_POST['password']); 

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        if (mysqli_num_rows($result) === 1) {
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        } else {
            $error[] = "Username atau password salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= t('login_title') ?></title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        input[type=text], input[type=password] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { width: 100%; background: #3498db; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
        .alert { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align:center;"><?= t('login_title') ?></h2>
        <p style="text-align:center;">Bahasa: <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a></p>
        
        <?php 
        // 3. Looping pesan error menggunakan foreach
        if (!empty($error)) {
            echo "<div class='alert'>";
            foreach ($error as $e) {
                echo "- " . $e . "<br>";
            }
            echo "</div>";
        }
        ?>

        <!-- 4. Menggunakan PHP_SELF pada action -->
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="username" placeholder="Username (admin)">
            <input type="password" name="password" placeholder="Password (admin123)">
            <button type="submit" class="btn"><?= t('login_btn') ?></button>
        </form>
    </div>
</body>
</html>