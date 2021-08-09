<?php 
    require "./db_config.script.php";
    $n = $_GET['num'];
    $stmt = $pdo->prepare("SELECT * FROM Galleria LIMIT 10 OFFSET ". $n*10);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="img-container">
                <div  class="thumb gallery-item image" style="animation-delay:'.($i*60).'ms">
                    <div class="img-container">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="'.$row['descrizione'].'" data-image="'. $row['img_dir'] .'" data-target="#image-gallery">
                            <img class="img-thumbnail" src="' . $row['img_dir'] . '" alt="'.$row['descrizione'].'" loading="lazy"> 
                            <div class="description">'.$row['descrizione'].'</div>
                        </a> 
                    </div>
                </div>
            </div>';     
            $i++; 
    }
?>