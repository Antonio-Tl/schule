<?php
require_once 'database.php';


if (isset($_GET['id'])) {
    $parts = explode('-', $_GET['id']);
    $kId = $parts[0];
    $sId = $parts[1];
}
$sql = 'UPDATE schule.kurse_schueler set deleted_at=NOW() where k_id=' . $kId . ' and s_id=' . $sId;

query($sql);

header('Location: listC.php?kursId=' . $kId);
die();