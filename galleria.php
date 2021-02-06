<?php  $page="gallery";  require_once "./header.php" ?>

<div class="container mb-5">
    <h1 id='galleria-titolo'>Galleria</h1>
		<div class="gallery-grid">
            <?php 
            require "./scripts/db_config.script.php";
            $stmt = $pdo->prepare("SELECT * FROM Galleria");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                for ($i = 0; $i <= 4; $i++) {
                    $src = 'data:'.$row['tipo'].';base64,'.base64_encode($row['immagine']);
                    echo '<div  class="thumb gallery-item">
                            <div class="img-container">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="' . $src . '" data-target="#image-gallery">
                                    <img class="img-thumbnail" src="' . $src . '" alt="'.$row['nome'].'"> 
                                    <div class="description">'.$row['descrizione'].'</div>
                                </a> 
                            </div>
                        </div>';      
                }   
            }
            ?>
        </div>
        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src='./js/galleria.js'>

</script>

<?php require_once "./footer.php" ?>


