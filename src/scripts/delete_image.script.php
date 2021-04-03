<?php
session_start();
if (isset($_GET['delete_images']) && isset($_SESSION['carrax'])) {

    $id = $_GET['delete_images'];
    
    $sql = "DELETE FROM Galleria WHERE id=:id";
    require "../scripts/db_config.script.php";
    
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([ ':id' => $id ])) {
        header("Location: ../pages/adminPage.php?success=delete");
        exit;
    }
    else {
        header("Location: ../pages/adminPage.php?error=deleted");
        exit;
    }
}
else if (isset($_SESSION['carrax'])) {
    header('Location: ../pages/adminPage.php?error=wtf');
    exit;
}
else {
    header('Location: ../pages/index.php');
    exit;
}
