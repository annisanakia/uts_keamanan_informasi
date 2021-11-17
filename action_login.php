<?php 
require_once("config.php");

if(isset($_POST['login'])){
    session_start();
    if (!empty($_POST['token'])) {
        // jika token sama
        if (hash_equals($_SESSION['token'], $_POST['token'])) {

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
            $stmt = $db->prepare($sql);
            
            // bind parameter ke query
            $params = array(
                ":username" => $username,
                ":email" => $username
            );

            $stmt->execute($params);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // jika user terdaftar
            if($user){
                // verifikasi password
                if(password_verify($password, $user["password"])){ // untuk mencocokkan password menggunakan password_verify
                    // buat Session
                    session_start();
                    $_SESSION["user"] = $user;
                    // login sukses, alihkan ke halaman timeline
                    header("Location: index.php");
                }else{
                    // login gagal diarahkan ke login lg
                    header("Location: login.php?failed=1");
                }
            }else{
                // login gagal diarahkan ke login lg
                header("Location: login.php?failed=1");
            }
        }else{
            // jika token tidak sama
            header("Location: register.php?failed_token=1");
        }
    }else{
        // jika token tidak sama
        header("Location: register.php?failed_token=1");
    }

}

?>
