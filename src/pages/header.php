<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href='../styles/style.css'>
    
    <title>Dalli sopra</title>

  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">
      <img style="height: 40px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/132px-Instagram_logo_2016.svg.png" alt="" loading="lazy"/>
      <span class="mx-3">Dalli Sopra</span> 
      <?php 
        session_start();
        if (isset($_SESSION['carrax'])) {
            echo '
            <form method="post" action="../scripts/exit_session.script.php" enctype="multipart/form-data" class="d-inline"> 
                <input type="submit" name="exit_session" value="Finisci sessione" class="btn btn-danger"/>
            </form>
            ';
        } 
      ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
      <div class="navbar-nav align-items-center">
       <?php if (isset($_SESSION['carrax'])) {  
        $adminActive = '';
         if ($page === "admin") $adminActive = 'active';
         echo '<a class="nav-item nav-link' . $adminActive . '" href="./adminPage.php">Admin</a>';
        }?>
        
        <a class="nav-item nav-link <?php if ($page === "home") echo "active"; ?>" href="./index.php">Home</a>
        <a class="nav-item nav-link <?php if ($page === "gallery") echo "active"; ?>" href="./galleria.php">Galleria</a>
        <a class="nav-item nav-link <?php if ($page === "storia") echo "active"; ?>"   href="./laStoria.php">La storia</a>
        <a class="nav-item nav-link" href="#">Il castello</a>
        <a class="nav-item nav-link" href="#">La piazza</a>
      </div>
    </div>
  </nav>