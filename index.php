<?php
require_once 'database.php';
require_once 'classes/Address.php';
require_once 'classes/Course.php';
require_once 'classes/Pupil.php';
require_once 'classes/Subject.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
echo $ip;

echo '<a href="listS.php">Liste aller Schueler</a>';
echo '</br>';
echo '<a href="listA.php">Liste mit Adresse der Schueler</a>';
echo '</br>';
echo '<a href="formularA.php">Adresse eintragen</a>';
echo '</br>';
echo '<a href="listL.php">Liste aller Lehrer</a>';
echo '</br>';
echo '<a href="listC.php">Liste aller Kurse</a>';
echo '</br>';
echo '<a href="formularS.php">Schüler eintragen</a>';
echo '</br>';
echo '<a href="formularL.php">Lehrer eintragen</a>';



$sql = "select * from schule.schueler";
$test = query($sql);
foreach($test as $key => $x){

    echo "das aktuelle ding im sack test wird erkannt am schlüssel $key </br>";
    foreach($x as $spalte => $feld){
        echo "$spalte : $feld </br>";
    }


}


print_r($_SERVER);
