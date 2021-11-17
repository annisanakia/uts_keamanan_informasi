<!doctype html>
<html lang="en">
    <head>
        <head>
            <?php
                require_once("token.php"); // memanggil file token.php
                include 'head.php'; // memanggil file head.php
            ?>
        </head>
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="action_login.php" method="POST">
                <img class="mb-4" src="assets/brand/logo-esa-unggul.png" alt="" width="180">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <?php
                    if(isset($_GET['success'])){
                        echo '<div class="alert alert-success hideMe">Register Berhasil!</div>';
                    }elseif(isset($_GET['failed'])){
                        echo '<div class="alert alert-danger hideMe">Login gagal!</div>';
                    }
                ?>

                <!-- Input token -->
                <input type="hidden" name="token" value="<?php echo $token ?>" />
                
                <div class="form-floating">
                    <input type="username" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <input type="submit" class="w-100 btn btn-lg btn-primary" name="login" value="Sign in"/>
                <a class="w-100 mt-2 btn btn-lg btn-secondary" href="register.php">Register</a>
                <p class="mt-2 mb-3 text-muted">&copy; 2021 Nakia</p>
            </form>
        </main>
    </body>
</html>
