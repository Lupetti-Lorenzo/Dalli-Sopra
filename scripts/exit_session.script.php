<?php 
session_start();
if (isset($_POST['exit_session']) && isset($_SESSION['carrax'])) {
    session_unset($_SESSION['carrax']);
}
header("Location: ../index.php");
exit;