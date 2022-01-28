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
        <th>Kurse zuordnen</th>
    </tr>
    <?php
    $sql = "SELECT * from schule.schueler WHERE deleted_at is NULL";
    $result = query($sql);
    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###FNAME###</td><td>###LNAME###</td><td><A Href="skz.php?id=###ID###">Kurse zuordnen</A></td></tr>';
    foreach ($result as $dataRow) {
        echo str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###FNAME###',
                '###LNAME###',),
            array(
                    '<A href="ActionDeleteS.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
                $dataRow['fname'],
                $dataRow['lname'],
            ),
            $row
        );
    }
?>
</table>
<button onclick="window.location.href='/schule/index.php'">Zurueck</button>
</body>
</html>