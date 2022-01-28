<?php
require_once 'database.php';

$sql = 'INSERT INTO schule.adresse ( plz , stadt , strasse, nr ) 
        VALUES ("' . $_POST['plz'] . '", "' . $_POST['stadt'] . '", "' . $_POST['strasse'] . '", "' . $_POST['nr'] . '")';
query($sql);

header('Location: index.php');
die();
