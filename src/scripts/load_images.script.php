<?php 
session_start();
if (isset($_FILES["image"]) && isset($_POST['insert_image']) && isset($_POST['desc']) && isset($_SESSION['carrax'])) {  
    require "./db_config.script.php";
    $sql = "INSERT INTO Galleria VALUES (0 , :name, :desc, :type, :size ,:image)";

    $file = $_FILES["image"]; 
    if ($file['size'] < 50000000) {
        if (in_array($file['type'], array("image/png", "image/jpeg", "image/jpg", "image/gif"))) {
            
            $fileExt = explode('.', $file['name']);
            $fileActualExt =strtolower(end($fileExt));
            $dir_fileName = uniqid('', true).".".$fileActualExt;
            $fileDestination = "../img/gallery/".$dir_fileName;
            //move the image to gallery folder with unique identifier
            move_uploaded_file($file['tmp_name'], $fileDestination);
            
            $stmt = $pdo->prepare($sql);
            if (!$stmt->execute([
                ':name' => $file['name'], 
                ':desc' => $_POST['desc'],
                ':type' => $fileActualExt,
                ':size' => $file['size'],
                ':image' => $fileDestination
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