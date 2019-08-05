<?php

session_start();
session_destroy();
header('Location: whitecow-home-folder/login.php');

?>