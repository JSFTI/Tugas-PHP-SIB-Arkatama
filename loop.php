<?php
session_start();

if(array_key_exists('reset', $_POST) && $_POST['reset'] == 1){
  session_destroy();
} else {
  $_SESSION['string'] = $_POST['string'];
  $_SESSION['loops'] = $_POST['loops'];
}

header("Location: /");
?>