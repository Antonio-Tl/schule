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
        <th>Postleizahl</th>
        <th>Stadt</th>
        <th>Straße</th>
        <th>Hausnummer</th>
    </tr>
    <?php
    $sql = "SELECT * from schule.adresse WHERE deleted_at is NULL";
    $result = query($sql);
    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###POSTLEIZAHL###</td><td>###STADT###</td>
                 <td>###STRASSE###</td><td>###HAUSNUMMER###</td></tr>';
    foreach ($result as $dataRow) {
        echo str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###POSTLEIZAHL###',
                '###STADT###',
                '###STRASSE###',
                '###HAUSNUMMER###'),
            array(
                '<A href="ActionDeleteS.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
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