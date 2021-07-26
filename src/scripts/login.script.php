<?php
if (isset($_POST['login_submit']) && isset($_POST['uid']) && isset($_POST['pass']) ) {
    if ($_POST['uid'] === "Carrax" && $_POST['pass'] === '01CarraxGameplayer01') {
        session_start();
        $_SESSION['carrax'] = "Carrax";
        header("Location: ../pages/adminPage.php");
        exit;
    }
    else {
        header("Location: ../pages/adminLoginPage.php?error=1");
        exit;
    }
}
else {
    header("Location: ../pages/adminLoginPage.php");
    exit;
}