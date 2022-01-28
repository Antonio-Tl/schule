<?php
require_once 'database.php';

$sql = 'INSERT INTO schule.lehrer ( fnameL , lnameL ) 
        VALUES ("' . $_POST['fnameL'] . '", "' . $_POST['lnameL'] . '")';
query($sql);

header('Location: index.php');
die();

