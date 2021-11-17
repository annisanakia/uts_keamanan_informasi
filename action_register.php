<?php
require_once("config.php");

if(isset($_POST['register'])){
    session_start();
    if (!empty($_POST['token'])) {
        // jika token sama
        if (hash_equals($_SESSION['token'], $_POST['token'])) {
            // filter data yang diinputkan
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            // enkripsi password
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // untuk hashing password menggunakan password_hash
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            // XSS
            $name = htmlspecialchars($name); // mengkonversi 4 karakter ’khusus’ HTML menjadi named entity
            $username = strip_tags($username); // menghapus seluruh tag HTML
            $password = htmlspecialchars($password); // mengkonversi 4 karakter ’khusus’ HTML menjadi named entity
            $email = strip_tags($email); // menghapus seluruh tag HTML

            // menyiapkan query
            $sql = "INSERT INTO users (name, username, email, password) 
                    VALUES (:name, :username, :email, :password)";
            $stmt = $db->prepare($sql);

            // bind parameter ke query
            $params = array(
                ":name" => $name,
                ":username" => $username,
                ":password" => $password,
                ":email" => $email
            );

            // eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);

            // jika query simpan berhasil, maka user sudah terdaftar
            // maka alihkan ke halaman login
            if($saved) header("Location: login.php?success=1");
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