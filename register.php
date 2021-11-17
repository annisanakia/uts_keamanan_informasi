<!doctype html>
<html lang="en">
    <head>
        <?php
            require_once("token.php"); // memanggil file token.php
            include 'head.php'; // memanggil file head.php
        ?>
    </head>
    <body>
        <main class="form-signin">
            <form action="action_register.php" method="POST">
                <div class="text-center">
                    <img class="mb-2" src="assets/brand/logo-esa-unggul.png" alt="" width="180">
                </div>
                <h1 class="h3 mb-3 fw-normal">Register</h1>
                <?php
                    if(isset($_GET['failed_token'])){
                        echo '<div class="alert alert-danger hideMe">Failed token!</div>';
                    }
                ?>

                <!-- Input token -->
                <input type="hidden" name="token" value="<?php echo $token ?>" />

                <div class="form-group mb-2">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mb-2">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

                <input type="submit" class="w-100 btn btn-lg btn-primary" name="register" value="Daftar"/>
                <a class="w-100 mt-2 btn btn-lg btn-secondary" href="login.php">Kembali</a>
                <p class="mt-2 mb-3 text-muted">&copy; 2021 Nakia</p>
            </form>
        </main>
    </body>
</html>
