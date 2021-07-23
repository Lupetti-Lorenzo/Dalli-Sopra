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
  <nav class="navbar-">
    <div class="nav-items">
      <h1 class="nav-titolo">Dalli Sopra</h1> 
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
      </div>
      <div class="nav-items">
       <?php if (isset($_SESSION['carrax'])) {  
          $adminActive = '';
          if ($page === "admin") $adminActive = 'active';
          echo '<a class="nav-item btn btn-info mr-2 text-light nav-link' . $adminActive . '" href="./adminPage.php">Admin</a>';
        }?>
        <a type="button" class="btn nav-link <?php if ($page === "home") echo "btn-primary"; else echo "btn-dark" ?>" href="./index.php">Home</a>
        <a type="button" class="btn nav-link <?php if ($page === "gallery") echo "btn-primary"; else echo "btn-dark" ?>" href="./galleria.php">Galleria</a>
      </div>
  </nav>