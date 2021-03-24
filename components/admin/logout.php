<?php
session_start();
unset($_SESSION['login']);
header('Location: admin_log.php');