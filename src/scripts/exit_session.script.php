<?php 
session_start();
if (isset($_POST['exit_session']) && isset($_SESSION['carrax'])) {
    session_unset();
}
header("Location: ../pages/index.php");
exit;