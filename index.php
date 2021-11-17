<?php
    require_once("token.php"); // memanggil file token.php
    require_once("auth.php"); // memanggil file auth.php
?>

<!doctype html>
<html lang="en">
    <head>
        <head>
            <?php include 'head.php';  // memanggil file head.php ?>
        </head>
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="action_login.php" method="POST">

                <img class="mb-4" src="assets/brand/logo-esa-unggul.png" alt="" width="180">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <table class="table table-stripper">
                    <tr>
                        <td>Name</td>
                        <td width="5px">:</td>
                        <td class="text-start"><?php echo $_SESSION["user"]["name"] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td width="5px">:</td>
                        <td class="text-start"><?php echo $_SESSION["user"]["email"] ?></td>
                    </tr>
                </table>

                <a class="w-100 mt-2 btn btn-lg btn-secondary" href="logout.php">Logout</a>
                <p class="mt-2 mb-3 text-muted">&copy; 2021 Nakia</p>
            </form>
        </main>
    </body>
</html>
