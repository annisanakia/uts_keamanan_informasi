<?php

// pengecheckan jika tidak ada session user nya maka akan diarahkan ke halaman login
if(!isset($_SESSION["user"])) header("Location: login.php");