<?php 
session_start();
if (!isset($_SESSION['carrax'])) {
    header("Location: ./adminLoginPage.php");
    exit;
}
$page = "admin";
require "./header.php";
?>
<div class="container pt-3">
    <form method="post" action="../scripts/load_images.script.php" enctype="multipart/form-data" class='text-center mb-5'> 
        <h2 class='mb-4'>Gestione galleria immagini</h2>
        <span class='mr-4'><b>Formati supportati:</b> jpg, png, jpeg, gif</span>
        <span class='mr-4'><b>Dimensione massima:</b> 16MB</span>
        <span><b>Max caratteri descrizone:</b> 512</span>
        <div class='mt-3'>
            <input type="file" name="image" class='border border-primary p-1 rounded' required/>
            <div class="input-group my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descrizione:</span>
                </div>
                <textarea class="form-control" aria-label="Descrizione:" name="desc" maxlength='512' placeholder="Scrivi <br> per andare a capo..." required></textarea>
            </div>
            <input type="submit" name="insert_image" value="Inserisci immagine" class='btn btn-primary'/>
        </div>
    </form>

    <?php

        if (isset($_GET['success'])) {
            echo '<p class="text-success text-center lead">';
            switch ($_GET['success']) {
                case 'image':
                    echo 'Immagine aggiunta con successo!</p>';
                    break;
                case 'delete':
                    echo 'Cancellazione andata a buon fine!';
                    break;
                default:
                    break;
            }
            echo "</p>";
        }

        if (isset($_GET['error'])) {
            echo '<p class="text-danger text-center lead">';
            switch ($_GET['error']) {
                case 'wtf':
                    echo "Errore sconosciuto durante la cancellazione o l'upload dell'immagine -> senti lore";
                    break;
                case 'type':
                    echo "Errore nell upload dell immagine: estenzione sbagliata";
                    break;
                case 'size':
                    echo "Errore nell upload dell immagine: file troppo grande";
                    break;
                case 'delete':
                    echo 'Ce stato un errore durante la cancellazione';
                default:
                    break;
            }
            echo "</p>";
        }
    ?>

    <form method='GET' id='delete_imgs' action='../scripts/delete_image.script.php'>

        <div class="row">

        <?php 
            //display le immagini dal database
            require "../scripts/db_config.script.php";

            $stmt = $pdo->prepare("SELECT * FROM Galleria");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $src = 'data:'.$row['tipo'].';base64,'.base64_encode($row['immagine']);
                echo "<div class='col-6 col-md-4 col-lg-3'>";
                    echo '<div class="card p-1">
                            <img class="card-img-top" src="' . $src . '" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['nome'].'</h5>     
                                <p class="card-text">Size:'.$row['dimensioni'].'</p>
                                <p class="card-text">'.$row['descrizione'].'</p>
                                <button name="delete_images" value="'.$row['ID'].'" type="submit" class="btn btn-danger" form="delete_imgs">Elimina</button>
                            </div>
                        </div>
                    ';
                echo '</div>';
            }
            
        ?>
        </div>
    </form>
</div>
<?php require "./footer.php" ?>

