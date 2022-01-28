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

<table>
    <tr>
        <th>Löschen</th>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Postleizahl</th>
        <th>Stadt</th>
        <th>Straße</th>
        <th>Hausnummer</th>
    </tr>
    <?php
    query('use schule');
    $sql = "SELECT CONCAT(AP.a_id,'-',AP.s_id) as id, S.fname, S.lname, A.plz, A.stadt, A.strasse, A.nr 
            from schule.adresse A
            JOIN adresse_schueler AP ON A.id = AP.a_id
            JOIN schule.schueler S ON S.id = AP.s_id
            WHERE S.deleted_at is NULL and A.deleted_at is null and AP.deleted_at is null";
    echo $sql;
    $result = query($sql);
    print_r($result);
    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###FNAME###</td><td>###LNAME###</td><td>###POSTLEIZAHL###</td><td>###STADT###</td>
                 <td>###STRASSE###</td><td>###HAUSNUMMER###</td></tr>';
    foreach ($result as $dataRow) {
        echo str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###FNAME###',
                '###LNAME###',
                '###POSTLEIZAHL###',
                '###STADT###',
                '###STRASSE###',
                '###HAUSNUMMER###',),
            array(
                '<A href="ActionDeleteS.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
                $dataRow['fname'],
                $dataRow['lname'],
                $dataRow['plz'],
                $dataRow['stadt'],
                $dataRow['strasse'],
                $dataRow['nr'],
            ),
            $row
        );
    }
    ?>
</table>
<button onclick="window.location.href='/schule/index.php'">Zurueck</button>
</body>
</html>