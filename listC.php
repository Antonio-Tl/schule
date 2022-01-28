<?php
require_once 'database.php';
require_once 'classes/Address.php';
require_once 'classes/Course.php';
require_once 'classes/Pupil.php';
require_once 'classes/Subject.php';
?>
<html lang="de">

<head>
    <style>
        .number {
            text-align: right;
        }
    </style>
    <title>Webseite</title>
</head>
<body>
<?php
if(!isset($_GET['kursId'])){
    echo getOverviewTable();
} else {
    echo getCourseTable((int)$_GET['kursId']);
}
?>
<button onclick="window.location.href='/schule/index.php'">Zurueck zum Hauptmenü</button>
</body>
</html>


<?php
function getOverviewTable()
{
    $output = '';

    $output .= '<table>';
    $output .= '<tr>';
        $output .= '<th>Löschen</th>';
        $output .= '<th>ID</th>';
        $output .= '<th>Fach</th>';
        $output .= '<th>Kurs</th>';
    $output .= '</tr>';

    $sql = "SELECT * from schule.kurse K, schule.faecher F WHERE deleted_at is NULL";
    $result = query($sql);
    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###FACH###</td><td>###KURS###</td></tr>';
    foreach ($result as $dataRow) {
        $output.= str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###FACH###',
                '###KURS###',),
            array(
                '<A href="ActionDeleteL.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
                '<a href="?kursId='.$dataRow['id'].'">'.$dataRow['name'].'</a>',
                $dataRow['fach'],
            ),
            $row
        );
    }
    $output .= '</table>';

    return $output;

}

function getCourseTable($courseId)
{
    $output = 'KursId : '.$courseId.'<br>';

    $output .= '<table>';
    $output .= '<tr>';
    $output .= '<th>Löschen</th>';
    $output .= '<th>ID?</th>';
    $output .= '<th>Schülervorname</th>';
    $output .= '<th>Schülernachname</th>';
    $output .= '<th>Note</th>';
    $output .= '</tr>';

    query('use schule');
    $sql = "SELECT CONCAT(KS.k_id,'-',KS.s_id) as id, S.fname, S.lname, KS.note from schule.kurse K  JOIN kurse_schueler KS ON K.id=KS.k_id ";
    $sql .="JOIN schueler s on KS.s_id = s.id WHERE S.deleted_at is NULL and K.deleted_at is null and KS.deleted_at is null";

    $result = query($sql);

    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###NAME###</td><td>###NAME2###</td><td>###NOTE###</td></tr>';
    foreach ($result as $dataRow) {
        $output.= str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###NAME###',
                '###NAME2###',
                '###NOTE###',
                ),
            array(
                '<A href="ActionDeleteC.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
                $dataRow['fname'],
                $dataRow['lname'],
                $dataRow['note'],
            ),
            $row
        );
    }
    $output .= '</table>';
    $output .= '<button onclick="window.location.href=\'/schule/listC.php\'">Zurueck zu den Kursen</button><br>';

    return $output;

}
