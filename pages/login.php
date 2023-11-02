<?php

if ($_POST['username'] === 'bokarmy6806' && $_POST['password'] === 'bokarmy6806') {
  
    header('Location: admin.php');
} else {
   
    echo 'Onjuiste inloggegevens. Probeer opnieuw.';
}
?>
