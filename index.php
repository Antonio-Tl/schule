<?php
require_once 'database.php';
require_once 'classes/Address.php';
require_once 'classes/Course.php';
require_once 'classes/Pupil.php';
require_once 'classes/Subject.php';



echo '<a href="listS.php">Liste aller Schueler</a>';
echo '</br>';
echo '<a href="listA.php">Liste mit Adresse der Schueler</a>';
echo '</br>';
echo '<a href="listL.php">Liste aller Lehrer</a>';
echo '</br>';
echo '<a href="listC.php">Liste aller Kurse</a>';
echo '</br>';
echo '<a href="formularS.php">Schüler eintragen</a>';
echo '</br>';
echo '<a href="formularL.php">Lehrer eintragen</a>';


$address = new Address();

$pupil = new Pupil('Arlind');
$pupil->setAddress($address);

$pupil->myAddress->city = 'Ludwigshafen';
$pupil->myAddress->street = 'keine Ahnung Allee';



// print_r($pupil);

// terminal - index.php ausführen - oder im browser aufrufen

// cd schule
// C:\xampp\php\php.exe index.php !!!
// Die Konsole zeigt euch jetzt das Objekt (Kuchen) Arlid - und darin den kuchen (Adresse)
