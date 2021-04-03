<?php
//se e gia loggato lo mando direttamente alla pagina admin
session_start();
if (isset($_SESSION['carrax'])) {
    header("Location: ./adminPage.php");
    exit;
}
require "./header.php";

?>

<form action='../scripts/login.script.php' method='post'>
    <input type='text' name='uid' placeholder='Username'  maxlength='44' required/>
    <input type='password' name='pass' placeholder='Password...' maxlength='29' required/>       
    <button type='submit' name='login_submit'>Accedi</button>
</form>


<?php
if (isset($_GET['error'])) {
    echo '<p class="text-danger">Username o password sbagliati, riprova.</p>';
}
require "./footer.php" 
?>

