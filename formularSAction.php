<?php
require_once 'database.php';
$sql = 'INSERT INTO schule.schueler and schule.adresse ( fnameS , lnameS , plz , stadt , strasse , nr ) 
        VALUES ("' . $_POST['fnameS'] . '", "' . $_POST['lnameS'] . '", "' . $_POST['plz'] . '", "' . $_POST['stadt'] . '", "' . $_POST['strasse'] . '", "' . $_POST['nr'] . '")';
query($sql);

header('Location: index.php');
