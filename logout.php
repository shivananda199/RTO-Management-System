<?php
session_start();
session_destroy();
header('Location: inspector_login.php');
?>
