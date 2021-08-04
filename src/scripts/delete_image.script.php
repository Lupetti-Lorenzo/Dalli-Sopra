<?php
session_start();
if (isset($_GET['delete_images']) && isset($_SESSION['carrax'])) {
    require "./db_config.script.php";

    $id = $_GET['delete_images'];

    //delete from gallery folder
    $sqlSel = "SELECT * FROM Galleria WHERE id=:id";
    $stmtSel = $pdo->prepare($sqlSel);
    $stmtSel->execute([ ':id' => $id ]);
    $row = $stmtSel->fetch(PDO::FETCH_ASSOC);

    //delete record from database
    $sqlDel = "DELETE FROM Galleria WHERE id=:id";

    $stmt = $pdo->prepare($sqlDel);
    if ($stmt->execute([ ':id' => $id ])) {
        header("Location: ../pages/adminPage.php?success=imageDeleted");
        exit;
    }
    else {
        header("Location: ../pages/adminPage.php?error=imageDeleted");
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
