<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_assurance','root','');
    }catch(Exception $e){
        die('Connexion Error :' .$e->getMessage());
    }
?>

