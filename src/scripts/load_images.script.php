<?php 
session_start();
if (isset($_FILES["image"]) && isset($_POST['insert_image']) && isset($_POST['desc']) && isset($_SESSION['carrax'])) {
    $file = $_FILES["image"];
    
    require "./db_config.script.php";
    $sql = "INSERT INTO Galleria VALUES (0 , :name, :desc, :type, :size ,:image)";

    if ($file['size'] < 50000000) {
        if (in_array($file['type'], array("image/png", "image/jpeg", "image/jpg", "image/gif"))) {
            $stmt = $pdo->prepare($sql);

            if (!$stmt->execute([
                ':name' => $file['name'], 
                ':desc' => $_POST['desc'],
                ':type' => $file['type'],
                ':size' => $file['size'],
                ':image' => file_get_contents($file['tmp_name'])
            ])) {
                header('Location: ../pages/adminPage.php?error=wtf');
                exit;
            }
        }
        else {
            header('Location: ../pages/adminPage.php?error=type');
            exit;
        }
    }
    else {
        header('Location: ../pages/adminPage.php?error=size');
        exit;
    }
    
    header('Location: ../pages/adminPage.php?success=image');
    exit;
    
}
else {
    //se e' loggato con la sessione mando alla admin page con errore, altrimenti index per i non autorizzati
    if (isset($_SESSION['carrax'])) {
        header('Location: ../pages/adminPage.php?error=wtf');
        exit;
    }
    else {
        header('Location: ../pages/index.php');
        exit;
    }
}    
?>