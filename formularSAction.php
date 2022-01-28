<?php
require_once 'database.php';

$sql = 'INSERT INTO schule.schueler ( fname , lname ) 
        VALUES ("' . $_POST['fname'] . '", "' . $_POST['lname'] . '")';
query($sql);

header('Location: index.php');
die();