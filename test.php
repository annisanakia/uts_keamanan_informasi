<?php 
    $md5 = md5('Jangan Lupa Senyum Kia');

    $hash = password_hash("Jangan Lupa Senyum Kia", PASSWORD_DEFAULT);

    echo 'md5 : '.$md5.'<br>'.'password_hash : '.$hash;
?>