<?php

    session_start();
    session_destroy();

    header('location:../loginStagiaire.php');

?>