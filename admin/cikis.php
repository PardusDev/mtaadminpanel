<?php
session_start();
unset($_SESSION['oturum']);
header("Location: index.php")
?>